<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->template->set_layout('ui_dropbox');
		$this->lang->load('auth');
	}
	public function index()
	{
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			//list the users
		$this->data['users'] = $this->ion_auth->users()->result();
		foreach ($this->data['users'] as $k => $user)
		{
			$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
		}
			//$this->_render_page('auth/index', $this->data);
		$this->template->set_content('auth/index', $this->data)->render();
	}



	public function daftar_staff(){
		$this->crud->set_table('users_staff');
		$this->crud->set_relation('user_id','users','email');
		$this->crud->set_relation('departement_id','departement','departement_name');
		$this->crud->display_as('nik_staff','NIDN / NIK');
		$this->crud->display_as('user_id','Email pengguna');
		$this->crud->display_as('departement_id','Bidang');
		$output = (array) $this->crud->render();
		$this->template->render($output);
		/*
		$this->crud->set_table('users');
		$this->crud->set_relation_n_n('kelompok', 'users_groups', 'groups', 'user_id', 'group_id', 'name','user_id',' where groups.name NOT IN ("mahasiswa","admin")');
		$this->crud->columns('username','email');
		$output = (array) $this->crud->render();
		$this->template->render($output);*/
		
	}

	public function daftar_bidang(){
		$this->crud->set_table('departement');
		$this->crud->set_subject('Bidang');
		$this->crud->display_as('departement_name','Nama bidang');
		$this->crud->display_as('status_departement','Status bidang');
		$this->crud->required_fields('departement_name');
		$this->crud->columns('departement_name','description','status_departement');
		$this->crud->fields('departement_name','description','status_departement');
		$output = (array) $this->crud->render();
		$this->template->render($output);
	}

	
	public function daftar_prasarana()
	{
		
		$this->crud->set_table('prasarana'); //menentukan tabel
		$this->crud->set_subject('Prasarana Kampus'); // label pada tombol
		//set kolom yang wajib diisi.
		$this->crud->required_fields(array('nama_prasarana','status_prasarana'));
		//menentukan kolom yang akan ditampilkan pada tabel
		$this->crud->set_relation('dari_bidang','departement','departement_name');
		$this->crud->display_as('dari_bidang','Sarana Dari Bidang');
		$this->crud->columns('nama_prasarana','status_prasarana','keterangan_prasarana','dari_bidang');
		$output = (array) $this->crud->render();
		$this->template->render($output);

	}

	public function daftar_sarana()
	{
		$this->crud->set_table('sarana');
		$this->crud->set_subject('Sarana Kampus');
		
		//membuat join tabel prasarana dengan sara

		$this->crud->set_relation('id_prasarana','prasarana','nama_prasarana');
		$this->crud->display_as('id_prasarana','Dari prasarana');

		$this->crud->required_fields('id_prasarana','nama_sarana');
		
		$output = (array) $this->crud->render();
		
		$this->template->render($output);
	}

	
	
}
