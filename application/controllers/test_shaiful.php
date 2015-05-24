<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Test_shaiful extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    public function index($username="")
    {
//        include(FCPATH."mpdf/mpdf.php");
//        $mpdf=new mPDF();
//        $mpdf->useAdobeCJK=true;
//        $mpdf->SetAutoFont(AUTOFONT_ALL);
//        $mpdf->WriteHTML("i am shiaful");
//        $mpdf->Output();
        $user=User_helper::get_user();
        $bank_account_no="3.01.02.01";
        $this->load->model('tasks/transaction_bank_reconciliation_model');
        $bank_details=$this->transaction_bank_reconciliation_model->get_bank_all_info($bank_account_no);
        print_r($bank_details);


    }
}