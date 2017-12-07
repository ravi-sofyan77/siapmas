<?php

/**
* 
*/
require_once 'MY_Custom.php';

class MY_Controller extends MY_Custom
{
	public $me;
	function __construct()
	{
		parent::__construct();
		$this->set_indonesian_lang();
		$this->template->set_layout('ui_bootstrap_with_navbar');
		$class_name = get_class($this);
		$this->me 	= strtolower($class_name);
		$controller = $this->router->fetch_class();
		
		if ($this->logged_in) {
			if (isset($this->logged_in['is'])) {
				if ($controller !='welcome' && $this->logged_in['is'] != $controller) {
					redirect('welcome/index','refresh');
				}
			}
			if ($controller =='auth') {
				redirect('welcome/index','refresh');
			}
			
		}elseif (!$this->logged_in) {
			if ($controller != 'auth') {
				redirect('auth/index','refresh');
			}
		}
	}

	public function index($value='pages/welcome_message')
	{
		
		$this->template->set_content($value)->render();
	}

	public function logout()
	{
		$this->load->library('ion_auth');

		if ($this->ion_auth->logout()) {
			if (function_exists('clear_notifikasi_ini')){
				//$notif = $this->notif->notifikasi;
				//if (isset($notif['to'])) {
					if ($this->logged_in['is'] == $notif['to']) {
						clear_notifikasi_ini();
					}
				//}
			}
			$this->logged_in = array();
		}
		redirect('auth/index','refresh');
	}

	public function daftar($table_name='')
	{
		$this->load->library('datatables');
		$tables = $this->datatables->get_tables();
		if ($tables) {	
			if (in_array($table_name, $tables)) {
				$this->datatables->set_sources($table_name)->show();
			}else{
				$this->template->set_content('404_not_found')->render();
			}
		}else{
			$this->template->set_content('404_not_found')->render();
		}
	}

	public function edit($table_name='',$primary_value='')
	{
		$this->load->library('datatables');
		$data = array();
		if (in_array($table_name, $this->datatables->get_tables())) {
			$data = $this->datatables->get_details($table_name,$primary_value);	
		}else{
			$this->template->set_alert('warning','tabel tidak dikenali');
		}
		$me 			= $this->router->fetch_class();
		$data['action'] = site_url($me.'/simpan/'.$table_name);
		$data 			= $this->trigger($data);
		$this->template->set_content('forms/input_edit',$data)->render();
	}


	public function tambah($table_name='')
	{
		$data 	= array();
		$this->load->library('datatables');
		if (in_array($table_name, $this->datatables->get_tables())) {
			$config = $this->config->item($table_name,'custom_records');

			if (!is_null($config)) {
				
				if (isset($config['input'])) {
					$data['fields'][$table_name] = $config['input'];
				}
			}
		}else{
			$this->template->set_alert('warning','tabel tidak dikenali');
		}
		
		$me 			= $this->router->fetch_class();
		$data['action'] = site_url($me.'/simpan/'.$table_name);
		$data 			= $this->trigger($data);
		$this->template->set_content('forms/input_baru',$data)->render();
	}

	public function hapus($table_name='',$primary_value='')
	{
		$this->load->library('datatables');
		if (in_array($table_name, $this->datatables->get_tables())) {
			if (!$this->datatables->delete($table_name,$primary_value)) {
				$this->template->set_alert('warning','gagal menghapus data :(');
			}
		}else{
			$this->template->set_alert('warning','nama tabel tidak dikenali ');
		}
		$this->go_back();
	}

	public function simpan($table_name='')
	{
		$this->load->library('datatables');
		$this->load->model('berkas');
		if (in_array($table_name, $this->datatables->get_tables())) {
			$primary_key	= $this->datatables->get_primary_key($table_name);		
			$length_id 		= 0;
			$rules_name 	= $table_name;
			if (!is_null($this->input->post(NULL,true))) {
				
				$data 			= $this->input->post(NULL,true);

				if (isset($_POST[$primary_key]) && $data[$primary_key]) {
					unset($data[$primary_key]);
					$length_id 	= strlen($_POST[$primary_key]);	
					$rules_name ='edit_'.$table_name;
				}
			
				if ($this->form_validation->run($rules_name)) {
					
					$this->proceed_to_save($length_id,$table_name,$primary_key,$data);

				}elseif($this->form_validation->run($table_name)){
					
					$this->proceed_to_save($length_id,$table_name,$primary_key,$data);
					
				}else{
					if (empty(validation_errors())) {
						$this->template->set_alert('warning','validasi form '.$table_name.' belum diatur');
					}else{
						$this->template->set_alert('warning',validation_errors());
					}
				}
				
			}

		}else{
			$this->template->set_alert('warning','nama tabel tidak dikenali ');
		}
		$this->go_back();
		
	}

	public function detail_pribadi()
	{
		$data 			= array();
		$this->load->model('users');
		if ($this->logged_in) {
			$data 		= $this->logged_in;
			$data['info'] 	= $this->users->get($this->logged_in['user_id']);
		}
		$this->template->set_content('pages/detail_pribadi',$data)->render();
	}

	public function reset_password()
	{
		
		if ($this->form_validation->run('reset_password')) {
			$this->load->library('ion_auth'); //memanggil libraray ion_auth /application/libraries/Ion_auth.php
			$this->load->model('ion_auth_model');//memangil model ion_auth_model
			$identity 	= $this->logged_in['email'];
			$password 	= $this->input->post('password');
			$change  	= $this->ion_auth->reset_password($identity, $password);
			if ($change) {
				$this->template->set_alert('warning', $this->ion_auth->messages());
			}
			$this->logout();
		}else{
			$this->template->set_alert('warning', validation_errors());
		}
		$this->go_to('detail_pribadi');
	}

}