<?php
/**
 * $data array holds the $record value
 *
 * @see Users::user_add_edit()
 * @var Users $user
 * @var Users $user_groups

 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
//echo '<pre>';
//print_r($row_info);
//echo '</pre>';

?>
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $this->lang->line("TASK_TITLE"); ?></h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form id="form_get_voucher_add_edit" class="form_valid" method="post" action="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/index/save"; ?>" role="form">
                <input type="hidden" name="row_id" name="row_id" value="<?php echo $row_info['id']; ?>">
                <div class="box-body">
                    <div class="form-group has-error">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("NAME"); ?>*</label>
                        <input type="text" id="supplier_name" name="supplier_name"  placeholder="<?php echo $this->lang->line("NAME"); ?>" class="form-control validate[required]" value="<?php echo $row_info['supplier_name']?>" title="<?php echo $row_info['supplier_name']?>" />
                    </div>
                    <div class="form-group has-success">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("COMPANY_NAME"); ?></label>
                        <input type="text" id="company_name" name="company_name"  placeholder="<?php echo $this->lang->line("NAME"); ?>" class="form-control" value="<?php echo $row_info['company_name']?>" title="<?php echo $row_info['company_name']?>" />
                    </div>
                    <div class="form-group has-error">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("PHONE_NUMBER"); ?>*</label>
                        <input type="text" id="phone_number" name="phone_number" maxlength="20"  placeholder="<?php echo $this->lang->line("PHONE_NUMBER"); ?>" class="form-control validate[required]" value="<?php echo $row_info['phone_number']?>" title="<?php echo $row_info['phone_number']?>" />
                    </div>
                    <div class="form-group has-success">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("EMAIL"); ?></label>
                        <input type="text" id="email" name="email" maxlength="50"  placeholder="<?php echo $this->lang->line("PHONE_NUMBER"); ?>" class="form-control" value="<?php echo $row_info['email']?>" title="<?php echo $row_info['email']?>" />
                    </div>
                    <div class="form-group has-success">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("ADDRESS"); ?></label>
                        <textarea id="address" name="address"  placeholder="<?php echo $this->lang->line("ADDRESS"); ?>, City, State, Postal Code." class="form-control" title="<?php echo $row_info['address']?>" ><?php echo $row_info['address']?></textarea>
                    </div>
                    <div class="form-group has-error">
                        <label for=""><?php echo $this->lang->line("TYPE"); ?>*</label>
                        <select name="type" id="type" class="form-control validate[required]">
                            <option value=""><?php echo $this->lang->line("SELECT"); ?></option>
                            <option value="1" <?php if($row_info['type'] == 1){echo "selected='selected'";}?> ><?php echo $this->lang->line("KHAMARI"); ?></option>
                            <option value="2" <?php if($row_info['type'] == 2){echo "selected='selected'";}?> ><?php echo $this->lang->line("MEDIA"); ?></option>

                        </select>
                    </div>
                    <div class="form-group has-error">
                        <label for=""><?php echo $this->lang->line("STATUS"); ?>*</label>
                        <select name="status" id="status" class="form-control validate[required]">
                            <option value=""><?php echo $this->lang->line("SELECT"); ?></option>
                            <option value="<?php echo $this->config->item('active');?>" <?php if($row_info['status'] == $this->config->item('active')){echo "selected='selected'";}?> ><?php echo $this->lang->line("ACTIVE"); ?></option>
                            <option value="<?php echo $this->config->item('inactive');?>" <?php if($row_info['status'] == $this->config->item('inactive')){echo "selected='selected'";}?> ><?php echo $this->lang->line("INACTIVE"); ?></option>

                        </select>
                    </div>

                </div><!-- /.box-body -->

                <div class="box-footer">
                    <a href="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/index/list"; ?>" class="btn btn-danger" data-original-title="" title=""><?php echo $this->lang->line("BACK"); ?></a>
                    <input type="submit" class="btn btn-primary pull-right" value="<?php echo $this->lang->line("SAVE"); ?>" />
                </div>
            </form>
        </div>
    </div>
</div>
<!--<script src="--><?php //echo base_url()?><!--js/tasks/users/user_add_edit.js"></script>-->