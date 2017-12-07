<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
	'register'=>array(
		array('field'=>'username','label'=>'Nama akun','rules'=>'trim|required|is_unique[users.username]')
		,array('field'=>'password','label'=>'Kata sandi','rules'=>'trim|required')
		,array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email|is_unique[users.email]')
		,array('field'=>'group','label'=>'UserGroup ','rules'=>'trim|required')

	),
	'simpan_brosur' =>array(
		array('field'=>'judul_brosur','label'=>'judul brosur produk','rules'=>'trim|required')
	),
	'create_inquiry' =>array(
		array('field'=>'keterangan_produk','label'=>'Keterangan produk','rules'=>'trim|required')
		,array('field'=>'keperluan_pengadaan','label'=>'keperluan Pengadaan','rules'=>'trim|required')
	),
	'tambah_referensi_inquiry' => array(
		array('field'=>'referensi_tautan','label'=>'Tautan terkait','rules'=>'trim|required')
	),
	'reset_password' => array(
		array('field'=>'password','label'=>'password','rules'=>'trim|required')
		,array('field'=>'cpassword','label'=>'konfirmasi password','rules'=>'trim|required|matches[password]')
	),
	'simpan_postingan' => array(
		array('field'=>'url_post','label'=>'Tautan postingan','rules'=>'trim|required')
	),
	'simpan_harga_inquiry' => array(
		array('field'=>'harga_produk','label'=>'Tautan postingan','rules'=>'trim|required|is_natural'),
	),
	'set_harga_jual_inquiry' => array(
		array('field'=>'harga_jual','label'=>'Tautan postingan','rules'=>'trim|required|is_natural'),
	),
	'kirim_proyek'=>array(
		array('field'=>'proyek_mulai','label'=>'tanggal mulai proyek','rules'=>'trim|required')
		,array('field'=>'proyek_jatuh_tempo','label'=>'tanggal jatuh tempo proyek','rules'=>'trim|required')
		,array('field'=>'judul_proyek','label'=>'Judul Proyek','rules'=>'trim|required')
	),
	'simpan_progress_proyek'=>array(
		array('field'=>'keterangan_progress','label'=>'Keterangan progress','rules'=>'trim|required')
		,array('field'=>'persentase_progress','label'=>'persentase progress','rules'=>'trim|required')
	),
	'ubah_stok_produk'=>array(
		array('field'=>'stok_produk','label'=>'Stok Produk','rules'=>'trim|required|is_natural')
		,array('field'=>'id','label'=>'id produk','rules'=>'trim|required|is_natural_no_zero')
	),

	
);