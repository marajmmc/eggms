<?php
/**
 * $data array holds the $record value
 *
 * @see Control_panel::modules_tasks()
 * @var Control_panel $user_groups
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/user_group.css">

<div class="row">
    <div class="col-lg-12">
<!--        <button class="btn btn-primary btn-rect pull-right" >--><?php //echo $this->lang->line("DELETE"); ?><!--</button>-->
        <a href="<?php echo base_url()?>super_admin/control_panel/user_groups/add" class="btn btn-primary btn-rect pull-right" data-original-title="" title=""><?php echo $this->lang->line("NEW"); ?></a>

    </div>
    <div class="col-lg-12 margin_top">

        <div class="box">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="label_color"><?php echo $this->lang->line("ID");?></th>
                    <th class="label_color"><?php echo $this->lang->line("NAME");?></th>
                    <th class="label_color"><?php echo $this->lang->line("STATUS");?></th>
<!--                    <th class="label_color">--><?php //echo $this->lang->line("EDIT");?><!--</th>-->

                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($user_groups as $user_group)
                    {
                        ?>
                        <tr>
                            <td><?php echo $user_group['id']; ?></td>
                            <td><a href="<?php echo base_url();?>super_admin/control_panel/user_groups/edit/<?php echo $user_group['id']; ?>"><?php echo $user_group['name']; ?></a></td>
                            <td><?php if($user_group['status']=='ACTIVE'){echo $this->lang->line("ACTIVE");}else{echo $this->lang->line("INACTIVE");}; ?></td>

                        </tr>
                        <?php
                    }
                ?>
                </tbody>
            </table>

<!--            --><?php //print_r($modules_tasks_html); ?>
        </div>
    </div>
</div>

