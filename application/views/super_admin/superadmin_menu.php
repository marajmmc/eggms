<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$main_active=$this->router->class=="control_panel"?"active":"";
$modules_tasks_active="";
$user_groups_active="";
$fiscal_year_active="";
if($main_active)
{

    if($this->router->method=="modules_tasks")
    {
        $modules_tasks_active="active";
    }
    elseif($this->router->method=="user_groups")
    {
        $user_groups_active="active";
    }
    elseif($this->router->method=="fiscal_year_setup")
    {
        $fiscal_year_active="active";
    }
}
?>
<li class="dropdown <?php echo $main_active; ?>">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $this->lang->line("MENU_CONTROL_PANEL"); ?><span class="caret"></span></a>
    <ul role="menu" class="dropdown-menu">
        <li class="<?php echo $modules_tasks_active; ?>">
            <a href="<?php echo base_url() . "super_admin/control_panel/modules_tasks"; ?>">
                <?php echo $this->lang->line("MENU_MODULES_TASKS"); ?>
            </a>
        </li>
        <li class="<?php echo $user_groups_active; ?>">
            <a href="<?php echo base_url() . "super_admin/control_panel/user_groups/list"; ?>">
                <?php echo $this->lang->line("MENU_USER_GROUPS"); ?>
            </a>
        </li>
        <li class="<?php echo $fiscal_year_active; ?>">
            <a href="<?php echo base_url() . "super_admin/control_panel/fiscal_year_setup/list"; ?>">
                <?php echo $this->lang->line("FISCAL_YEAR_SETUP"); ?>
            </a>
        </li>

    </ul>
</li>