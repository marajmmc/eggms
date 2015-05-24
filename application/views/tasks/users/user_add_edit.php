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
//print_r($user);
//echo '</pre>';
?>

<div class="row">

    <h2 class="page_header"><?php echo $this->lang->line("GET_VOUCHER"); ?></h2>

    <form id="form_get_voucher_add_edit" class="form-horizontal form_valid" method="post" action="<?php echo base_url() ?>tasks/transaction_get_voucher/index/save">
        <input type="hidden" name="id" value="<?php //echo $VoucherId; ?>">
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("TYPE_OF_RECEIVE_MONEY"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="" id="" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line("SELECT"); ?></option>

                </select>
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_cash receive_type_bank">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("VOUCHER_NO"); ?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input class="form-control" type="text" readonly id="VoucherNo" name="VoucherNo" value="<?php //echo $row_info[''];?>" title="<?php //echo $row_info[''];?>" />
            </div>
        </div>
        <div class="row show-grid all_receive_type receive_type_cash receive_type_bank" >
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("VOUCHER_DATE"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" id="VoucherDate" name="VoucherDate"  placeholder="" class="form-control validate[required]" value="<?php //echo substr($VoucherDate,0,10);?>" title="<?php //echo substr($VoucherDate,0,10);?>" />
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_cash" >
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("TYPE_OF_SOURCE"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8" >
                <select name="source_type" id="source_type" class="form-control">
                    <option value=""><?php echo $this->lang->line("SELECT"); ?></option>

                </select>
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_cash receive_type_bank" >
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("MONEY_SOURCE"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="money_source" id="money_source" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line("SELECT"); ?></option>

                </select>
            </div>
        </div>
        <div class="row show-grid all_receive_type receive_type_cash receive_type_bank" >
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("RECEIVE_NO"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="receive_account_no" id="receive_account_no" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line("SELECT"); ?></option>

                </select>
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_bank">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("CHEQUE_NO"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" id="cheque_no" name="cheque_no" placeholder="" class="form-control" value="<?php //echo $cheque_no;?>" />
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_bank" >
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("CHEQUE_DATE"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" id="ChequeDate" name="ChequeDate" placeholder="" class="form-control" value="<?php //echo substr($chequeDate,0,10);?>" />
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_cash receive_type_bank" >
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("MONEY_AMOUNT"); ?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input class="form-control validate[required, custom[number]]" type="text" id="money_amount" name="money_amount" value="<?php //echo $money_amount;?>" />
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_cash receive_type_bank" >
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line("DETAILS"); ?></label>
            </div>
            <div class="col-sm-6 col-xs-8">
                <textarea class="form-control" type="text" id="Description" name="Description"><?php //echo $description;?></textarea>
            </div>
        </div>

        <div class="row show-grid all_receive_type receive_type_cash receive_type_bank" >
            <div class="col-xs-6">
                <input type="submit" class="btn btn-primary btn-rect pull-right" value="<?php echo $this->lang->line("SAVE"); ?>" />
            </div>
            <div class="col-xs-6">
                <a href="<?php echo base_url() ?>tasks/transaction_get_voucher/index/list" class="btn btn-primary btn-rect" data-original-title="" title=""><?php echo $this->lang->line("CLOSE"); ?></a>
            </div>
        </div>

    </form>


</div>

<!--<script src="--><?php //echo base_url()?><!--js/tasks/users/user_add_edit.js"></script>-->