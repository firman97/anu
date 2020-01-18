<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Category_model');
	}

	public function index()
	{
		$warta 		= $this->Category_model->listWarta();
		$data = array(
						'warta'	=> $warta,
						'isi' 	=> 'front/home/list');
		$this->load->view('front/layout/wrapper', $data);
	}

}
