<?php
/**
 * $data array holds the $record value
 *
 * @see Control_panel::modules_tasks()
 * @var Control_panel $modules_tasks_html
 * @var Control_panel $modules_tasks
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

?>


<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/user_group.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/module_task.css">


<div class="row">
    <div class="col-lg-12">
        <a href="<?php echo base_url()?>super_admin/control_panel/modules_tasks/add" class="btn btn-primary btn-rect pull-right" data-original-title="" title=""><?php echo $this->lang->line("NEW"); ?></a>
    </div>

    <div class="col-lg-12 margin_top">

        <div class="box">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><?php echo $this->lang->line("ID");?></th>
                    <th><?php echo $this->lang->line("NAME");?></th>
                    <th><?php echo $this->lang->line("TYPE");?></th>
                    <th><?php echo $this->lang->line("STATUS");?></th>
                    <th><?php echo $this->lang->line("ACCESS");?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($modules_tasks as $module_task)
                    {
                        ?>
                        <tr>
                            <td><?php echo $module_task['module_task']['id']; ?></td>
                            <td><?php echo $module_task['prefix'];?><a href="<?php echo base_url();?>super_admin/control_panel/modules_tasks/edit/<?php echo $module_task['module_task']['id']; ?>"><?php echo $module_task['module_task']['name']; ?></a></td>
                            <td><?php if($module_task['module_task']['type']=='TASK'){echo $this->lang->line('TASK');}else{ echo $this->lang->line('MODULE');} ?></td>
                            <td>
                                <?php if($module_task['module_task']['status']== $this->config->item('db_active')){echo $this->lang->line('ACTIVE');}else{echo $this->lang->line('INACTIVE');}?></td>
                            <td>
                                <?php
                                    if($module_task['module_task']['type']=="TASK")
                                    {
                                ?>
                                <a href="<?php echo base_url();?>super_admin/control_panel/access_level/details/<?php echo $module_task['module_task']['id']; ?>"><?php echo $this->lang->line("DETAILS");?></a>
                                    <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>

<!--            --><?php //print_r($modules_tasks_html); ?>
        </div>
    </div>
</div>

