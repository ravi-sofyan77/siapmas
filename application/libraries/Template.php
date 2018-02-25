<?php

/**
* 
*/
class Template 
{
	protected $layout;
	protected $content;
	protected $ci;	
	protected $menu;
	
	function __construct()
	{
		$this->ci =&get_instance();
	}


	public function set_layout($view=''){
		$this->layout = $view;
		return $this;
	}

	public function set_content($content='',$data=array())
	{
		

		$data['me'] 	= $this->ci->router->fetch_class();
		$view_path 		= APPPATH.'views/'.$content.'.php';
		if ($this->ci->logged_in) {
			$data['my']	= $this->ci->logged_in;
		}
		$this->content 	= $content;
		if (file_exists($view_path)) {
			$this->content = $this->ci->load->view($content,$data,true);
		}
		return $this;
	}
	public function render($custom=array())
	{
		$data = array();
		if ($custom) {
			$data = array_merge($data,$custom);
		}
		if ($this->ci->logged_in) {
			$data 			= array_merge($data,$this->ci->logged_in);
			$data['my']		= $this->ci->logged_in;
		}
		$data['default_c']	= $this->ci->router->default_controller;
		$data['alert']		= $this->ci->session->flashdata('alert'); 
		$data['me'] 		= $this->ci->router->fetch_class();
		$data['method']		= $this->ci->router->fetch_method();
		$data['menu']		= $this->menu;
		$data['content'] 	= $this->content;
		if (!is_null($this->layout) || !empty($this->layout)) {
			$this->ci->load->view($this->layout,$data);
		}else{
			echo 'set layout terlebih dahulu';
		}
		
	}
	
	public function set_alert($status='',$pesan='')
	{
		$alert	= (is_array($pesan))? implode(' ', $pesan) : $pesan;
		$pesan 	= trim($pesan);
		if (!empty($pesan)) {
			$pesan = '<div class="c-banner c-banner--'.$status.' alert-dismissible" role="alert">';
			$pesan .='<a href="#" class="c-banner--dimiss">';
			$pesan .='<i class="fa fa-remove" style="font-size: 12px;"></i></a>&nbsp;';
			$pesan .=$alert;
			$pesan .='</div>';
			$this->ci->session->set_flashdata('alert',$pesan);
		}
		return $this;
	}


	public function set_menu($menu=array(),$prefix='daftar_'){
		//pindah sini aja biar dirender ga kebanyakan coding
		$data = array();
		if ($menu) {
			//$this->ci->load->config('rencana_kerja');
			//$config = $this->ci->config->item('menu'); //config untuk mengambil pengaturan menu
			$controller = $this->ci->router->fetch_class();
			foreach ($menu as $key => $value) {
				if (strpos($value,$prefix) !== false) {
					//if (!in_array($value, $config['kecuali'])) {
					$start = strlen($prefix);
					$data[] = array(
						'label' => substr($value, $start),
						'url' => $controller.'/'.$value
					);

				}
			}
		}
		$this->menu = $data;
		return $this;
	}

}