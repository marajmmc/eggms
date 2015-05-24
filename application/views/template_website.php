<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    $user = User_helper::get_user();
?>
<html lang="en">
    <head>
        <title><?php print $title; ?></title>
        <link rel="shortcut icon"  type="image/x-icon" href="<?php echo base_url(); ?>images/favicon-logo.png">
        <meta charset="utf-8">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php print $meta; ?>

        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?php echo base_url(); ?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url(); ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php echo base_url(); ?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url(); ?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />

<!--        <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--fonts/font.css">-->
<!--        <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--css/style.css">-->
<!--        <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--css/menu.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/css_calendar/jscal2.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/css_calendar/border-radius.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>css/validator_css/validationEngine.jquery.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/validator_css/template.css" type="text/css"/>
        <link rel="stylesheet" href="<?php echo base_url() ?>css/style.css" type="text/css"/>

        <?php print $css; ?>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>js/html5shiv.js"></script>
        <script src="<?php echo base_url() ?>js/respond.min.js"></script>
        <![endif]-->

        <!--        <script src="--><?php //echo base_url(); ?><!--js/jquery-2.1.1.js"></script>-->
        <!--        <script src="--><?php //echo base_url(); ?><!--js/bootstrap.min.js"></script>-->

        <script type="text/javascript" src="<?php echo base_url(); ?>js/js_calendar/jscal2.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/js_calendar/lang/en.js"></script>
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
    <body class="skin-black">
    <!-- header logo: style can be found in header.less -->
<!--    <header class="header">-->
<!--        <a href="--><?php //echo base_url(); ?><!--" class="logo" >-->
<!--            <!-- Add the class icon to your logo image or logo icon to add the margining -->
<!--           --><?php
//           //echo $this->lang->line("ADS_HOUSE");
//           ?>
<!--            <div style="height: 150px; margin-top: 15px;">-->
<!--                <img src="--><?php //echo base_url(); ?><!--images/logo.png" class="img-thumbnail img-responsive img-rounded" />-->
<!--            </div>-->
<!--        </a>-->
<!--<!--        <nav class="navbar navbar-static-top" role="navigation" style="background-color: #333333; color: #fff">-->
<!--        <nav class="navbar navbar-static-top" role="navigation">-->
<!--            <h3>-->
<!--                --><?php
//                echo $this->lang->line("ADS_HOUSE");
//                ?>
<!--            </h3>-->
<!---->
<!--        </nav>-->
<!--        <!-- Header Navbar: style can be found in header.less -->
<!---->
<!--    </header>-->

    <!-- Main content -->

    <section class="content">

        <?php print $content; ?>

    </section><!-- /.content -->

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
                speak(msgbody);
                notification_open(msgbody, "Alert")
            });
        </script>
    <?php
    }

    ?>
    <!-- add new calendar event modal -->


        <div class="row">
            <div class="col-lg-12">
                <div class="footer" role="navigation" style="background-color: #333333; color: #fff">
                    ::. Ads House .::
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/upmis_common.js"></script>


        <!-- jQuery 2.0.2 -->
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>-->
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url(); ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!--        <script src="--><?php //echo base_url(); ?><!--js/plugins/morris/morris.min.js" type="text/javascript"></script>-->
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="<?php echo base_url(); ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php echo base_url(); ?>js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="<?php echo base_url(); ?>js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>js/AdminLTE/dashboard.js" type="text/javascript"></script>

    <?php print $javascript; ?>
    </body>
</html>
<script>

    var select_opt = "<?php echo $this->lang->line("SELECT"); ?>";
</script>