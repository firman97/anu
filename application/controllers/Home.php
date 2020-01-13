<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data = array(
						'isi' => 'front/home/list');
		$this->load->view('front/layout/wrapper', $data);
	}
}
