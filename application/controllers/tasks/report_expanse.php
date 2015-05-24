<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_expanse extends CI_Controller
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
            $this->load->model('tasks/common_model');
            $this->template->set_template('dashboard');
            $this->template->write('title', $this->lang->line("TASK_TITLE"));
            $data['account_heads'] = $this->common_model->get_account_head($this->config->item('act_expanse_head_type'));
            $this->template->write_view("content", $this->add_edit_link, $data);
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
            $form_date=$this->input->get('form_date');
            $to_date=$this->input->get('to_date');
            $account_head_id=$this->input->get('account_head_id');
            $this->template->set_template('report');
            $this->template->write('title', $this->lang->line("TASK_TITLE"));
            $data['results'] = $this->$model->get_report_result($form_date, $to_date, $account_head_id);

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

