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
		$this->load->library('ion_auth');
		if (!$this->ion_auth->logged_in()){
			redirect('auth/index','refresh');
		}
		$this->template->set_layout('ui_bootstrap');
	}
	public function index()
	{
		$this->load->model('pengaduan');
		
		$data = array();

		if (!is_null($this->session->userdata('user_id'))) {
			$user_id = $this->session->userdata('user_id');
			$groups 	= $this->ion_auth->get_users_groups($user_id)->result_array();
			$group_ids 	= array();
			if ($groups) {

				foreach ($groups as $key => $value) {
					$group_ids[] = $value['id'];
				}
			}
			
			$data['pending'] 	= $this->pengaduan->get_by_status_pengaduan($group_ids,'pending');
			$data['proses'] 	= $this->pengaduan->get_by_status_pengaduan($group_ids,'proses');
			$data['selesai'] 	= $this->pengaduan->get_by_status_pengaduan($group_ids,'selesai');
			
		}
		$this->template->set_content('staff/index',$data)->render();
	}

	public function tanggapi_pengaduan($id_pengaduan='')
	{
		$this->load->model(array('pengaduan','detail_pengaduan'));
		$data['jumlah_semua']	= $this->detail_pengaduan->get_all_by_id_pengaduan($id_pengaduan);
		$data['jumlah_finish'] 	= $this->detail_pengaduan->get_count_finish($id_pengaduan);
		$data['info'] 			= $this->pengaduan->get($id_pengaduan);
		$data['details']		= $this->detail_pengaduan->get_many_by('id_pengaduan',$id_pengaduan);
		$this->template->set_content('staff/tanggapi_pengaduan',$data)->render();
	}

	public function submit_lampiran_tanggapan($id_pengaduan='')
	{
		$this->load->model(array('detail_pengaduan','pengaduan'));
		
		$data 			 = array();
		$pengaduan  	 = array();
		$this->load->library('upload');
    	$number_of_files_uploaded = count($_FILES['lampiran_tanggapan']['name']);
		$jumlah_upload 	= count($_FILES);

    	if ($jumlah_upload > 0) {
    		$pengaduan['status_pengaduan']  = 'proses';
    	}


    	$pengaduan['waktu_ditanggapi']	= date('Y-m-d h:i:s');
    	$pengaduan['ditanggapi_oleh']	= $this->session->userdata('user_id');

    	for ($i = 0; $i < $number_of_files_uploaded; $i++) :
      		$_FILES['userfile']['name']     = $_FILES['lampiran_tanggapan']['name'][$i];
      		$_FILES['userfile']['type']     = $_FILES['lampiran_tanggapan']['type'][$i];
      		$_FILES['userfile']['tmp_name'] = $_FILES['lampiran_tanggapan']['tmp_name'][$i];
      		$_FILES['userfile']['error']    = $_FILES['lampiran_tanggapan']['error'][$i];
      		$_FILES['userfile']['size']     = $_FILES['lampiran_tanggapan']['size'][$i];
      		$config = array(
        		'file_name'     => 'tanggapan_'.time(),
        		'allowed_types' => 'jpg|jpeg|png|gif',
        		'max_size'      => 3000,
        		'overwrite'     => FALSE,
        		'upload_path'	=> FCPATH.'uploads/'
      		);
      		$this->upload->initialize($config);
      		if ( $this->upload->do_upload()) :
      			$file 						= $this->upload->data();
        		$data['lampiran_tanggapan']	= 'uploads/'.$file['file_name'];
               	$data['update_terakhir']	= date('Y-m-d h:i:s');
               	
                
                if (isset($_POST['id_detail'][$i])) {
					$id_detail = $_POST['id_detail'][$i];
					$this->detail_pengaduan->update($id_detail,$data);
				}

      		endif;
    	endfor;
    	$jumlah_unfinish = $this->detail_pengaduan->get_count_unfinish($id_pengaduan);
    	if ($jumlah_unfinish == 0) {
    		$pengaduan['status_pengaduan']  = 'review';
    	}
    	if (isset($_POST['id_pengaduan']) && $pengaduan) {
            $this->pengaduan->update($_POST['id_pengaduan'],$pengaduan);
		}
    	$this->go_back();
	}

	public function detail_sarana($id_sarana='')
	{
		$this->load->model('sarana');
		$data['info'] = $this->sarana->get($id_sarana);
	}

}
