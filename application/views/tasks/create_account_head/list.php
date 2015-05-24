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

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $this->lang->line("TASK_TITLE"); ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td colspan="21">
                                <?php
                                if($permissions['add']=="YES")
                                {
                                    ?>
                                <div class="col-lg-12 text-right">
                                    <a href="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/index/add"; ?>" class="btn btn-success" data-original-title="" title=""><?php echo $this->lang->line("NEW"); ?></a>
                                </div>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?php echo $this->lang->line("ID");?></th>
                            <th><?php echo $this->lang->line("NAME");?></th>
                            <th><?php echo $this->lang->line("TYPE");?></th>
                            <th><?php echo $this->lang->line("STATUS");?></th>
                            <th><?php echo $this->lang->line("ACTION");?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(!empty($row_info))
                        {
                            $sl=1;
                            foreach($row_info as $rows)
                            {
                                $type='';
                                if($rows['type']==1)
                                {
                                    $type=$this->lang->line("INCOME");
                                }
                                else
                                {
                                    $type=$this->lang->line("EXPANSE");
                                }
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $rows['account_name']; ?></td>
                                    <td><?php echo $type; ?></td>
                                    <td><?php  if($rows['status']== $this->config->item('active')){ echo $this->lang->line('ACTIVE');}else{ echo $this->lang->line('INACTIVE');} ?></td>
                                    <td><?php
                                        if($permissions['edit']=="YES")
                                        {
                                        ?>
                                        <a href="<?php echo base_url().$this->uri->segment(1)."/".$this->uri->segment(2)."/index/edit/".$rows['id']; ?>"><?php echo $this->lang->line("EDIT"); ?></a>
                                            <?php

                                            }
                                            else
                                            {
                                                echo "&nbsp ";
                                            }
                                            ?>
                                    </td>
                                </tr>
                                <?php
                                ++$sl;
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="21">
                                    <div class="text-center text-danger"><?php echo $this->lang->line("NO_DATA_FOUND");?></div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class=" pull-right">
                    <?php
                    echo $links;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>