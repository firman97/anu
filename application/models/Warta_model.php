<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Blogs Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Warta_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Blogs
        public function listWarta($id = null) {
            $this->db->select('*');
            $this->db->from('warta');
            $this->db->join('kategori','kategori.category_id = warta.category_id','LEFT');
            if($id != null){
                $this->db->where('blog_id', $id);
            }
            
            $query = $this->db->get();
            return $query;
        } 

        public function listWartas($slugBlog = null) {
            $this->db->select('*');
            $this->db->from('warta');
            $this->db->join('kategori','kategori.category_id = warta.category_id','LEFT');
            if($slugBlog != null){
                $this->db->where('blog_id', $slugBlog);
            }
            
            $query = $this->db->get();
            return $query;
        } 

        public function readWarta($slugBlog) {
            $this->db->select('*');
            $this->db->from('warta');
            $this->db->join('kategori','kategori.category_id = warta.category_id','LEFT');
            $this->db->where('slug_blog', $slugBlog);
            $query = $this->db->get();
            return $query;
        }                                                                                      

    }
