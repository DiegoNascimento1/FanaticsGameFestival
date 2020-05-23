<?php defined('BASEPATH') or exit('No direct script access allowed'); 

class Blog_model extends CI_Models;
{

    public function getBlog()
    {
        $query = $this->db->get('blog');
        return $query->result(); 
    }

}