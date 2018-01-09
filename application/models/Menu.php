<?php

/**
* 
*/
class Menu extends MY_Model
{
	public $return_type = 'array';
	public $primary_key = 'id_menu';
	function __construct()
	{
		parent::__construct();
	}
}