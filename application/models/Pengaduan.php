<?php
/**
* 
*/
class Pengaduan extends MY_Model
{
	public $return_type 	= 'array';
	public $primary_key 	= 'id_pengaduan';
	
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_by_pengaduan_dari($user_id='',$status='')
	{
		$this->_database->from($this->_table);
		$this->_database->where('pengaduan_dari',$user_id);
		$this->_database->where('status_pengaduan',$status);
		return $this->_database->get()->result_array();
	}

	public function get_by_departements_id($ids=array(),$status_pengaduan='pending'){
		$this->_database->from($this->_table);
		$this->_database->where_in('pengaduan_kepada',$ids);
		$this->_database->where('tanggapan_diterima','tidak');
		$this->_database->where('status_pengaduan',$status_pengaduan);
		return $this->_database->get()->result_array();
	}
}