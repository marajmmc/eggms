<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expenditure_adds_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function record_count()
    {
        $this->db->from('account_statement');
        $this->db->where('account_statement.type', 2);
        $this->db->where('del_status', 0);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_list($page) {
        $limit = $this->config->item('view_per_page');
        $start = $page * $limit;
//        echo $page . "~" . $limit . "~" . $start;
        $this->db->select('account_statement.account_head_id,
account_statement.amount,
account_statement.income_date,
account_statement.description,
account_statement.`status`,
account_statement.del_status,
setup_account_head.account_name,
account_statement.id');
        $this->db->from("account_statement");
        $this->db->where('account_statement.type', 2);
        $this->db->join('setup_account_head', 'setup_account_head.id = account_statement.account_head_id', 'LEFT');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function get_all_record($id = NULL)
    {
        if ($id > 0) {
            $this->db->where('id', $id);
        } else {

        }
        $this->db->from("account_statement");
        $this->db->where('account_statement.type', 2);
        $this->db->where('del_status', 0);
        return $this->db->get()->row_array();
    }

    public function account_head()
    {
        $this->db->from("setup_account_head");
        $this->db->where('del_status', 0);
        $this->db->where('type', 2);
        return $this->db->get()->result_array();
    }


}

