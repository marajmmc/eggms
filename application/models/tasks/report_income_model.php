<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_income_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_report_result($form_date, $to_date, $account_head_id)
    {
        if(!empty($account_head_id))
        {
            $this->db->where('account_statement.account_head_id', $account_head_id);
        }
        if(strtotime($form_date) && strtotime($to_date))
        {
            $this->db->where("account_statement.income_date >= ".strtotime($form_date)." AND account_statement.income_date <= ".strtotime($to_date));
        }
        $this->db->select(' setup_account_head.account_name,
                            account_statement.account_head_id,
                            account_statement.amount,
                            account_statement.income_date,
                            account_statement.description,
                            account_statement.type');
        $this->db->from("account_statement");
        $this->db->join('setup_account_head','setup_account_head.id = account_statement.account_head_id','LEFT');
        $this->db->where('account_statement.del_status', 0);
        $this->db->order_by('account_statement.income_date');
        $this->db->where('setup_account_head.type', $this->config->item('act_income_head_type'));
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();
        $data=array();
        if($result)
        {
            for($i=0; $i<sizeof($result); $i++)
            {
                $date=date('d M Y', $result[$i]['income_date']);
                $data[$date]['date'][]=array
                (
                  'income_date'=>$date,
                  'account_name'=>$result[$i]['account_name'],
                  'amount'=>$result[$i]['amount']
                );
            }
            return $data;
        }
        else
        {
            return $data;
        }
    }
}

