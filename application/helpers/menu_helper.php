<?php

class Menu_helper
{
    public static function get_main_menu()
    {
        $CI = & get_instance();
        $level0 = $CI->db->get_where("sys_module_task", array("parent" => 0))->result_array();

        $menu_string = "";
        foreach ($level0 as $module)
        {
            $menu_string.=Menu_helper::get_sub_menu($module);
        }

        $user = User_helper::get_user();
        $usergroup = $user->user_group;
        if ($usergroup == "1")
        {
            $admin_menu = $CI->load->view('super_admin/superadmin_menu');
            $menu_string = $admin_menu . $menu_string;
        }
        return $menu_string;
    }

    public static function get_sub_menu($module)
    {
        $CI = & get_instance();

        if ($module['type'] == "TASK")
        {
            if (Menu_helper::has_permission($module))
            {
                return '<li>
                        <a href="' . base_url() . "tasks/" . $module['controller_name'] . '">
                            <span>' . $module['name'] . '</span>
                        </a>
                    </li>';
            }
            else
            {
                return "";
            }
        }
        else if ($module['type'] == "MODULE")
        {
            $subs = $CI->db->get_where("sys_module_task", array("parent" => $module['id']))->result_array();

            if (sizeof($subs) > 0)
            {
                $total_str = "";
                foreach ($subs as $sub)
                {
                    $submenu_str = Menu_helper::get_sub_menu($sub);
                    if (strlen($submenu_str) > 0)
                    {
                        $total_str.=$submenu_str;
                    }
                }
                if (strlen($total_str) > 0)
                {
                    return '<li class="treeview">
                        <a href="javascript:;">
                            <span>' . $module['name'] . '</span>
                            <i class="fa pull-right fa-angle-left"></i>
                        </a>
                        <ul class="treeview-menu">' . $total_str . '</ul>
                    </li>';
                }
                else
                {
                    return "";
                }
            }
            else
            {
                return "";
            }
        }
    }

    public static function has_permission($module,$action="")
    {
        $CI = & get_instance();
        $user=User_helper::get_user();
        if($user->user_group==1)
        {
            return true;
        }
        $CI->db->where("task_id",$module['id']);
        $CI->db->where("user_group_id",$user->user_group);
        $permission=$CI->db->get("sys_task_access")->row_array();
        if($permission)
        {
            if($action!="")
            {
                if(isset($permission[$action]))
                {
                    if($permission[$action]=="YES")
                    {
                        return true;
                    }
                    else
                    {
                        return false;
                    }

                }
                else
                {
                    return false;
                }
            }
            if($permission['view']=="YES")
            {
                return true;
            }
            elseif($permission['add']=="YES")
            {
                return true;
            }
            elseif($permission['edit']=="YES")
            {
                return true;
            }
            elseif($permission['delete']=="YES")
            {
                return true;
            }
            else
            {
                return false;
            }

        }
        else
        {
            return false;
        }
    }

    public static function get_permission($controller_name)
    {
        $CI = & get_instance();
        $user=User_helper::get_user();
        if($user->user_group==1)
        {
            return array('view'=>'YES','add'=>"YES",'edit'=>'YES','delete'=>"YES");
        }
        $CI->db->from("sys_task_access sta");
        $CI->db->select("view,add,edit,delete");
        $CI->db->join("sys_module_task smt","smt.id=sta.task_id","inner");
        $CI->db->where("controller_name",$controller_name);
        $CI->db->where("user_group_id",$user->user_group);
        $permission=$CI->db->get()->row_array();
        if($permission)
        {
            return $permission;
        }
        else
        {
            return array('view'=>'NO','add'=>"NO",'edit'=>'NO','delete'=>"NO");
        }

    }

}