<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Category_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        public function listWarta($id = null) {
            $this->db->select('*');
            $this->db->from('kategori');
            if($id != null){
                $this->db->where('category_id', $id);
            }
            $query = $this->db->get();
            return $query;
        }                                                                                     

    }
