<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_product_category()
    {
        $this->db->from("product_category");
        $this->db->where('del_status', 0);
        $this->db->order_by('product_category.category_name');
//        echo $this->db->last_query();
        return $this->db->get()->result_array();
    }

    public function exist_user_email_address($user_email)
    {
        $this->db->where('username', $user_email);
        $this->db->where('status', 'ACTIVE');
        $result=$this->db->get('sys_user')->num_rows();
        if($result>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}