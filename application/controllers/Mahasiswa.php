<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends MY_Controller {

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
		$this->template->set_layout('ui_bootstrap_admin');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function daftar_pengaduan()
	{
		$this->crud->set_table('pengaduan');
		$this->crud->set_subject('Pengaduan');
		
		$this->crud->set_relation('pengaduan_kepada','groups','name');
		
		$this->crud->display_as('pengaduan_kepada','Pengaduan kepada');
		
		$this->crud->columns('pengaduan_tentang','pengaduan_kepada','status_pengaduan');
		//$this->crud->unset_columns('status_pengaduan');
		$this->crud->fields('pengaduan_tentang','pengaduan_kepada');
		$this->crud->required_fields('pengaduan_tentang');
		
		$output = (array) $this->crud->render();
		
		$this->template->render($output);
	}
}
