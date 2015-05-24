<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_sub_category($category_id)
    {
        $this->db->where('category_id', $category_id);
        $this->db->where('del_status', 0);
        return $this->db->get('product_sub_category')->result_array();
    }

    public function get_zilla_list($division_id)
    {
        $this->db->select('id, zillanameeng');
        $this->db->where('divid', $division_id);
        $this->db->where('visible', 0);
        return $this->db->get('zilla_list')->result_array();
    }

    public function get_branch_list($category_id, $sub_category_id)
    {
        $this->db->select('id, company_name');
        $this->db->where('category_id', $category_id);
        $this->db->where('sub_category_id', $sub_category_id);
        $this->db->where('del_status', 0);
        return $this->db->get('company_ads_info')->result_array();
    }

    function auto_complete($q)
    {
        $this->db->select('company_name');
        $this->db->like('company_name', $q);
        $query = $this->db->get('company_ads_info');
        if($query->num_rows > 0)
        {
            foreach ($query->result_array() as $row)
            {
                //build an array for the towns
                $row_set[] = htmlentities(ucfirst($row['company_name']));
            }
            //format the array into json data
            // header('Content-Type: application/x-json; charset=utf-8');
            // echo json_encode($row_set);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($row_set));
        }
    }
}