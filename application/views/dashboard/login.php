<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<meta charset="utf-8">
<div class="margin text-center">
    <h1 style="font-family: nikosh, nikoshban; color: #ff1c85"><?php echo $this->lang->line("COMPANY_TITLE");?></h1>
    <h3 style="font-family: nikosh, nikoshban; color: #fff" ><?php echo $this->lang->line("FOUNDER");?></h3>
</div>
<div class="form-box" id="login-box">

    <div class="header">
        <img src="<?php echo base_url(); ?>images/favicon-logo.png" width="30" />
        <?php echo $this->lang->line("LABEL_USER_LOGIN_HEADER"); ?>
    </div>
    <form class="form_valid" action="<?php echo $login_action_url;?>" method="post">
        <div class="body bg-gray">
            <div class="form-group">
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="<?php echo $this->lang->line("LABEL_USERNAME");?>"/>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo $this->lang->line("LABEL_PASSWORD");?>"/>
            </div>
<!--            <div class="form-group">-->
<!--                <input type="checkbox" name="remember_me"/> Remember me-->
<!--            </div>-->
        </div>
        <div class="footer">
            <button type="submit" class="btn bg-olive btn-block"><?php echo $this->lang->line("LABEL_LOG_IN");?></button>

            <p><a href="#"><?php echo $this->lang->line("LABEL_FORGET_PASSWORD_Q");?></a></p>

            <a href="<?php echo base_url(); ?>dashboard/user_registration" class="text-center">
                <?php echo $this->lang->line("LABEL_NEW_REGISTRATION");?>
            </a>
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
<!-- add new calendar event modal -->
<script>
    speak('Welcome to T.M Software Login System.');
</script>

