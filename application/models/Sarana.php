<?php
/**
* 
*/
class Sarana extends MY_Model
{
	public $return_type 	= 'array';
	public $primary_key 	= 'id_sarana';
	
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_by_id_prasarana($id_prasarana='')
	{
		return $this->get_many_by('id_prasarana',$id_prasarana);
	}
}