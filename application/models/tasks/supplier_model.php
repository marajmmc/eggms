<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function record_count() {
        $user=User_helper::get_user();
        $this->db->from('supplier_info');
        $this->db->where('del_status', 0);
        $this->db->where('shop_id', $user->shop_id);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_list($page) {
        $user=User_helper::get_user();
        $limit = $this->config->item('view_per_page');
        $start = $page * $limit;
//        echo $page . "~" . $limit . "~" . $start;
        $this->db->from("supplier_info");
        $this->db->where('shop_id', $user->shop_id);
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function get_all_record($id = NULL)
    {
        $user=User_helper::get_user();
        if ($id > 0) {
            $this->db->where('id', $id);
        } else {

        }
        $this->db->from("supplier_info");
        $this->db->where('del_status', 0);
        $this->db->where('shop_id', $user->shop_id);
        return $this->db->get()->row_array();
    }


}

