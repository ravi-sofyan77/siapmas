<?php
/**
* 
*/
class Berkas extends MY_Model
{
	public $return_type 	= 'array';
	public $primary_key 	= 'id_berkas';
	protected $before_create 	= array('set_creator');

	function __construct()
	{
		parent::__construct();
	}

}