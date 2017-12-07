<?php
/**
* 
*/
class Admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('ui_bootstrap_with_navbar');
	}