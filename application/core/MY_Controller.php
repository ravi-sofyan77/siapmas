<?php

/**
* 
*/
class MY_Controller extends CI_Controller
{
	public $crud;	
	public $logged_in = array();
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('template','migration'));
		
		//$this->load->config('custom_records',true);
		//$this->load->config('custom_template',true);
		//$this->load->config('custom_glite',true);
		$this->load->helper(array('tools','glite'));

		$this->load->library('grocery_CRUD'); //memanggil library grocery crud
		//grocery crud adalah program yang menyediakan tabel beserta dengan

		$this->set_indonesian_lang();

		try {
			$this->crud = new grocery_CRUD();
			$this->crud->set_theme('datatables');
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

	}
	public function _crud_output($output = null)
	{
		$this->load->view('crud.php',(array)$output);
	}

	public function logout()
	{
		$this->load->library('ion_auth');

		if ($this->ion_auth->logout()) {
			
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

	protected function set_indonesian_lang()
  	{
  		$this->lang->load(array(
  			'auth',
  			'db',
  			'ion_auth',
  			'form_validation',
  			'migration',
  			'rest_controller',
  			'upload',
  			'calendar',
  			'email',
  			'date',
  			'ftp',
  			'imglib',
  			'number',
  			'profiler',
  			'unit_test'
  		));
  	}
}