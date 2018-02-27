<?php

/**
* 
*/
class MY_Controller extends CI_Controller
{
	public $logged_in = array();
	public $crud;
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');

		$this->load->library(array('template','ion_auth','grocery_CRUD'));
		$this->load->helper(array('tools','siapmas'));

		$this->crud = new grocery_CRUD();
		$methods 	= get_class_methods($this);
		
		$this->template->set_menu($methods);

		if ($this->ion_auth->logged_in()) {
			$user_id = $this->ion_auth->get_user_id();
			if ($user_id > 0) {
				$this->load->model('users');
				$this->logged_in = $this->users->get($user_id);
			}
		}
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
				'class'=>'c-input c-validation-email',
				'pattern' => '[\w.%+-]+@ittelkom-pwt\.ac\.id',
				'placeholder'=> '@ittelkom-pwt.ac.id'
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
			$this->template->set_layout('ui_register');
			$this->template->set_content('pages/register',$data)->render();
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
		
		
		if ($this->form_validation->run() === TRUE){
			$group_mhs = $this->db->get_where('groups',array('name'=>'mahasiswa'))->row();
			if (isset($group_mhs->id)) {
				$register = $this->ion_auth->register($identity, $password, $email, $additional_data,array($group_mhs->id));
				if ($register > 0) {
					if ($this->ion_auth->login($identity, $password, false)){
					$this->template->set_alert('warning',$this->ion_auth->messages());
						redirect("mahasiswa/index", 'refresh');
					}else{
						$this->template->set_alert('info','akun belum aktif');
					}
				}else{
					$this->template->set_alert('info','registrasi gagal :(');
				}
				
			}
			
			/**/
		}
		else
		{
			$this->template->set_alert('warning',validation_errors());
			
		}
		//redirect('auth/register','refresh');
	}

	
}