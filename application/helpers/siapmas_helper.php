<?php

	function get_nama_sarana($id_sarana='')
	{
		$ci =&get_instance();
		$ci->load->model('sarana');
		$data = $ci->sarana->get($id_sarana);
		if ($data  && isset($data['nama_sarana'])) {
			return $data['nama_sarana'];
		}
		return false;
	}	