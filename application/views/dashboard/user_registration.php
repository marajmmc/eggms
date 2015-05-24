<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<div class="form-box" id="login-box">
    <div class="header">
        <img src="<?php echo base_url(); ?>images/favicon-logo.png" width="30" />
        <?php echo $this->lang->line("USER_REGISTRATION_TITLE"); ?>
    </div>
    <form class="form_valid" action="<?php echo base_url()?>dashboard/user_registration_save" method="post" enctype="multipart/form-data" >
        <div class="body bg-gray">
            <div class="form-group has-error">
                <label class="control-label" for="inputError"><?php echo $this->lang->line("LABEL_SHOP_NAME");?> *</label>
                <input type="text" name="shop_name" id="shop_name" class="form-control validate[required]" placeholder="<?php echo $this->lang->line("LABEL_SHOP_NAME");?>" title="<?php echo $this->lang->line("LABEL_SHOP_NAME");?>"/>
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputError"><?php echo $this->lang->line("LABEL_ADDRESS");?> *</label>
                <textarea name="shop_address" id="shop_address" class="form-control validate[required]" placeholder="<?php echo $this->lang->line("LABEL_ADDRESS");?>" title="<?php echo $this->lang->line("LABEL_ADDRESS");?>" ></textarea>
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputError"><?php echo $this->lang->line("LABEL_EMAIL");?> *</label>
                <input type="text" name="email_address" id="email_address" class="form-control validate[required,custom[email]]" placeholder="<?php echo $this->lang->line("LABEL_EMAIL");?>" title="<?php echo $this->lang->line("LABEL_EMAIL");?>" />
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputError"><?php echo $this->lang->line("LABEL_MOBILE");?> *</label>
                <input type="text" name="mobile_no" id="mobile_no" class="form-control validate[required]" placeholder="<?php echo $this->lang->line("LABEL_MOBILE");?>" title="<?php echo $this->lang->line("LABEL_MOBILE");?>" />
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputError"><?php echo $this->lang->line("LABEL_PASSWORD");?> *</label>
                <input type="password" name="password" id="password" class="form-control validate[required]" placeholder="<?php echo $this->lang->line("LABEL_PASSWORD");?>" title="<?php echo $this->lang->line("LABEL_PASSWORD");?>" />
            </div>
            <div class="form-group has-error">
                <label class="control-label" for="inputError"><?php echo $this->lang->line("LABEL_LOGO");?> *</label>
                <input type="file" name="logo" id="logo" class="form-control validate[required]" placeholder="<?php echo $this->lang->line("LABEL_LOGO");?>" title="<?php echo $this->lang->line("LABEL_LOGO");?>" />
            </div>
        </div>
        <div class="footer">

            <button type="submit" class="btn bg-olive btn-block"><?php echo $this->lang->line("LABEL_SIGN_ME_UP");?></button>

            <a href="<?php echo base_url(); ?>dashboard/login" class="text-center"><?php echo $this->lang->line("LABEL_I_ALREADY_ACCOUNT");?></a>
        </div>
    </form>

    <div class="margin text-center">
        <span><?php echo $this->lang->line("LABEL_SIGN_IN_SOCIAL");?></span>
        <br/>
        <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
        <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
        <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

    </div>
</div>
<script>
    speak('Welcome to T.M Software User Registration.');
</script>