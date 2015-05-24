<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Control_panel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form'));
        $this->load->library(array('form_validation'));
        $this->lang->load("super_admin");
        $user=User_helper::get_user();

        if(!$user)
        {
            redirect(base_url()."dashboard");
        }
        else if($user->user_group!=1)
        {
            redirect(base_url()."dashboard");
        }

    }

    public function index() {
        $this->modules_tasks();
    }

    public function modules_tasks($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->modules_tasks_list();
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->modules_tasks_add_edit($id);
        }
        elseif($task=="save")
        {
            $this->save_module_task();
            redirect(base_url()."super_admin/control_panel/modules_tasks/list");

        }
        else
        {
            $this->modules_tasks_list();
        }
    }
    private function modules_tasks_list()
    {
        $this->load->model("super_admin/control_panel_model");
        $this->template->set_template('dashboard');
        $this->template->write('title', $this->lang->line("MENU_MODULES_TASKS"));
        $data['modules_tasks']=$this->control_panel_model->get_modules_tasks_tree();

        $this->template->write_view("content","super_admin/modules_tasks",$data);
        $this->template->render();
    }
    private function modules_tasks_add_edit($id)
    {
        $this->load->model("super_admin/control_panel_model");
        $this->template->set_template('dashboard');

        $this->template->write('title', $this->lang->line("MENU_MODULES_TASKS"));

        $data["modules"] = $this->control_panel_model->get_modules();
        if ($id != 0)
        {
            $data["module_task"] = $this->control_panel_model->get_module_task_details($id);
        }
        else
        {
            $data["module_task"] = Array('id' => 0, 'name' => '', 'type' => '', 'parent' => '', 'controller_name' => '', 'order' => '0', 'status' => '', 'created_date' => '');
        }




        $this->template->write_view("content", "super_admin/module_add_edit", $data);
        $this->template->render();

    }
    private function save_module_task()
    {
        $this->load->model("super_admin/control_panel_model");
        $id=$this->input->post("id");
        $data = array(
            'name' => $this->input->post('name'),
            'type' => $this->input->post('type'),
            'parent' => $this->input->post('parent'),
            'controller_name' => $this->input->post('controller_name'),
            'order' => $this->input->post('order'),
            'status' => $this->input->post('status')
        );
        if($id>0)
        {
            if(Query_helper::update("sys_module_task",$data,array("id = ".$id)))
            {
                System_helper::set_system_message($this->lang->line("MSG_UPDATE_SUCCESS"),1);
            }
            else
            {
                System_helper::set_system_message($this->lang->line("MSG_UPDATE_FAIL"),2);
            }

        }
        else
        {
            $data['created_date']=time();
            if(Query_helper::add("sys_module_task",$data))
            {
                System_helper::set_system_message($this->lang->line("MSG_CREATE_SUCCESS"),1);
            }
            else
            {
                System_helper::set_system_message($this->lang->line("MSG_CREATE_FAIL"),0);
            }
        }
    }

    public function access_level($task="details",$module_id)
    {
        if($task=="details")
        {
            $this->access_level_details($module_id);
        }
        elseif($task=="save")
        {
            $this->access_level_save($module_id);
            redirect(base_url()."super_admin/control_panel/modules_tasks/list");
        }
        else
        {
            $this->access_level_details($module_id);
        }

    }
    private function access_level_details($module_id)
    {
        $this->load->model("super_admin/control_panel_model");
        $this->template->set_template('dashboard');

        $this->template->write('title', $this->lang->line("MENU_MODULES_TASKS"));
        $data['user_groups']=$this->control_panel_model->get_user_groups();
        $data['module']=$this->control_panel_model->get_module_task_details($module_id);
        $this->template->write_view("content", "super_admin/access_level_details", $data);
        $this->template->render();

    }
    private function access_level_save($task_id)
    {
        $this->load->model("super_admin/control_panel_model");
        $user_groups=$this->control_panel_model->get_user_groups();
        foreach($user_groups as $user_group)
        {
            $data=array();
            $data['user_group_id']=$user_group['id'];
            $data['task_id']=$task_id;

            $data['add']=$this->input->post("add".$user_group['id']);
            $data['edit']=$this->input->post("edit".$user_group['id']);
            $data['delete']=$this->input->post("delete".$user_group['id']);

            if( $data['add']=='YES' || $data['edit']=='YES' || $data['delete']=='YES'){
                $data['view']="YES";
            }else{
                $data['view']=$this->input->post("view".$user_group['id']);
            }

            $access=$this->control_panel_model->get_user_group_access($user_group['id'],$task_id);
            if($access)
            {
                Query_helper::update("sys_task_access",$data,array("id = ".$access['id']));
            }
            else
            {
                Query_helper::add("sys_task_access",$data);
            }
        }
        System_helper::set_system_message($this->lang->line("MSG_UPDATE_SUCCESS"),1);

    }
    public function user_groups($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->user_groups_list();
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->user_groups_add_edit($id);
        }
        elseif($task=="save")
        {
            $this->save_user_group();
            redirect(base_url()."super_admin/control_panel/user_groups/list");

        }
        else
        {
            $this->user_groups_list();
        }
    }
    private function user_groups_list()
    {
        $this->load->model("super_admin/control_panel_model");
        $this->template->set_template('dashboard');
        $this->template->write('title', $this->lang->line("MENU_USER_GROUPS"));


        $data['user_groups']=$this->control_panel_model->get_user_groups();

        $this->template->write_view("content","super_admin/user_groups",$data);
        $this->template->render();
    }
    private function user_groups_add_edit($id)
    {
        $this->load->model("super_admin/control_panel_model");
        $this->template->set_template('dashboard');

        $this->template->write('title', $this->lang->line("MENU_USER_GROUPS"));

        if ($id != 0)
        {
            $data["user_group"] = $this->control_panel_model->get_user_group_details($id);
        }
        else
        {
            $data["user_group"] = Array('id' => 0, 'name' => '', 'status' => '', 'created_date' => '');
        }




        $this->template->write_view("content", "super_admin/user_group_add_edit", $data);
        $this->template->render();

    }
    private function save_user_group()
    {
        $this->load->model("super_admin/control_panel_model");
        $id=$this->input->post("id");
        $data = array(
            'name' => $this->input->post('name'),
            'status' => $this->input->post('status')
        );
        if($id>0)
        {
            if(Query_helper::update("sys_user_group",$data,array("id = ".$id)))
            {
                System_helper::set_system_message($this->lang->line("MSG_UPDATE_SUCCESS"),1);
            }
            else
            {
                System_helper::set_system_message($this->lang->line("MSG_UPDATE_FAIL"),2);
            }

        }
        else
        {
            $data['created_date']=time();
            if(Query_helper::add("sys_user_group",$data))
            {
                System_helper::set_system_message($this->lang->line("MSG_CREATE_SUCCESS"),1);
            }
            else
            {
                System_helper::set_system_message($this->lang->line("MSG_CREATE_FAIL"),0);
            }
        }
    }
    public function fiscal_year_setup($task="list",$id=0)
    {

        if($task=="list")
        {
            $this->fiscal_year_add_edit($id);
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->fiscal_year_add_edit($id);
        }
        elseif($task=="save")
        {
            $this->fiscal_year_save();
            redirect(base_url()."super_admin/control_panel/fiscal_year_setup/list");

        }
        else
        {
            $this->fiscal_year_add_edit($id);
        }
    }
    private function fiscal_year_add_edit($id)
    {
        $this->template->set_template('dashboard');
        $this->template->write('title', $this->lang->line("FISCAL_YEAR_SETUP"));
        $data=array();
        $this->template->write_view("content", "super_admin/fiscal_year_add_edit",$data);
        $this->template->render();

    }
    private function fiscal_year_save()
    {
        $fiscal_year=$this->input->post("fiscal_year");
        //"2014_2015_budget";

        $accbalance_table=str_replace("-","_",$fiscal_year)."_accbalance";
        $household_table=str_replace("-","_",$fiscal_year)."_household";
        $taxassessment_table=str_replace("-","_",$fiscal_year)."_taxassessment";
        $voucher_table=str_replace("-","_",$fiscal_year)."_voucher";

        $this->db->trans_start();  //DB Transaction Handle START

        foreach($this->config->item("system_zilla_ids") as $zilla)
        {
            $this->db->query("CREATE TABLE IF NOT EXISTS ".$zilla."_".$accbalance_table." LIKE  accbalance");
            $this->db->query("CREATE TABLE IF NOT EXISTS ".$zilla."_".$household_table." LIKE  household");
            $this->db->query("CREATE TABLE IF NOT EXISTS ".$zilla."_".$taxassessment_table." LIKE  taxassessment");
            $this->db->query("CREATE TABLE IF NOT EXISTS ".$zilla."_".$voucher_table." LIKE  voucher");
        }
        $budget_table=str_replace("-","_",$fiscal_year)."_budget";//budget table will only fiscal year
        $this->db->query("CREATE TABLE IF NOT EXISTS ".$budget_table." LIKE budget");
        Query_helper::add("fiscal_year_setup",array("fiscal_year"=>$fiscal_year));
        $this->db->trans_complete();   //DB Transaction Handle END

        if ($this->db->trans_status() === TRUE)
        {
            System_helper::set_system_message($this->lang->line("MSG_CREATE_SUCCESS"),1);
        }
        else
        {
            System_helper::set_system_message($this->lang->line("TRY_AGAIN"),0);
        }


    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */