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

	public function get_by_status_pengaduan($group_ids=array(),$status='pending')
	{
		if ($group_ids) {
			foreach ($group_ids as $key => $value) {
				$this->db->or_where('pengaduan_kepada',$value);
			}
		}
		$this->db->where('status_pengaduan',$status);
		$query = $this->db->get($this->_table);
		return $query->result_array();
	}


}