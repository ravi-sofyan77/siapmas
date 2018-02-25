<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth', 'template'));
		$this->load->helper('siapmas');
		$this->template->set_layout('ui_dropbox_dashboard');
		if (!$this->logged_in) {
			redirect('auth/logout','refresh');
		}
	}

	public function index()
	{
		$this->load->model(array('users_staff','pengaduan'));
		$staff = $this->users_staff->get_many_by('user_id',$this->logged_in['id']);
		$departements_id 	= array();
		$pending 			= array();
		$proses 			= array();
		$selesai 			= array();
		if ($staff) {
			foreach ($staff as $key => $value) {
				$departements_id[] = $value['departement_id'];
			}
		}
		if ($departements_id) {
			$pending = $this->pengaduan->get_by_departements_id($departements_id);
			$proses = $this->pengaduan->get_by_departements_id($departements_id,'proses');
			$selesai = $this->pengaduan->get_by_departements_id($departements_id,'selesai');

		}
		$data['pending'] = $pending;
		$data['proses'] = $proses;
		$data['selesai'] = $selesai;
		$this->template->set_content('staff/index',$data)->render();
	}

	public function daftar_tanggapan($id_pengaduan='')
	{
		$this->crud->set_table('pengaduan');
		$this->crud->set_subject('tanggapan ');
		$this->crud->set_relation('pengaduan_dari','users','email');

		$id_pengaduan = trim($id_pengaduan);
		if (!empty($id_pengaduan) && $id_pengaduan > 0) {
			$this->crud->where('id_pengaduan',$id_pengaduan);
		}
		$columns = array('waktu_pengaduan','pengaduan_dari','pesan_pengaduan','status_pengaduan');
		$this->crud->columns($columns);
		$this->crud->fields('status_pengaduan','pesan_tanggapan','lampiran_tanggapan');
		$this->crud->set_field_upload('lampiran_tanggapan','uploads');

		$this->crud->callback_after_update(array($this,'update_after_update_pengaduan'));

		$output = (array) $this->crud->render();

		$this->template->render($output);
	}



	public function update_after_update_pengaduan($post=array(),$id){
		$data = $post;
		if (function_exists('remove_undefined_column')) {
			$data = remove_undefined_column('pengaduan',$post);
		}
		$data['ditanggapi_oleh']		= $this->session->userdata('user_id');
		$data['waktu_ditanggapi']	= date('Y-m-d h:i:s');
		$this->db->where('id_pengaduan',$id);
		$this->db->update('pengaduan',$data);
		return true;
	}

}
