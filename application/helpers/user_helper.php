<?php

class User_helper {

    function __construct($id) {
        $CI = & get_instance();
        $CI->db->select
        ('
        sys_user.id as user_id,
        sys_user.username,
        sys_user.`password`,
        sys_user.user_group,
        sys_user.mobile_no,
        sys_user.shop_id,
        sys_user.`status`,
        sys_user.created_date,
        sys_user.ques_id,
        sys_user.ques_ans
        ');
        $user = $CI->db->get_where('sys_user', array('id' => $id))->row();
        if ($user)
        {
            foreach ($user as $key => $value)
            {
                if ($key != "password")
                {
                    $this->$key = $value;
                }
            }

//            $shopinfo = $CI->db->get_where('shop_info', array('id' => $this->shop_id))->row();
//            if ($shopinfo)
//            {
//                foreach ($shopinfo as $key => $value)
//                {
//                    $this->$key = $value;
//                }
//            }

            $usergroup = $CI->db->get_where('sys_user_group', array('id' => $this->user_group))->row();
            if ($usergroup)
            {
                $this->user_group_name = $usergroup->name;
            }
            //get all ids of same ups
//            $CI->db->from('sys_user_info');
//            $CI->db->select('user_id');
//            $result = $CI->db->get()->result_array();
//
//            $this->same_up_user_ids=$result;
//            if(!$this->is_setup)
//            {
//                $CI->db->from('sys_user_info');
//                $CI->db->where('is_setup',1);
//                $CI->db->where("user_id IN(".User_helper::get_same_up_ids_query_string($this).")");
//                $result = $CI->db->get()->row();
//                if($result)
//                {
//                    $CI->db->update('sys_user_info',array('is_setup'=>1),'user_id ='.$this->user_id);
//                    $this->is_setup = 1;
//                }
//
//            }

        }
    }

    public static $logged_user = null;

    public static function login($username, $password) {
        $CI = & get_instance();
        $user = $CI->db->get_where('sys_user', array('username' => $username, 'password' => md5($password), 'status'=>$CI->config->item('db_active')))->row();
        if ($user) {
            $CI->session->set_userdata("user_id", $user->id);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function get_user_details($id)
    {
//        $CI = & get_instance();
//        $CI->db->from("sys_user su");
//        $CI->db->select("sui.*,su.id,sug.name group_name,sug.id group_id,su.status,su.username");
//        $CI->db->join("sys_user_info sui","su.id=sui.user_id");
//        $CI->db->join("sys_user_group sug","sug.id=su.user_group");
//        $CI->db->where("su.id",$id);
//
//        return $CI->db->get()->row_array();

    }

    public static function get_user() {
        $CI = & get_instance();
        if (User_helper::$logged_user) {
            return User_helper::$logged_user;
        } else {
            if($CI->session->userdata("user_id")>0)
            {
                User_helper::$logged_user = new User_helper($CI->session->userdata('user_id'));
                return User_helper::$logged_user;
            }
            else{
                return null;
            }

        }
    }


    public static function get_user_picture($file_name)
    {
        if (!$file_name) {
            return base_url() . "images/users/no_photo.jpg";
        }
        $file = FCPATH . "images/users/" . $file_name;
        if (file_exists($file)) {
            return base_url() . "images/users/" . $file_name;
        } else {
            return base_url() . "images/users/no_photo.jpg";
        }
    }


    public static function save_profile()
    {

        $CI = & get_instance();
        $CI->load->config('upload_config');

        $id = $CI->input->post("id");
        $new_file_name = $id .'-'.time().'.jpg';

        $img = System_helper::file_upload('user_image',$CI->config->item('user_profile_img_upload_folder'), $new_file_name,$CI->config->item('user_profile_img_type'),$CI->config->item('user_profile_img_size'));

        $data_user_info = array(
            'full_name' => $CI->input->post('full_name'),
            'email_address' => $CI->input->post('email_address'),
            'contact_number' => $CI->input->post('contact_number'),
            'address' => $CI->input->post('address')
        );

        if($img != '')
        {
            $data_user_info['profile_image'] = $img;
        }

        if($CI->input->post('password')!='')
        {
            $data_user = array(
                'password' => md5($CI->input->post('password'))
            );
            Query_helper::update('sys_user',$data_user,array("id = ".$id));
        }

        $data_user_info['modify_date']=time();
        Query_helper::update('sys_user_info',$data_user_info,array("user_id = ".$id));
        System_helper::set_system_message($CI->lang->line("MSG_UPDATE_SUCCESS"),1);

    }


    public static function get_same_up_ids_query_string($user)
    {
        $ids_string=",";
        foreach($user->same_up_user_ids as $ids)
        {
            $ids_string.='"'.$ids['user_id'].'",';
        }
        return trim($ids_string,",");
    }

    //////////////// shop ////////////////////

    public static function get_shop_access_id($table='', $id='')
    {
        if($table=="" || $id=="")
        {
            return false;
        }
        else
        {
            $user=User_helper::get_user();
            $CI = & get_instance();
            $CI->db->where('del_status', 0);
            $CI->db->where('shop_id', $user->shop_id);
            $CI->db->where('id', $id);
            $query = $CI->db->get($table);
            if ($query->num_rows() > 0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

    }

    //////////////// shop ////////////////////

}