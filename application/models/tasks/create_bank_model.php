<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_bank_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function record_count()
    {
        $this->db->from('setup_bank_info');
        $this->db->where('del_status', 0);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_list($page) {
        $limit = $this->config->item('view_per_page');
        $start = $page * $limit;
//        echo $page . "~" . $limit . "~" . $start;
        $this->db->from("setup_bank_info");
//        $this->db->order_by('employee_name');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function get_all_record($id = NULL)
    {
        if ($id > 0) {
            $this->db->where('id', $id);
        } else {

        }
        $this->db->from("setup_bank_info");
        $this->db->where('del_status', 0);
        return $this->db->get()->row_array();
    }


}

