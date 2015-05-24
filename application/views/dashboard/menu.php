<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<div class="row">
    <nav class="navbar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="glyphicon glyphicon-th-list"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav">
                <li class="<?php if($this->router->class=="dashboard"){echo "active";} ?>"><a href="<?php echo base_url(); ?>"><img height="20" width="20" src="<?php echo base_url();?>images/home.png" alt="<?php echo $this->lang->line("PAGE_FIRST_PAGE"); ?>"/></a></li>
                <?php
                echo $menus;
                ?>
                <li class=""><a href="<?php echo base_url(); ?>dashboard/logout"><img height="20" width="20" src="<?php echo base_url();?>images/logout.png" alt="<?php echo $this->lang->line("PAGE_FIRST_PAGE"); ?>"/></a></li>


            </ul>
        </div>
    </nav>
</div>