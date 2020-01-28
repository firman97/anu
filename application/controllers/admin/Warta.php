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

	function upload() {
        $config['upload_path'] = './assets/admin/img/warta/';
        $config['allowed_types'] = 'png|jpg|JPG';
        $config['max_size'] = 1000000;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambarWarta');
        $uploads = $this->upload->data();
        return $uploads['file_name'];
    }

	public function tambah()
	{
		$i = $this->input;
		$gambarWarta = $this->upload();
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
								'image'			=> $gambarWarta
					);
		$this->load->view('admin/layout/wrapper', $data);
		$this->Warta_model->tambah($data);
		redirect('admin/warta');
	}

	public function hapus($id){
		$this->Warta_model->hapus($id);
		if($this->db->affected_rows() > 0){
			echo "<script>alert('Warta berhasil dihapus');</script>";
		}
		echo "<script>window.location='".site_url('admin/warta')."'</script>";
	}

}
