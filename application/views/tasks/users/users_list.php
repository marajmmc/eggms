<?php
/**
 * $data array holds the $record value
 *
 * @see Users::users_list()
 * @var Users $users
 * @var Users $permissions
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/super_admin/user_group.css">

<div class="row">
    <div class="col-lg-12">
        <?php
            if($permissions['add']=="YES")
            {
                ?>
        <a href="<?php echo base_url()?>tasks/users/index/add" class="btn btn-primary btn-rect pull-right" data-original-title="" title=""><?php echo $this->lang->line("NEW"); ?></a>
                <?php
            }
                ?>

    </div>
    <div class="col-lg-12 margin_top">

        <div class="box">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th><?php echo $this->lang->line("ID");?></th>
                    <th><?php echo $this->lang->line("NAME");?></th>
                    <th><?php echo $this->lang->line("USERNAME");?></th>
                    <th><?php echo $this->lang->line("USER_GROUP");?></th>
                    <th><?php echo $this->lang->line("STATUS");?></th>
                    <th><?php echo $this->lang->line("DETAILS");?></th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($users as $user){
                        ?>
                        <tr>
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['full_name']; ?></td>
                            <td><?php
                                if($permissions['edit']=="YES")
                                {
                                    ?>
                                    <a href="<?php echo base_url();?>tasks/users/index/edit/<?php echo $user['user_id']; ?>"><?php echo $user['username']; ?></a>
                                    <?php

                                }
                                else
                                {
                                    echo $user['username'];
                                }
                                ?></td>
                            <td><?php echo $user['group_name']; ?></td>
                            <td><?php  if($user['status']== $this->config->item('db_active')){ echo $this->lang->line('ACTIVE');}else{ echo $this->lang->line('INACTIVE');} ?></td>
                            <td><a href="<?php echo base_url();?>tasks/users/index/details/<?php echo $user['user_id']; ?>"><?php echo $this->lang->line("DETAILS");?></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</div>
    <div class="row">
        <div class="pagination_container pull-right">
            <?php
            echo $links;
            ?>
        </div>
    </div>

