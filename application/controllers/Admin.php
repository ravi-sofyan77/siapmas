<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->template->set_layout('ui_bootstrap_admin');
	}
	public function index()
	{
		
		$this->_crud_admin((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));

	}

	public function daftar_prasarana()
	{
		
		$this->crud->set_table('prasarana'); //menentukan tabel
		$this->crud->set_subject('Prasarana Kampus'); // label pada tombol
		//set kolom yang wajib diisi.
		$this->crud->required_fields(array('nama_prasarana','status_prasarana'));
		//menentukan kolom yang akan ditampilkan pada tabel
		$this->crud->columns('nama_prasarana','status_prasarana','keterangan_prasarana');

		$output = (array) $this->crud->render();
		
		$this->template->render($output);

	}

	public function daftar_sarana()
	{
		$this->crud->set_table('sarana');
		$this->crud->set_subject('Sarana Kampus');
		
		//membuat join tabel prasarana dengan sara

		$this->crud->set_relation('id_prasarana','prasarana','nama_prasarana');
		$this->crud->set_relation('sarana_dari','groups','name');
		
		$this->crud->display_as('sarana_dari','Sarana dari');
		$this->crud->display_as('id_prasarana','Dari prasarana');
		$this->crud->required_fields('nama_sarana');
		
		$output = (array) $this->crud->render();
		
		$this->template->render($output);
	}

	
}
