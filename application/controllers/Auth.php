<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('ion_auth');

		$this->form_validation->set_error_delimiters(
			$this->config->item('error_start_delimiter', 'ion_auth'), 
			$this->config->item('error_end_delimiter', 'ion_auth')
		);

		//$this->template->set_layout('ui_default');
		$this->template->set_layout('ui_bootstrap');
		
		if ($this->logged_in) {
			redirect('welcome/index','refresh');
		}
	}

	public function index($args='')
	{
		
		// printr_data_ex();
		$data['title'] 	= $this->lang->line('login_heading');

		$data['identity'] = array('name' => 'identity',
			'id'    => 'identity',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('identity'),
			'class' =>'form-control'
		);
		$data['password'] = array('name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class'=>'form-control'
		);
		
		$this->template->set_content('auth/login',$data)->render();
	}

	public function forgot_password()
	{
				// setting validation rules by checking whether identity is username or email
		$data = array(
			'type' => $this->config->item('identity','ion_auth'),
			'identity' => array('name' => 'identity','id' => 'identity','class'=>'form-control'),
			'message' => (validation_errors()) ? validation_errors() : $this->session->flashdata('message')
		);
		if ( $this->config->item('identity', 'ion_auth') != 'email' ){
			$data['identity_label'] = $this->lang->line('forgot_password_identity_label');
		}else{
			$data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
		}
		// set any errors and display the form
		$this->template->set_content('auth/forgot_password',$data)->render();
	}

	// log the user in
	public function login()
	{
		
		//validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');



			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{


				redirect('welcome/index','refresh');

			}else{
				// if the login was un-successful
				// redirect them back to the login page
				$this->template->set_alert('warning', $this->ion_auth->errors());
				 // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}else{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->template->set_alert('warning',validation_errors());
			
		}
		redirect('auth/index', 'refresh');
	}

	public function submit_forgot_password()
	{
		if($this->config->item('identity', 'ion_auth') != 'email' )
		{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}else{
		   $this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}
		if ($this->form_validation->run() == false){
			$this->template->set_alert('warning',validation_errors());
			redirect("auth/forgot_password", 'refresh');	
		}else{
			$identity_column = $this->config->item('identity','ion_auth');
		
			$identity 		 = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();
			
			if(empty($identity)) {
	            if($this->config->item('identity', 'ion_auth') != 'email'){
		            $this->ion_auth->set_error('forgot_password_identity_not_found');
				}else{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}
				$this->template->set_alert('warning', $this->ion_auth->errors());
				
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->template->set_alert('warning', $this->ion_auth->messages());

				//send random password email
				
				//we should display a confirmation page here instead of the login page
				redirect("auth/index", 'refresh'); 
			}
			else
			{
				$this->template->set_alert('warning', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	// change password

	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			// display the form
			// set the flash data error message if there is one
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
			);
			$data['new_password'] = array(
				'name'    => 'new',
				'id'      => 'new',
				'type'    => 'password',
				'pattern' => '^.{'.$data['min_password_length'].'}.*$',
			);
			$data['new_password_confirm'] = array(
				'name'    => 'new_confirm',
				'id'      => 'new_confirm',
				'type'    => 'password',
				'pattern' => '^.{'.$data['min_password_length'].'}.*$',
			);
			$data['user_id'] = array(
				'name'  => 'user_id',
				'id'    => 'user_id',
				'type'  => 'hidden',
				'value' => $user->id,
			);
		
			$this->template->set_content('auth/change_password',$data)->render();
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->template->set_alert('warning', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->template->set_alert('warning', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}
		
		if (validation_errors()) {
			$data['message'] = validation_errors();
		}else{
			$data['message'] = $this->session->flashdata('message');
		}
		$data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
		$data['new_password'] = array(
			'name' => 'new',
			'id'   => 'new',
			'type' => 'password',
			'pattern' => '^.{'.$data['min_password_length'].'}.*$',
		);
		$data['new_password_confirm'] = array(
			'name'    => 'new_confirm',
			'id'      => 'new_confirm',
			'type'    => 'password',
			'pattern' => '^.{'.$data['min_password_length'].'}.*$',
		);
		$data['user_id'] = array(
			'name'  => 'user_id',
			'id'    => 'user_id',
			'type'  => 'hidden',
			'value' => $user->id,
		);
		$data['csrf'] = $this->_get_csrf_nonce();
		$data['code'] = $code;
		$this->template->set_content('auth/reset_password',$data)->render();
	}

	// reset password - final step for forgotten password
	public function submit_reset_password($code=NULL)
	{
		
		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() == false)
			{
				redirect('auth/reset_password/'.$code,'refresh');
			}
			else
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($code);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$identity = $user->{$this->config->item('identity', 'ion_auth')};

					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->template->set_alert('warning', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->template->set_alert('warning', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->template->set_alert('warning', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}


	

}
