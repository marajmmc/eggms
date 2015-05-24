<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $user=User_helper::get_user();
        $this->load->model("ajax_model");
    }

    private function jsonReturn($array)
    {
        header('Content-type: application/json');
        echo json_encode($array);
        exit();
    }

    public function get_sub_category_info()
    {
        $category_id=$this->input->post('category_id');
        $category = $this->ajax_model->get_sub_category($category_id);
        $this->jsonReturn($category);
    }

    ////////////// start purchase info //////////////////
    public function get_branch_list()
    {
        $category_id=$this->input->post('category_id');
        $sub_category_id=$this->input->post('sub_category_id');
        $branch = $this->ajax_model->get_branch_list($category_id, $sub_category_id);
        $this->jsonReturn($branch);
    }
    public function get_zilla_list()
    {
        $division_id=$this->input->post('division_id');
        $zilla = $this->ajax_model->get_zilla_list($division_id);
        $this->jsonReturn($zilla);
    }

    public function get_auto_complete()
    {
        $q = ucfirst($_GET['term']);
        return $this->ajax_model->auto_complete($q);
    }
}