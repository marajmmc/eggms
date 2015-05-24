<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Control_panel_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    public function get_modules_tasks_tree()
    {
        $this->db->where("parent",0);
        $this->db->order_by("order", "asc");
        $level0 = $this->db->get("sys_module_task")->result_array();


        $tree=array();
        foreach ($level0 as $module)
        {
            $this->get_sub_modules_tasks_tree($module,"",$tree);
        }
        return $tree;


    }
    public function get_sub_modules_tasks_tree($module,$prefix,&$tree)
    {
        $tree[]=array("prefix"=>$prefix,"module_task"=>$module);
        $this->db->where("parent",$module['id']);
        $this->db->order_by("order", "asc");
        $subs = $this->db->get_where("sys_module_task")->result_array();
        if (sizeof($subs) > 0){
            foreach ($subs as $sub){
                $this->get_sub_modules_tasks_tree($sub,$prefix."- ",$tree);
            }
        }

    }

    public function get_modules_tasks_html()
    {
        $level0 = $this->db->get_where("sys_module_task", array("parent" => 0))->result_array();
        $menu_string = "";
        foreach ($level0 as $module)
        {
            $menu_string.=$this->get_sub_modules_tasks_html($module);
        }
        if($menu_string)
        {
            $menu_string="<ul>".$menu_string."</ul>";
        }
        return $menu_string;

    }
    public function get_sub_modules_tasks_html($module)
    {
        if ($module['type'] == "TASK")
        {
            return '<li>
                    <a href="' . base_url() . "super_admin/control_panel/modules_tasks/edit/" .$module['id'].'">
                        '.$module['name'].'
                    </a>
                </li>';
        }
        else if ($module['type'] == "MODULE")
        {
            $subs = $this->db->get_where("sys_module_task", array("parent" => $module['id']))->result_array();
            $sub_modules_tasks_string="";

            if (sizeof($subs) > 0)
            {
                $total_str = "";
                foreach ($subs as $sub)
                {
                    $submenu_str = $this->get_sub_modules_tasks_html($sub);
                    if (strlen($submenu_str) > 0)
                    {
                        $total_str.=$submenu_str;
                    }
                }
                if (strlen($total_str) > 0)
                {
                    $sub_modules_tasks_string="<ul>".$total_str."</ul>";
                }
            }
            return '<li>
                    <a href="' . base_url() . "super_admin/control_panel/modules_tasks/edit/" .$module['id'].'">
                        '.$module['name'].'
                    </a>'.$sub_modules_tasks_string.'
                </li>';


        }

    }
    public function get_module_task_details($id)
    {
        return $this->db->get_where('sys_module_task',array("id"=>$id))->row_array();
    }
    public function get_user_group_details($id)
    {
        return $this->db->get_where('sys_user_group',array("id"=>$id))->row_array();
    }


    public function get_modules()
    {
        return $this->db->get_where('sys_module_task',array("type"=>"MODULE"))->result_array();
    }
    public function get_user_groups()
    {
        $this->db->where("id != 1");
        $this->db->where("status",$this->config->item('db_active'));
        return $this->db->get('sys_user_group')->result_array();
    }
    public function get_user_group_access($user_group_id,$task_id)
    {
        $this->db->where("user_group_id",$user_group_id);
        $this->db->where("task_id",$task_id);
        return $this->db->get('sys_task_access')->row_array();
    }


}

