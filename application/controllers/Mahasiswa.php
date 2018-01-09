<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends MY_Controller {

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
		$this->template->set_layout('ui_bootstrap');
	}
	public function index()
	{
		$this->load->view('ui_dropbox');
	}

	public function daftar_pengaduan()
	{
		$this->crud->set_table('pengaduan');
		$this->crud->set_subject('Pengaduan');
		
		$this->crud->set_relation('pengaduan_kepada','groups','name');
		
		$this->crud->display_as('pengaduan_kepada','Pengaduan kepada');
		
		$this->crud->columns('pengaduan_tentang','pengaduan_kepada','status_pengaduan');
		//$this->crud->unset_columns('status_pengaduan');
		$this->crud->fields('pengaduan_tentang','pengaduan_kepada');
		$this->crud->required_fields('pengaduan_tentang');
		
		$output = (array) $this->crud->render();
		
		$this->template->render($output);
	}

	public function buat_pengaduan($id_group='',$id_prasarana='')
	{
		$this->load->model(array('sarana','prasarana'));
		$data['id_group']		= $id_group;
		$data['id_prasarana'] 	= $id_prasarana;
		$data['prasarana']		= $this->prasarana->get_by_id_group($id_group);
		$data['sarana'] 		= $this->sarana->get_by_id_prasarana($id_prasarana);
		$data['groups']			= $this->db->get('groups')->result_array();
		$this->template->set_content('mahasiswa/buat_pengaduan',$data)->render();
	}

	public function simpan_pengaduan($id_pengaduan='')
	{
		if ($this->form_validation->run('simpan_pengaduan')) {
			$this->load->model('pengaduan');
			$last_id 	= $this->pengaduan->last_id();
			$data 		= $this->input->post(NULL,true);
			
			if ($_FILES['lampiran_pengaduan']['size'] > 0 && $_FILES['lampiran_pengaduan']['error'] == 0){
				$config['allowed_types'] ='gif|jpg|png|pdf|docx|jpeg';
				$config['upload_path'] 	 = FCPATH.'uploads/';
				$config['file_name']	 = $last_id.'_'.time();
				//$config['upload_url']	= base_url($path);
				$this->load->library('upload',$config);
				if ($this->upload->do_upload('lampiran_pengaduan')) {
					$file = $this->upload->data();
					$data['lampiran_pengaduan'] = 'uploads/'.$file['file_name'];
				}else{
					$this->template->set_alert('warning',$this->upload->display_errors());
					$this->go_back();
				}
			}
			if (isset($data['sarana_terkait'])) {
				unset($data['sarana_terkait']);
			}
			$data['pengaduan_dari'] = $this->session->userdata('user_id');
			//$this->logged_in['user_id'];
			if ($id_pengaduan = $this->pengaduan->insert($data)) {
				
				if (isset($_POST['sarana_terkait'])) {

					if (is_array($_POST['sarana_terkait'])) {
						foreach ($_POST['sarana_terkait'] as $key => $value) {
							$detail['id_pengaduan'] 	= $id_pengaduan;
							$detail['sarana_terkait'] 	= $value;
							$this->db->insert('detail_pengaduan',$detail);
						}
					}
				}
				$this->go_to('detail_pengaduan/'.$id_pengaduan);
			}else{
				$this->template->set_alert('error','gagal mengirim pengaduan :(');
				$this->go_back();
			}
		}else{
			$this->template->set_alert('warning',validation_errors());
			$this->go_back();
		}
	}

	public function detail_pengaduan($id_pengaduan='')
	{
		$this->load->model('pengaduan');
		$data['detail'] = $this->pengaduan->get($id_pengaduan);
		$this->template->set_content('mahasiswa/detail_pengaduan',$data)->render();
	}
}

