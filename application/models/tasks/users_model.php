<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_total_users()
    {
        $user = User_helper::get_user();

        $this->db->from("sys_user su");
        $this->db->select("sui.*,sug.name group_name,su.status,su.username");
        $this->db->join("sys_user_info sui","su.id=sui.user_id");
        $this->db->join("sys_user_group sug","sug.id=su.user_group");
        $this->db->where("sug.id !=1");
        $this->db->where("sug.id > ", $user->user_group);


        return $this->db->count_all_results();

    }

    public function get_users($page=0)
    {
        $user = User_helper::get_user();

        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from("sys_user su");
        $this->db->select("sui.*,sug.name group_name,su.status,su.username");
        $this->db->join("sys_user_info sui","su.id=sui.user_id");
        $this->db->join("sys_user_group sug","sug.id=su.user_group");
        $this->db->where("sug.id !=1");
        $this->db->where("sug.id > ", $user->user_group);

        $this->db->limit($limit,$start);
        return $this->db->get()->result_array();

    }

    public function get_editable_user_groups()
    {
        $user = User_helper::get_user();

        $this->db->where("status",$this->config->item('db_active'));
        $this->db->where("id > ",$user->user_group);
        return $this->db->get('sys_user_group')->result_array();
    }

    public function get_last_user_id($divid='',$zillaid='',$upazillaid='',$unionid='')
    {
        $user = User_helper::get_user();
        $like_id = $divid.'-'.$zillaid.'-'.$upazillaid.'-'.$unionid;

        $this->db->select('username');
        $this->db->like("username", $like_id);
        $data = $this->db->get('sys_user')->result_array();


        if($data)
        {
            $max = 0;

            foreach($data as $d){
                $last_id = intval(substr($d['username'], -2));
                if($last_id > $max)
                {
                    $max = $last_id;
                }
            }
          return $max;

        }
        else
        {
            return 0;
        }

    }
}

