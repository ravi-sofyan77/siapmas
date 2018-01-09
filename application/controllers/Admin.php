<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->template->set_layout('ui_dropbox');
	}
	public function index()
	{
		$this->template->set_layout('ui_bootstrap');
		$this->load->library(array('ion_auth', 'form_validation'));
		//$this->_crud_admin((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
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

	public function daftar_prasarana()
	{
		
		$this->crud->set_table('prasarana'); //menentukan tabel
		$this->crud->set_subject('Prasarana Kampus'); // label pada tombol
		//set kolom yang wajib diisi.
		$this->crud->required_fields(array('nama_prasarana','status_prasarana'));
		//menentukan kolom yang akan ditampilkan pada tabel
		$this->crud->set_relation('sarana_dari','groups','name');
		$this->crud->display_as('sarana_dari','Sarana dari');

		$this->crud->columns('nama_prasarana','status_prasarana','keterangan_prasarana','sarana_dari');

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
		$this->crud->required_fields('nama_sarana');
		
		$output = (array) $this->crud->render();
		
		$this->template->render($output);
	}

	public function daftar_menu($value='')
	{
		$this->load->library('controller_list');
		$this->crud->set_table('menu');
		$this->crud->set_subject('Menu');
		$this->crud->set_relation('id_groups','groups','name');
		$this->crud->display_as('id_groups','Sarana dari');
		$this->crud->fields(
			'id_groups',
			'menu',
			'halaman'
		);
		$output = (array) $this->crud->render();
		$this->template->render($output);
	}	

	
}
