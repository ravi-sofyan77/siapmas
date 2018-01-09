<?php
/**
* 
*/
class Prasarana extends MY_Model
{
	public $return_type 	= 'array';
	public $primary_key 	= 'id_prasarana';
	
	
	function __construct()
	{
		parent::__construct();
	}

	public function get_by_id_group($id_group='')
	{
		return $this->get_many_by('sarana_dari',$id_group);
	}	
}