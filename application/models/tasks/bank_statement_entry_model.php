<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bank_statement_entry_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function record_count()
    {
        $this->db->from('bank_statement');
        $this->db->where('del_status', 0);
        $query = $this->db->count_all_results();
        return $query;
    }

    public function get_list($page) {
        $limit = $this->config->item('view_per_page');
        $start = $page * $limit;
//        echo $page . "~" . $limit . "~" . $start;
        $this->db->select('
                            bank_statement.id,
                            bank_statement.shop_id,
                            bank_statement.bank_id,
                            bank_statement.amount,
                            bank_statement.payment_date,
                            bank_statement.payment_type,
                            bank_statement.description,
                            bank_statement.`status`,
                            bank_statement.del_status,
                            bank_statement.ModifiedBy,
                            bank_statement.ModificationDate,
                            bank_statement.CreatedBy,
                            bank_statement.CreationDate,
                            setup_bank_info.bank_name
                        ');
        $this->db->from("bank_statement");
        $this->db->join('setup_bank_info', 'setup_bank_info.id = bank_statement.bank_id', 'LEFT');
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
        $this->db->from("bank_statement");
        $this->db->where('del_status', 0);
        return $this->db->get()->row_array();
    }

    public function get_bank()
    {
        $this->db->from("setup_bank_info");
        $this->db->where('del_status', 0);
        return $this->db->get()->result_array();
    }


}

