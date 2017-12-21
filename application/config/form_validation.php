<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'register'=>array(
		array('field'=>'username','label'=>'Nama akun','rules'=>'trim|required|is_unique[users.username]')
		,array('field'=>'password','label'=>'Kata sandi','rules'=>'trim|required')
		,array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email|is_unique[users.email]')
		,array('field'=>'group','label'=>'UserGroup ','rules'=>'trim|required')

	),
	'simpan_pengaduan' =>array(
		array('field'=>'pesan_pengaduan','label'=>'pesan pengaduan','rules'=>'trim|required')
	),	
	
);