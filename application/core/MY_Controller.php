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
		$this->load->library(array('template','migration','ion_auth'));
		
		//$this->load->config('custom_records',true);
		//$this->load->config('custom_template',true);
		//$this->load->config('custom_glite',true);
		$this->load->helper(array('tools','glite'));

		$this->load->library('grocery_CRUD'); //memanggil library grocery crud
		//grocery crud adalah program yang menyediakan tabel beserta dengan

		$this->set_indonesian_lang();

		$this->do_migration();

		try {
			$this->crud = new grocery_CRUD();
			$this->crud->set_theme('datatables');
		} catch (Exception $e) {
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}

		
		if (!$this->ion_auth->logged_in() && $this->router->fetch_class() != 'auth') {
			redirect('auth','refresh');
		}elseif (
			$this->ion_auth->logged_in() && 
			$this->router->fetch_class() == 'auth') {
			redirect('welcome','refresh');
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
		$tables = $datatables->get_tables();
		if ($tables) {	
			if (in_array($table_name, $tables)) {
				$datatables->set_sources($table_name)->show();
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
		if (in_array($table_name, $datatables->get_tables())) {
			$data = $datatables->get_details($table_name,$primary_value);	
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
		if (in_array($table_name, $datatables->get_tables())) {
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
		if (in_array($table_name, $datatables->get_tables())) {
			if (!$datatables->delete($table_name,$primary_value)) {
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
		if (in_array($table_name, $datatables->get_tables())) {
			$primary_key	= $datatables->get_primary_key($table_name);		
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

  	protected function do_migration($version = NULL){
    	$this->load->library('migration');
    	if(isset($version) && ($this->migration->version($version) === FALSE)){
      		$this->session->set_flashdata('message',$this->migration->error_string());
      	}elseif(is_null($version) && $this->migration->latest() === FALSE){
      		$this->session->set_flashdata('message',$this->migration->error_string());
    	}
  	}

  	public function go_back($method='index')
  	{
  		if (isset($_SERVER['HTTP_REFERER'])) {
  			header('Location: ' . $_SERVER['HTTP_REFERER']);
  			exit;
  		}else{
  			$this->go_to($method);
  		}
  	}

  	public function go_to($method='index')
  	{
  		
  		$controller = $this->router->fetch_class();
  		redirect($controller.'/'.$method,'refresh');
  	}

  	public function register()
	{
		if (!$this->ion_auth->logged_in()) {

			$this->template->set_layout('ui_dropbox_left_side');
			$data['first_name'] = array(
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
				'class'=>'c-input',
			);
			$data['last_name'] = array(
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
				'class'=>'c-input',
			);
			$data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
				'class'=>'c-input',
			);
			$data['email'] = array(
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
				'class'=>'c-input',
			);
			$data['company'] = array(
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
				'class'=>'c-input',
			);
			$data['phone'] = array(
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone'),
				'class'=>'c-input',
			);
			$data['password'] = array(
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
				'class'=>'c-input',
			);
			$data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
				'class'=>'c-input',
			);
			$identity_column = $this->config->item('identity', 'ion_auth');
			$data['identity_column'] = $identity_column;
			$this->template->set_content('welcome/register',$data)->render();
		}else{
			
			$logout = $this->ion_auth->logout();

			// redirect them to the login page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth/register', 'refresh');
		}
	}
	public function submit_register()
	{
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$data['identity_column'] = $identity_column;	
		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			);
		}
		
		
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data))
		{
			if ($this->ion_auth->login($identity, $password, false)){
				# code...
				$this->template->set_alert('warning',$this->ion_auth->messages());
				redirect("welcome", 'refresh');
			}else{
				$this->template->set_alert('info','akun belum aktif');
			}
		}
		else
		{
			$this->template->set_alert('warning',validation_errors());
			
		}
		redirect('auth/register','refresh');
	}
}