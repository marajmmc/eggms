<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    public $permissions;
    function __construct()
    {
        parent::__construct();
        $user=User_helper::get_user();

        if(!$user)
        {
            redirect(base_url()."dashboard");
        }
        $this->permissions=Menu_helper::get_permission('users');
        $this->load->model("tasks/users_model");
        $this->lang->load("task_users");
    }

    public function index($task="list",$id=0)
    {
        if($task=="list")
        {
            $this->users_list($id);
        }
        elseif($task=="add" || $task=="edit")
        {
            $this->user_add_edit($id);
        }
        elseif($task=='details')
        {
            $this->user_details($id);
        }
        elseif($task=="save")
        {
            $this->user_save();
            redirect(base_url()."tasks/users");

        }
        elseif($task=="save_profile")
        {
            $this->save_profile();
            redirect(base_url()."tasks/users");

        }
        else
        {
            $this->users_list($id);
        }
    }

    private function users_list($page=0)
    {
        if($this->permissions['view']=="YES")
        {
            $this->load->library('pagination');

            $config = System_helper::pagination_config(base_url() . "tasks/users/index/list/",$this->users_model->get_total_users(),5);
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();

            $this->template->set_template('dashboard');
            $this->template->write('title', $this->lang->line("MENU_MODULES_TASKS"));
            $data['permissions']=$this->permissions;
            if($page>0)
            {
                $page=$page-1;
            }

            $data['users'] = $this->users_model->get_users($page);

            $this->template->write_view("content", "tasks/users/users_list", $data);
            $this->template->render();
        }
        else
        {
            System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
            redirect(base_url());

        }
    }

    private function user_add_edit($id)
    {
        if($id>0)
        {
            if($this->permissions['edit']!="YES")
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

        $this->template->write('title', $this->lang->line("MENU_USER"));
        $this->load->model("super_admin/control_panel_model");
        $data['user_groups']=$this->users_model->get_editable_user_groups();

        if ($id != 0)
        {
            $this->load->model('ajax_model');
            $data["user"] = User_helper::get_user_details($id);

            if($data["user"]['group_id'] > $this->config->item('id_ministry'))
            {
                $data['divisions']= $this->ajax_model->get_division_by_access();
            }

            if($data["user"]['group_id'] > $this->config->item('id_division'))
            {
                $divid = $data["user"]['division'];
                $data['zillas']= $this->ajax_model->get_zilla_by_access($divid);
            }

            if($data["user"]['group_id'] > $this->config->item('id_zilla'))
            {
                $zillaid = $data["user"]['zilla'];
                $data['upazillas']= $this->ajax_model->get_upazilla_by_access($zillaid);
            }

            if($data["user"]['group_id'] > $this->config->item('id_upazilla'))
            {
                $zillaid = $data["user"]['zilla'];
                $upazillaid = $data["user"]['upazilla'];
                $data['unions']= $this->ajax_model->get_union_by_access($upazillaid, $zillaid);
            }

            $user = User_helper::get_user();

            if($data['user']['group_id'] <= $user->user_group)
            {
                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
                redirect(base_url());
            }
        }
        else
        {
            $data["user"] = Array(
                'id' => 0,
                'username' => '',
                'center_id' => '',
                'status' => '',
                'user_group' => '',
                'full_name'=>'',
                'email_address'=>'',
                'group_id'=>'',
                'contact_number'=>'',
                'address'=>'',
                'profile_image'=>'',
                'modify_date'=>'',
                'division'=>'',
                'zilla'=>'',
                'upazilla'=>'',
                'union'=>'',
                'citycorporation'=>'',
                'citycorporationward'=>'',
                'municipal'=>'',
                'municipalward'=>'',
                'login_status'=>'',
            );
        }

        $this->template->write_view("content", "tasks/users/user_add_edit", $data);
        $this->template->render();

    }



    private function user_save()
    {
        $id = $this->input->post("id");

        if($id>0)
        {
            if($this->permissions['edit']!="YES")
            {
                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
                redirect(base_url());

            }
        }
        else{
            //go to add page
            if($this->permissions['add']!="YES")
            {
                System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
                redirect(base_url());

            }
        }


        $data_user = array(
            'user_group' => $this->input->post('user_group'),
            'status' => $this->input->post('status')
        );
        $data_user_info = array(
            'full_name' => $this->input->post('full_name'),
            'email_address' => $this->input->post('email_address')
        );

        if($data_user['user_group'] > $this->config->item('id_ministry'))
        {
            $data_user_info['division'] = $this->input->post('division');
        }else
        {
            $data_user_info['division'] = '00';
        }

        if($data_user['user_group'] > $this->config->item('id_division'))
        {
            $data_user_info['zilla'] = $this->input->post('zilla');
        }
        else
        {
            $data_user_info['zilla'] = '00';
        }

        if($data_user['user_group'] > $this->config->item('id_zilla'))
        {
            $data_user_info['upazilla'] = $this->input->post('upazilla');
        }
        else
        {
            $data_user_info['upazilla'] = '00';
        }

        if($data_user['user_group'] > $this->config->item('id_upazilla'))
        {
            $data_user_info['union'] = $this->input->post('union');
        }
        else
        {
            $data_user_info['union'] = '00';
        }

        if($data_user['user_group'] == $this->config->item('id_union')){


            $last_user_id = $this->users_model->get_last_user_id($data_user_info['division'],$data_user_info['zilla'],$data_user_info['upazilla'],$data_user_info['union']) + 1;

            $new_user_id = $last_user_id>9?$last_user_id:'0'.$last_user_id;
            $data_user['username'] = $data_user_info['division'].'-'.$data_user_info['zilla'].'-'.$data_user_info['upazilla'].'-'.$data_user_info['union'].'-'.$new_user_id;
        }
        else
        {
            $data_user['username'] = $this->input->post('username');
        }

//        $data_user['password'] = $data_user['username'];

        //do saving task here and set system message of the result
        if($id>0){

            Query_helper::update('sys_user',$data_user,array("id = ".$id));
            $data_user_info['modify_date']=time();
            Query_helper::update('sys_user_info',$data_user_info,array("user_id = ".$id));
            System_helper::set_system_message($this->lang->line("MSG_UPDATE_SUCCESS"),1);

        }
        else
        {
            $data_user['password'] = md5($data_user['username']);
            $data_user['created_date']=time();
            Query_helper::add('sys_user',$data_user);
            $data_user_info['user_id'] = $this->db->insert_id();
            $data_user_info['modify_date']=time();
            Query_helper::add('sys_user_info',$data_user_info);

            System_helper::set_system_message($this->lang->line("MSG_CREATE_SUCCESS"),1);

        }
        // Mail function will be added here!!!

    }

    private function user_details($id)
    {
        if($this->permissions['view']=="YES")
        {
            $this->template->set_template('dashboard');
            $this->template->write('title', $this->lang->line("TITLE_PROFILE"));
            $data['permissions']=$this->permissions;

            $data['user']= User_helper::get_user_details($id);
            $data['edit_action'] = base_url().'tasks/users/index/save_profile';

            $this->template->write_view("content", "tasks/profile/profile_detail", $data);
            $this->template->render();
        }

        else
        {
            System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
            redirect(base_url());

        }
    }

    private function save_profile()
    {
        if($this->permissions['edit']!="YES")
        {
            System_helper::set_system_message($this->lang->line("MSG_NO_ACCESS"),0);
            redirect(base_url());

        }
//        print_r($this->input->post());
        User_helper::save_profile();
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */