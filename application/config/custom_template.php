<?php

$config['site']['brand']		= '';
$config['site']['author']		= '';
$config['site']['admin']		= '';
$config['default']['content'] 	= 'Hello world';
$config['default']['layout']	= 'ui_default';
$config['input_file'] = array('id_berkas','surat_permintaan');

$config['input_auto'] = array(
	'id_user'=> array('get_users','users','username')
);

$config['menu'][10] =  array('users','person','keluarga') ;


