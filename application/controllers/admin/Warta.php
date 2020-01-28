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
		
		$warta = $this->Warta_model->listWarta();
		$data = array(
						'warta' => $warta,
						'title' => 'Warta',	
						'isi' 	=> 'admin/warta/list');
		$this->load->view('admin/layout/wrapper', $data);
	}


	public function tambah()
	{
		$i = $this->input;
		$slug_blog = url_title($this->input->post('titleWarta'), 'dash', TRUE);
		$data = array(
								'blog_id'		=> '',
								'user_id'		=> '1',
								'category_id'	=> $i->post('categoryWarta'),
								'title'			=> $i->post('titleWarta'),
								'slug_blog'		=> $slug_blog,
								'content'		=> $i->post('contentWarta'),
								'date_post'		=> $i->post('date_post'),
								'status'		=> 'sama',
								'keywords'		=> 'sama saja',
								'image'			=> $i->post('gambarWarta')
					);
		$this->load->view('admin/layout/wrapper', $data);
		$this->Warta_model->tambah($data);
		redirect('admin/warta');
	}

}
