<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
/**
 * $data array holds the $record value
 *
 * @see Control_panel::access_level_details()

 * @var Control_panel $module
 * @var Control_panel $user_groups
 *
 */

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/user_group.css">
<div class="row">
<!--    <div class="col-lg-12">-->
<!--        <label class="control-label col-lg-4">--><?php //echo $this->lang->line("NAME"); ?><!--</label>-->
<!--        <div class="">-->
<!--            --><?php //echo $module['name']; ?>
<!--        </div>-->
<!--    </div>-->

</div>
<div class="row">
    <div class="col-lg-12">
        <?php
        if(sizeof($user_groups)>0)
        {
            ?>
            <form method="post" action="<?php echo base_url()?>super_admin/control_panel/access_level/save/<?php echo $module['id']?>">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line("GROUP_NAME");?></th>
                        <th><?php echo $this->lang->line("VIEW");?></th>
                        <th><?php echo $this->lang->line("ADD");?></th>
                        <th><?php echo $this->lang->line("EDIT");?></th>
                        <th><?php echo $this->lang->line("DELETE");?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            foreach($user_groups as $user_group){
                                $access=$this->control_panel_model->get_user_group_access($user_group['id'],$module['id']);
                                ?>
                                <tr>
                                    <td><?php echo $user_group['name'];?></td>
                                    <td>
                                        <select name="view<?php echo $user_group['id'];?>" class="form-control chzn-select" tabindex="-1">
                                            <!--<option value=""></option>-->
                                            <option value="NO">NO</option>
                                            <option value="YES" <?php if($access&& $access['view']=="YES"){ echo "selected='selected'";} ?>>YES</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="add<?php echo $user_group['id'];?>" class="form-control chzn-select" tabindex="-1">
                                            <!--<option value=""></option>-->
                                            <option value="NO">NO</option>
                                            <option value="YES" <?php if($access&& $access['add']=="YES"){ echo "selected='selected'";} ?>>YES</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="edit<?php echo $user_group['id'];?>" class="form-control chzn-select" tabindex="-1">
                                            <!--<option value=""></option>-->
                                            <option value="NO">NO</option>
                                            <option value="YES" <?php if($access&& $access['edit']=="YES"){ echo "selected='selected'";} ?>>YES</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="delete<?php echo $user_group['id'];?>" class="form-control chzn-select" tabindex="-1">
                                            <!--<option value=""></option>-->
                                            <option value="NO">NO</option>
                                            <option value="YES" <?php if($access&& $access['delete']=="YES"){ echo "selected='selected'";} ?>>YES</option>
                                        </select>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-primary btn-rect pull-right" value="<?php echo $this->lang->line("SAVE"); ?>">
            </form>
            <?php
        }
        ?>

    </div>

</div>

