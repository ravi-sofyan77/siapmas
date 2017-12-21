<?php
/**
* 
*/
class Detail_pengaduan extends MY_Model
{
	public $return_type 	= 'array';
	public $primary_key 	= 'id_detail';
	
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_count_unfinish($id_pengaduan='')
	{
		$this->db->where('lampiran_tanggapan',NULL);
		$this->db->where('id_pengaduan',$id_pengaduan);
		return $this->db->get($this->_table)->num_rows();
	}
	
	public function get_count_finish($id_pengaduan='')
	{
		$this->db->where('lampiran_tanggapan IS NOT ',NULL);
		$this->db->where('id_pengaduan',$id_pengaduan);
		//$this->db->get($this->_table);
		//return $this->db->last_query();
		return $this->db->get($this->_table)->num_rows();
	}

	public function get_all_by_id_pengaduan($id_pengaduan='')
	{
		$this->db->where('id_pengaduan',$id_pengaduan);
		return $this->db->get($this->_table)->num_rows();
	}
}