<?php
/**
* 
*/
class Admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('ui_bootstrap_with_navbar');
	}

	public function create_user()
	{
		$data['groups'] = $this->ion_auth_model->groups()->result_array();
		$this->template->set_content('forms/create_user',$data)->render();
	}

	public function save_new_user()
	{
		$this->load->model('ion_auth_model');
		if ($this->form_validation->run('register')) {
        
				$data = $this->input->post(null,true);
        	
        		if(isset($data['group']) && $data['group'] == 0){
            		$this->template->set_alert('warning', 'Group user wajib dipilih');			
					
            	}else{
            		$user_id = $this->ion_auth_model->register_user( // menambahkan user dengan register
						$data['username']
						, $data['password']
						, $data['email']
						, array()	
						, $data['group']
					);
        			if($user_id){
            			$this->db->where('id',$user_id);
            			$this->db->update('users',array('active'=>1));

            			$this->go_to('daftar/users');
            		}else{
            			$this->template->set_alert('warning', $this->ion_auth->messages());				
            		}	
            	}
		}else{
			$this->template->set_alert('warning', validation_errors());			
		}
		$this->go_to('create_user');
	}

	public function set_active($id_user=''){
		
		$this->change_user_status('1',$id_user);	

	}

	public function set_pasive($id_user='')
	{
		$this->change_user_status('0',$id_user);		
	}

	protected function change_user_status($status='',$id_user='')
	{
		$tindakan['1'] = 'mengaktifkan ';
		$tindakan['0'] = 'mematikan ';

		if (in_array($status, array('1','0')) && is_numeric($id_user) && $id_user > 0) {
			$this->load->model('users');
			if (!$this->users->update($id_user,array('active'=>$status))) {
				$this->template->set_alert('warning','gagal '.$tindakan[$status].' user :(');			
			}
		}else{
			$this->template->set_alert('warning','format request tidak sah');			
		}
		$this->go_back();
	}



}