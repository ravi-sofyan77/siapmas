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

	function get_group_name($id_group=''){
		$ci =&get_instance();
		$ci->load->model('groups');
		$data = $ci->groups->get($id_group);
		if (isset($data['name'])) {
			return $data['name'];
		}
		return false;
	}

	function remove_undefined_column($table_name='',$post=array()){
		$ci =&get_instance();
		$fields = $ci->db->list_fields('pengaduan');
		$keys = array_keys($post);
		if ($keys) {
			foreach ($keys as $key => $value) {
				if (!in_array($value, $fields)) {
					unset($post[$value]);
				}
			}
		}
		return $post;
	}

	function get_username($user_id='')
	{
		$ci =&get_instance();
		$ci->load->model('users');
		
		if ($user = $ci->users->get($user_id)) {
			if (isset($user['username'])) {
				return $user['username'];
			}
		}
	}