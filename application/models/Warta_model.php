<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Warta_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Blogs
        public function listWarta() {
            $this->db->select('*');
            $this->db->from('warta');
            $this->db->join('kategori','kategori.category_id = warta.category_id','LEFT');
            $query = $this->db->get();
            return $query;
        } 

        public function readWarta($slugBlog) {
            $this->db->select('*');
            $this->db->from('warta');
            $this->db->join('kategori','kategori.category_id = warta.category_id','LEFT');
            $this->db->where('blog_id', $slugBlog); 
            $query = $this->db->get();
            return $query;
        } 

        public function getAllWartaByCategory($slugBlog) {
            $this->db->select(' warta.blog_id,
                                warta.slug_blog,
                                warta.title,
                                warta.date_post,
                                warta.content,
                                kategori.category_id,
                                kategori.category_name,
                                kategori.slug_category,
                             ');
            $this->db->join('kategori','kategori.category_id = warta.category_id','LEFT');
            $this->db->where('kategori.category_id', $slugBlog); 
            $query = $this->db->get('warta');
            return $query;
        } 

        public function getCategoryById($slugBlog) {
            $this->db->select('*');
            $this->db->from('kategori');
            $this->db->where('category_id', $slugBlog); 
            $query = $this->db->get();
            return $query;
        } 

        public function tambah($data) {
            $this->db->insert('warta',$data);
        }

        public function hapus($id) {
            $this->db->where('blog_id',$id);
            $this->db->delete('warta');
        } 

                                                                                            
    }
