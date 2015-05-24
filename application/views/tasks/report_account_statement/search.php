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
    $user=User_helper::get_user();
?>
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?php echo $this->lang->line("TASK_TITLE"); ?></h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form id="form_get_voucher_add_edit" action="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2);?>/index/list/" class="form-signin report_form" method="get" role="form">
                <div class="box-body">
                    <div class="col-md-4">
                        <div class="form-group has-error">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line("FORM_DATE"); ?>*</label>
                            <input type="text" id="form_date" name="form_date" class="form-control validate[required] datepicker" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-error">
                            <label for="exampleInputEmail1"><?php echo $this->lang->line("TO_DATE"); ?>*</label>
                            <input type="text" id="to_date" name="to_date" class="form-control validate[required] datepicker" />
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <input type="reset" class="btn btn-danger" value="<?php echo $this->lang->line("RESET"); ?>" />
                    <input id="button_report_household" type="submit" class="btn btn-primary pull-right" value="<?php echo $this->lang->line("View"); ?>" />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        //$('.datepicker').datepicker();
    })
</script>
<!--<script src="--><?php //echo base_url()?><!--js/tasks/ar_revenue_status/search.js"></script>-->