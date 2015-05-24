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
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("DATE"); ?>*</label>
                        <input type="text" id="income_date" name="income_date"  placeholder="<?php echo $this->lang->line("DATE"); ?>" class="form-control validate[required] datepicker" value="<?php echo $row_info['income_date']?date('d-m-Y', $row_info['income_date']):System_helper::convert_date('date', 'CurrentDate');?>"  />
                    </div>
                    <div class="form-group has-error">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("ACCOUNT_HEAD_NAME"); ?>*</label>
                        <select name="account_head_id" id="account_head_id" class="form-control validate[required]">
                            <option value=""><?php echo $this->lang->line("SELECT"); ?></option>
                            <?php
                            foreach($account_heads as $account_head)
                            {
                                ?>
                                <option value="<?php echo $account_head['id']; ?>"
                                    <?php if ($account_head['id'] == $row_info['account_head_id']) {
                                        echo "selected='selected'";
                                    }
                                    ?>>
                                    <?php echo $account_head['account_name']; ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group has-error">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("AMOUNT"); ?>*</label>
                        <input type="text" id="amount" name="amount"  placeholder="<?php echo $this->lang->line("AMOUNT"); ?>" class="form-control validate[required]" value="<?php echo $row_info['amount']?>"  />
                    </div>
                    <div class="form-group has-success">
                        <label for="exampleInputEmail1"><?php echo $this->lang->line("DESCRIPTION"); ?></label>
                        <textarea id="description" name="description"  placeholder="<?php echo $this->lang->line("DESCRIPTION"); ?>" class="form-control" ><?php echo $row_info['description']?></textarea>
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
<script>
    Calendar.setup({
        inputField: "income_date",
        trigger: "income_date",
        onSelect: function() {
            this.hide()
        },
        dateFormat: "%d-%m-%Y"
    });
</script>