<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
$user = User_helper::get_user();
?>
<html lang="en" class="bg-black">
<head>
    <title><?php print $title; ?></title>
    <link rel="shortcut icon"  type="image/x-icon" href="<?php echo base_url(); ?>images/favicon-logo.png">
    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php print $meta; ?>

    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url()?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url()?>css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url()?>js/html5shiv.js"></script>
    <script src="<?php echo base_url()?>js/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" href="<?php echo base_url() ?>css/validator_css/validationEngine.jquery.css" type="text/css"/>
    <link rel="stylesheet" href="<?php echo base_url() ?>css/validator_css/template.css" type="text/css"/>
    <script src="<?php echo base_url() ?>js/validator_js/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>js/validator_js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
        var base_url = "<?php echo base_url(); ?>";
        var opt_select = '<?php echo $this->lang->line('SELECT');?>';
        var opt_active = '<?php echo $this->lang->line('ACTIVE');?>';
        var opt_inactive = '<?php echo $this->lang->line('INACTIVE');?>';
        var opt_active_val = '<?php echo $this->config->item('active');?>';
        var opt_inactive_val = '<?php echo$this->config->item('inactive');?>';
    </script>

    <script src="<?php echo base_url(); ?>speak/speakClient.js"></script>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <div id="audio"></div>
    <!--        <input type="button" onclick="speak('Md. Maraj Hossain Tarafder!')" value="Say 'Md. Maraj Hossain Tarafder!'" />-->

    <script>
        jQuery(document).ready(function(){
            // binds form submission and fields to the validation engine
            jQuery(".form_valid").validationEngine();
        });
    </script>
</head>
<body class="bg-black">
    <div class="row">
        <?php echo $content; ?>
    </div>
    <div id="notification_div">

    </div>
    <?php
     $system_message_htm = System_helper::get_system_message();
    if ($system_message_htm)
    {
        ?>
        <script>
            $(document).ready(function()
            {
                var msgbody="<?php echo $system_message_htm?>";
                //speak(msgbody);
                notification_open(msgbody, "Alert")
            });
        </script>
    <?php
    }

    ?>
    <!-- jQuery 2.0.2 -->

    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>js/upmis_common.js" type="text/javascript"></script>

    <?php print $javascript; ?>
</body>
</html>
<script>

    var select_opt = "<?php echo $this->lang->line("SELECT"); ?>";
</script>