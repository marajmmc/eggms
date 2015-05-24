<?php
/**
 * $data array holds the $record value
 *
 * @see Control_panel::modules_tasks()
 * @var Control_panel modules
 * @var Control_panel module_task
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/user_group.css">
<div class="row">
    <div class="col-lg-12 ">
        <h2><?php echo $this->lang->line("USER_GROUP_EDIT"); ?></h2>
        <div class="box dark">

            <div id="div-1" class="body">
                <form class="form-horizontal" method="post" action="<?php echo base_url()?>super_admin/control_panel/modules_tasks/save">

                    <table>
                        <tr>
                            <td> <label class="control-label col-lg-6 pull-right"><?php echo $this->lang->line("NAME"); ?></label></td>
                            <td>

                                    <div class="col-lg-12">
                                        <input type="hidden" id="id" name="id" value="<?php echo $module_task['id']; ?>" />
                                        <input type="text" id="name" name="name" placeholder="<?php echo $this->lang->line("NAME"); ?>" class="form-control" value="<?php echo $module_task['name']; ?>" />
                                    </div>

                            </td>
                        </tr>

                        <tr>
                            <td> <label class="control-label col-lg-6 pull-right"><?php echo $this->lang->line("TYPE"); ?></label></td>
                            <td>

                                    <div class="col-lg-12">
                                        <select id="type" name="type" class="form-control chzn-select" tabindex="-1">
                                            <!--<option value=""></option>-->
                                            <option value="MODULE"
                                                <?php
                                                if ($module_task['type'] == "MODULE") {
                                                    echo "selected='selected'";
                                                }
                                                ?> >Module
                                            </option>
                                            <option value="TASK"
                                                <?php
                                                if ($module_task['type'] == "TASK") {
                                                    echo "selected='selected'";
                                                }
                                                ?> >Task</option>
                                        </select>
                                    </div>

                            </td>
                        </tr>


                        <tr>
                            <td> <label class="control-label col-lg-6 pull-right"><?php echo $this->lang->line("PARENT"); ?></label></td>
                            <td>
                                <div class="col-lg-12">
                                    <select id="parent" name="parent" data-placeholder="Select" class="form-control chzn-select" tabindex="-1">
                                        <option value="0"><?php echo $this->lang->line("SELECT"); ?></option>
                                        <?php
                                        foreach ($modules as $module)
                                        {
                                            ?>
                                            <option value='<?php echo $module['id']?>' <?php if($module['id']==$module_task['parent']){ echo "selected='selected'";} ?>><?php echo $module['name']; ?></option>
                                            <?php

                                        }
                                        ?>
                                    </select>
                                </div>
                            </td>
                        </tr>



                        <tr>
                            <td>  <label class="control-label col-lg-6 pull-right"><?php  echo $this->lang->line("TITLE_CONTROLLER_NAME");?></label></td>
                            <td>
                                <div class="col-lg-12">
                                    <input type="text" id="controller_name" name="controller_name" placeholder="name" class="form-control" value="<?php echo $module_task['controller_name'] ?>" />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>  <label class="control-label col-lg-6 pull-right"><?php echo $this->lang->line("ORDER"); ?></label></td>
                            <td>
                                <div class="col-lg-12">

                                    <input type="text" id="order" name="order" placeholder="order" class="form-control" value="<?php echo $module_task['order']; ?>" />
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>  <label class="control-label col-lg-6 pull-right"><?php echo $this->lang->line("STATUS"); ?></label></td>
                            <td>
                                <div class="col-lg-12">
                                    <select id="status" name="status" class="form-control chzn-select" tabindex="-1">
                                        <!--<option value=""></option>-->
                                        <option value="<?php echo $this->config->item('db_active');?>"
                                            <?php
                                            if ($module_task['status'] == $this->config->item('db_active')) {
                                                echo "selected='selected'";
                                            }
                                            ?> ><?php echo $this->lang->line('ACTIVE')?>
                                        </option>
                                        <option value="<?php echo $this->config->item('db_inactive')?>"
                                            <?php
                                            if ($module_task['status'] == $this->config->item('db_inactive')) {
                                                echo "selected='selected'";
                                            }
                                            ?> ><?php echo $this->lang->line('INACTIVE')?></option>
                                    </select>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="">
                                    <a href="<?php echo base_url()?>super_admin/control_panel/modules_tasks/list" class="btn btn-primary btn-rect pull-right" data-original-title="" title=""><?php echo $this->lang->line("CANCEL"); ?></a>
                                </div>
                            </td>
                            <td>
                        <div class="">
                            <input type="submit" class="btn btn-primary btn-rect pull-left" value="<?php echo $this->lang->line("SAVE"); ?>" />
                        </div>
                            </td>

                        </tr>
                    </table>

                </form>

            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        formGeneral();
    });
</script>