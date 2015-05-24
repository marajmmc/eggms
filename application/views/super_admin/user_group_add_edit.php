<?php
/**
 * $data array holds the $record value
 *
 * @see Control_panel::user_groups_add_edit()
 * @var Control_panel $user_group

 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/user_group.css">
<div class="row">
    <div class="col-lg-12">
        <h2><?php echo $this->lang->line("USER_GROUP_EDIT"); ?></h2>
        <div class="box dark">

            <div id="div-1" class="body">
                <form class="form-horizontal" method="post" action="<?php echo base_url()?>super_admin/control_panel/user_groups/save">
        <table>
            <tr>
                <td>
                    <div class="form-group">
                    <label class="control-label col-lg-4"><?php echo $this->lang->line("NAME"); ?></label>
                    <div class="col-lg-8">
                        <input type="hidden" id="id" name="id" value="<?php echo $user_group['id']; ?>" />
                        <input type="text" id="name" name="name" placeholder="name" class="form-control" value="<?php echo $user_group['name']; ?>" />
                    </div>
                </div>
                </td>
                 <td>
                    <div class="form-group">
                        <label class="control-label col-lg-4"><?php echo $this->lang->line("STATUS"); ?></label>
                        <div class="col-lg-8">
                            <select id="status" name="status" class="form-control chzn-select" tabindex="-1">
                                <!--<option value=""></option>-->
                                <option value="<?php echo $this->config->item('db_active');?>"
                                    <?php
                                    if ($user_group['status'] == $this->config->item('db_active')) {
                                        echo "selected='selected'";
                                    }
                                    ?> ><?php echo $this->lang->line('ACTIVE')?>
                                </option>
                                <option value="<?php echo $this->config->item('db_active');?>"
                                    <?php
                                    if ($user_group['status'] == $this->config->item('db_inactive')) {
                                        echo "selected='selected'";
                                    }
                                    ?> ><?php echo $this->lang->line('INACTIVE')?></option>
                            </select>
                        </div>
                    </div>
        </td>
    </tr>
<tr>

                    <div class="form-group">
                        <div class="col-lg-12">
                            <td>
                                <div class="">
                                    <a href="<?php echo base_url()?>super_admin/control_panel/user_groups/list" class="btn btn-primary btn-rect pull-right" data-original-title="" title=""><?php echo $this->lang->line("CANCEL"); ?></a>
                                </div>
                                </td>
                            <td>
                            <div class="">
                                <input type="submit" class="btn btn-primary btn-rect pull-right" value="<?php echo $this->lang->line("SAVE"); ?>" />
                            </div>
                        </td>
                        </div>
                    </div>
</tr>
        </table>
                    <!-- /.form-group -->
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