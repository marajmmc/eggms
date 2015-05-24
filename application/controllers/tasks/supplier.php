<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends CI_Controller
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
        $this->add_edit_link = "tasks/" . $this->controller_name . "/add_edit";

        $this->load->model("tasks/" . $this->model_name);
        $this->lang->load($this->controller_name);
        $this->permissions=Menu_helper::get_permission($this->controller_name);


    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->record_list($id);
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->record_add_edit($id);
        }
        elseif($task=="delete")
        {
            $this->record_delete($id);
        }
        elseif($task=="save")
        {
            $this->record_save();
            redirect(base_url()."tasks/".$this->controller_name);
        }
        else
        {
            $this->record_list($id);
        }
    }

    private function record_list($page=0)
    {

        $model=$this->model_name;
        if($this->permissions['view']=="YES")
        {

            $this->load->library('pagination');

            $config = System_helper::pagination_config(base_url() ."tasks/".$this->controller_name."/index/list", $this->$model->record_count(),5);
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $this->template->set_template('dashboard');

            $this->template->write('title', $this->lang->line("TASK_TITLE"));
            $data['permissions']=$this->permissions;

            if($page>0)
            {
                $page=$page-1;
            }

            $data['row_info'] = $this->$model->get_list($page);

            $this->template->write_view("content", $this->grid_link, $data);
            $this->template->render();
        }
        else
        {
            System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
            redirect(base_url());

        }
    }

    private function record_add_edit($id)
    {
        $model=$this->model_name;
        if($id>0)
        {
            if($this->permissions['edit']!="YES" || User_helper::get_shop_access_id("supplier_info", $id)== false)
            {
                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
                redirect(base_url());

            }
        }
        else
        {

            if($this->permissions['add']!="YES")
            {
                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
                redirect(base_url());

            }
        }

        $this->template->set_template('dashboard');
        $this->template->write('title', $this->lang->line("TASK_TITLE"));

        if ($id != 0)
        {
            $data['row_info'] = $this->$model->get_all_record($id);
        }
        else
        {
            $data["row_info"] = Array(
                'id' => 0,
                'supplier_name' => '',
                'company_name' => '',
                'phone_number' => '',
                'email' => '',
                'type' => '',
                'address' => '',
                'status' => $this->config->item('active')

            );
        }

        $this->template->write_view("content", $this->add_edit_link, $data);
        $this->template->render();
    }

    private function record_save()
    {
        $id = $this->input->post("row_id");

        if($id>0)
        {
            if($this->permissions['edit']!="YES" || User_helper::get_shop_access_id("supplier_info", $id)== false)
            {
                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
                redirect(base_url());
            }
        }
        else
        {
            if($this->permissions['add']!="YES")
            {
                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
                redirect(base_url());
            }
        }

        $user = User_helper::get_user();

        $data = Array
        (
            'shop_id' => $user->shop_id,
            'supplier_name' => $this->input->post('supplier_name'),
            'company_name' => $this->input->post('company_name'),
            'phone_number' => $this->input->post('phone_number'),
            'email' => $this->input->post('email'),
            'type' => $this->input->post('type'),
            'address' => $this->input->post('address'),
            'Status' => $this->input->post('status')
        );

        if(!$this->checkValidation())
        {
            System_helper::set_system_message($this->lang->line("MSG_INVALID_DATA"),0);

            if($id==0)
            {
                redirect(base_url().'tasks/'.$this->controller_name.'/index/add');
            }
            else
            {
                redirect(base_url().'tasks/'.$this->controller_name.'/index/edit/'.$id);
            }
        }

        if($id>0)
        {
            $data['ModifiedBy'] = $user->user_id;
            $data['ModificationDate'] = System_helper::convert_date('date','CurrentSqlDateTime');

            Query_helper::update('supplier_info',$data,array("id = ".$id));
            System_helper::set_system_message($this->lang->line("MSG_UPDATE_SUCCESS"),1);

        }
        else
        {
            $data['CreatedBy'] = $user->user_id;
            $data['CreationDate'] = System_helper::convert_date('date','CurrentSqlDateTime');

            Query_helper::add('supplier_info',$data);
            System_helper::set_system_message($this->lang->line("MSG_CREATE_SUCCESS"),1);

        }
    }

//    private function record_delete($id)
//    {
//        if($id>0)
//        {
//            if($this->permissions['delete']!="YES")
//            {
//                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
//                redirect(base_url());
//            }
//            else
//            {
//                Query_helper::update('committee',array("IsDeleted"=>1),array("CommitteeId = ".$id));
//                redirect(base_url().'tasks/committee');
//            }
//        }
//    }

    private function checkValidation()
    {
        $this->load->helper('validation_helper');

        if (!Validation_helper::is_empty($this->input->post('supplier_name'))) {
            return false;
        }
        if (!Validation_helper::is_empty($this->input->post('phone_number'))) {
            return false;
        }
        if (!Validation_helper::is_empty($this->input->post('type'))) {
            return false;
        }
        if (!Validation_helper::is_empty($this->input->post('status'))) {
            return false;
        }

        return true;
    }




}

