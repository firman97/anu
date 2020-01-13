<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warta extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Warta_model');
	}

	public function index()
	{
		$warta 		= $this->Warta_model->listWarta();
		$data = array(
						'warta'	=> $warta,
						'isi' 	=> 'front/warta/list');
		$this->load->view('front/layout/wrapper', $data);
	}
}
