<?php

/**
 * Group id
 * 1 => Admin
 * 2 => purchasing
 */
$config['users']['show'] = array(
	'name'
	,'username'
	,'email'
	,'last_login'
	,'phone'
);
$config['users']['input'] = array(
	'real_name'
	,'username'
	,'email'
	,'phone'
	,'company'
	,'active'
);
$config['users']['toolbar']= array(
	'1' => array('tambah'),
	'11' => array('admin/create_user')
);
$config['users']['action'] = array(
	'11'=>array(
		'active' => array(
			'1' => array('matikan'=>'admin/set_pasive/')
			,'0'=> array('aktifkan'=>'admin/set_active/')
		),
		'edit'=>'dashboard/edit/users/'
	)
);


$config['person']['show'] = array(
	'nik'
	,'nama'
	,'jenis_kelamin'
	,'lahir_tanggal'
	,'lahir_no_akte'
	,'pekerjaan'
	,'alamat'
);
$config['person']['toolbar'] = array(
	'11' => array('welcome/tambah_person')
);
$config['person']['action'] = array(
	'11'=>array(
			'edit'=>'welcome/edit/person/',
			'ajukan ktp'=>'welcome/ajukan_ktp/'
		)
);
$config['keluarga']['input']= array(
	'id_person',
	'nik',
	'hub_keluarga',
	'status_perkawinan'
);
$config['keluarga']['toolbar'] = array(
	'11' => array('welcome/tambah_keluarga')
);