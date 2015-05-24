<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_account_statement_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_report_result($form_date, $to_date)
    {
        $this->db->select(' setup_account_head.account_name,
                            account_statement.account_head_id,
                            account_statement.amount,
                            account_statement.income_date,
                            account_statement.description,
                            account_statement.type');
        $this->db->from("account_statement");
        $this->db->join('setup_account_head','setup_account_head.id = account_statement.account_head_id','LEFT');
        $this->db->where('account_statement.del_status', 0);
        $result = $this->db->get()->result_array();
        //echo $this->db->last_query();
        $data=array();
        if($result)
        {
            for($i=0; $i<sizeof($result); $i++)
            {
                $date=date('d-m-Y', $result[$i]['income_date']);
                $data[$date][$result[$i]['type']]['date']=$date;
                $data[$date][$result[$i]['type']]['account_name']=$result[$i]['account_name'];
                $data[$date][$result[$i]['type']]['amount']=$result[$i]['amount'];
//                $data[$result[$i]['type']][$date]['date'][]=array
//                (
//                    'income_date'=> $date,
//                    'account_name'=> $result[$i]['account_name'],
//                    'amount'=> $result[$i]['amount'],
//                    'description'=> $result[$i]['description'],
//                );
            }
            return $data;
        }
        else
        {
            return $data;
        }
    }
}

