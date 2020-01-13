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
        public function listWarta() {
            $this->db->select('*');
            $this->db->from('warta');
            $query = $this->db->get();
            return $query;
        }                                                                                      

    }
