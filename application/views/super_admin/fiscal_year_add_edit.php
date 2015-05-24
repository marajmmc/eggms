<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$user=User_helper::get_user();

?>

<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/user_group.css">

<div class="row">
    <h2 class="page_header"><?php echo $this->lang->line("FISCAL_YEAR_SETUP"); ?></h2>
    <form action="<?php echo base_url();?>super_admin/control_panel/fiscal_year_setup/save" class="form-signin" method="post">

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("FISCAL_YEAR"); ?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input class="form-control" type="text" id="fiscal_year" name="fiscal_year" value="" />

            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-8">
                <input id="button_report_household" type="submit" class="btn btn-primary btn-rect pull-right" value="<?php echo $this->lang->line("CREATE"); ?>" />
            </div>
        </div>
    </form>

</div>

