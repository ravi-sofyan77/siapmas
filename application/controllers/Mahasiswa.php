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
	public $user_id; //atribut

	public function __construct(){
		parent::__construct();
		$this->load->library(array('ion_auth', 'form_validation','template'));
		$this->load->helper('siapmas');
		$this->template->set_layout('ui_dropbox');
	}

	public function index(){
		$this->load->library('gc_dependent_select');
		
		$this->crud->set_table('pengaduan');
		$this->crud->set_subject('Pengaduan');
		$this->crud->set_relation('pengaduan_kepada','departement','departement_name');
		$this->crud->set_relation('id_prasarana','prasarana','nama_prasarana');
		$this->crud->set_relation('id_sarana','sarana','nama_sarana');
		$this->crud->display_as('id_prasarana','Prasarana')
			 		->display_as('id_sarana','Sarana');
		

		$this->crud->where('arsipkan','tidak');

		$user_id = $this->session->userdata('user_id');
		$this->crud->where('pengaduan_dari',$user_id);
		
		$columns = array('waktu_pengaduan','pengaduan_kepada','pesan_pengaduan','status_pengaduan');
		$this->crud->columns($columns);

		
		$this->crud->add_action('Review', '', '','',array($this,'go_to_review'));
		$this->crud->add_action('Arsipkan', '', '','',array($this,'go_to_arsipkan'));

		$this->crud->required_fields('pesan_pengaduan');
		$this->crud->fields('pengaduan_kepada','id_prasarana','id_sarana','lampiran_pengaduan','pesan_pengaduan');
		$this->crud->set_field_upload('lampiran_pengaduan','uploads');

		$this->crud->callback_after_insert(array($this,'update_after_insert_pengaduan'));




		$fields = array(
			// Field Provinsi
			'pengaduan_kepada' => array( // first dropdown name
				'table_name' => 'departement', // table of country
				'title' => 'departement_name', // country title
				'id_field'=>'id_departement',
				'relate' => null, // the first dropdown hasn't a relation
				'data-placeholder' => 'Pilih Bidang' //dropdown's data-placeholder:
			),
			'id_prasarana' => array( // second dropdown name
				'table_name' => 'prasarana', // table of state
				'title' => 'nama_prasarana', // state title
				'id_field' => 'id_prasarana', // table of state: primary key
				'relate' => 'dari_bidang', // table of state:
				'data-placeholder' => 'Pilih Prasarana' //dropdown's data-placeholder:
			),
			'id_sarana' => array(
				'table_name' => 'sarana',
				'title' => 'nama_sarana',
				//'title' => 'ID: {id_kec} / Kota : {nama}',  // now you can use this format )))
				//'where' =>"post_code>'167'",  // string. It's an optional parameter.
				//'order_by'=>"id_kab DESC",  // string. It's an optional parameter.
				'id_field' => 'id_sarana',
				'relate' => 'id_prasarana',
				'data-placeholder' => 'Pilih Sarana'
			)
		);
		$config = array(
			'main_table' => 'pengaduan',
			'main_table_primary' => 'id_pengaduan',
			"url" => site_url() . '/mahasiswa/index/',
			'ajax_loader' => base_url() . 'assets/ajax-loader.gif'
		);
		$categories = new gc_dependent_select($this->crud, $fields, $config);

		// first method:
		//$output = $categories->render();

		// the second method:
		$js 			= $categories->get_js();
		$output = $this->crud->render();
		$output->output.= $js;
		
		$output = (array) $output;
		$output['total_results'] = $this->crud->get_total_results();
		$this->template->render($output);
	}


	public function daftar_terarsip(){
		$this->crud->set_table('pengaduan');
		$this->crud->set_subject('Pengaduan');
		$this->crud->set_relation('pengaduan_kepada','departement','departement_name');
		$this->crud->set_relation('id_prasarana','prasarana','nama_prasarana');
		$this->crud->set_relation('id_sarana','sarana','nama_sarana');
		$this->crud->display_as('id_prasarana','Prasarana')
			 		->display_as('id_sarana','Sarana');
		$columns = array('waktu_pengaduan','pengaduan_kepada','pesan_pengaduan','status_pengaduan');
		$this->crud->columns($columns);
		$this->crud->unset_add();
		$this->crud->unset_edit();
		$output = (array) $this->crud->render();
		$this->template->render($output);
	}

	public function update_after_insert_pengaduan($post=array(),$id){
		$data = $post;
		if (function_exists('remove_undefined_column')) {
			$data = remove_undefined_column('pengaduan',$post);
		}
		$data['pengaduan_dari']	= $this->session->userdata('user_id');
		$data['tanggapan_diterima'] = 'tidak';
		$this->db->where('id_pengaduan',$id);
		$this->db->update('pengaduan',$data);
		return true;
	}

	public function go_to_review($primary_key,$row){

		return site_url('mahasiswa/review_pengaduan/'.$primary_key);
	}

	public function go_to_arsipkan($primary_key,$row){

		return site_url('mahasiswa/arsipkan_pengaduan/'.$primary_key);
	}

	public function review_pengaduan($primary_key){
		$this->load->model('pengaduan');
		$pengaduan 			= $this->pengaduan->get($primary_key);
		if (isset($pengaduan['status_pengaduan'])) {
			if ($pengaduan['status_pengaduan'] == 'selesai') {
				$data['pengaduan'] = $pengaduan;
				$this->template->set_content('mahasiswa/review_pengaduan',$data)->render();
			}else{
				$this->template->set_alert('info','status pengaduan masih '.$pengaduan['status_pengaduan']);
				redirect('mahasiswa/index/read/'.$primary_key,'refresh');
			}
		}else{
			$this->template->set_alert('info','status pengaduan tidak ada');
			redirect('mahasiswa/index/read/'.$primary_key,'refresh');
		}
		
	}

	public function arsipkan_pengaduan($primary_key){
		$this->load->model('pengaduan');
		if (isset($primary_key)) {
			$data['arsipkan'] ='ya';
			if ($this->pengaduan->update($primary_key,$data)) {
				$this->template->set_alert('success','pengaduan berhasil terarsip');
			}else{
				$this->template->set_alert('warning','pengaduan gagal terarsip :(');
			}
		}
		redirect('mahasiswa/index','refresh');
	}

	public function submit_review_pengaduan($id_pengaduan=''){
		$this->load->model('pengaduan');
		if ($this->form_validation->run('submit_review_pengaduan')) {
			$data = $this->input->post(NULL,true);
			$this->pengaduan->update($id_pengaduan,$data);
		}else{
			$this->template->set_alert('warning',validation_errors());
		}
		redirect('mahasiswa/index','refresh');
	}

}

