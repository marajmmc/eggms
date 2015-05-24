<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

?>
<html lang="en">
    <head>
        <title><?php print $title; ?></title>
        <meta charset="utf-8">
        <?php print $meta; ?>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/report.css">
        <?php print $css; ?>
    </head>
    <body>
        <script src="<?php echo base_url(); ?>js/jquery-2.1.1.js"></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url(); ?>";
        </script>


        <div class="container">
            <div class="main_container">
                <?php print $content; ?>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/upmis_report.js"></script>
        <?php print $javascript; ?>
    </body>
</html>