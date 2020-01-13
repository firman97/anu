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
            if($id != null){
                $this->db->where('blog_id', $id);
            }
            $query = $this->db->get();
            return $query;
        }                                                                                      

    }
