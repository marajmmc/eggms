<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_account_statement extends CI_Controller
{
    public $permissions;
    public $controller_name;
    public $model_name;
    public $grid_link;
    public $view_link;
    public $add_edit_link;

    function __construct()
    {
        parent::__construct();

        $user=User_helper::get_user();

        if(!$user)
        {
            redirect(base_url()."dashboard");
        }

        $this->controller_name = $this->uri->segment(2);
        $this->model_name = $this->uri->segment(2) . "_model";
        $this->grid_link = "tasks/" . $this->controller_name . "/list";
        $this->add_edit_link = "tasks/" . $this->controller_name . "/search";

        $this->load->model("tasks/" . $this->model_name);
        $this->lang->load($this->controller_name);
        $this->permissions=Menu_helper::get_permission($this->controller_name);
    }

    public function index($task="search",$id=0)
    {
        if($task=="search")
        {
            $this->search();
        }
        else if($task=="list")
        {
            $this->report_list();
        }
        else if($task=="pdf")
        {
            $this->report_list("pdf");
        }
        else
        {
            $this->search();
        }
    }
    private function search()
    {
        if($this->permissions['view']=="YES")
        {

            $this->template->set_template('dashboard');
            $this->template->write('title', $this->lang->line("ACCOUNT_STATEMENT_REPORT"));
            $this->template->write_view("content", $this->add_edit_link);
            $this->template->render();
        }
        else
        {
            System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
            redirect(base_url());
        }

    }
    private function report_list($format="")
    {
        $model=$this->model_name;
        if($this->permissions['view']=="YES")
        {
            $form_date=$this->input->post('form_date');
            $to_date=$this->input->post('to_date');
            $this->template->set_template('report');
            $this->template->write('title', $this->lang->line("INCOME_EXPENDITURE_REPORT"));

            $data['results'] = $this->$model->get_report_result($form_date, $to_date);

            $this->template->write_view("content", $this->grid_link, $data);

            if($format!="pdf")
            {
                $this->template->render();
            }
            else
            {
                $html=$this->template->render(NULL,TRUE,FALSE);
                System_helper::get_pdf($html);
            }
        }
        else
        {
            System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
            redirect(base_url());
        }

    }



}

