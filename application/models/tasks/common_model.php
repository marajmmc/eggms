<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Common_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_account_head($account_type)
    {

        $this->db->select(' setup_account_head.id,
                            setup_account_head.account_name');
        $this->db->from("setup_account_head");
        $this->db->where('setup_account_head.del_status', 0);
        $this->db->where('setup_account_head.status', 0);
        $this->db->where('setup_account_head.type', $account_type);
        return $this->db->get()->result_array();
    }

    public function get_bank_list()
    {
        $this->db->select(' setup_bank_info.id,
                            setup_bank_info.bank_name');
        $this->db->from("setup_bank_info");
        $this->db->where('setup_bank_info.del_status', 0);
        $this->db->where('setup_bank_info.status', 0);
        return $this->db->get()->result_array();
    }
}

