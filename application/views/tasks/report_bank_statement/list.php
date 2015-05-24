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

$user = User_helper::get_user();
$pdf_link="http://".$_SERVER['HTTP_HOST'].str_replace("/list/","/pdf/",$_SERVER['REQUEST_URI']);
//echo "<pre>";
//print_r($results);
//echo "</pre>";

?>

<div class="row show-grid hidden-print">
    <div class="col-xs-6">
        <a class="btn btn-primary btn-rect pull-right" href="javascript:window.print();"><?php echo $this->lang->line("BUTTON_PRINT"); ?></a>
    </div>
    <div class="col-xs-6">
        <a class="btn btn-primary btn-rect pull-left" href="<?php echo $pdf_link;?>"><?php echo $this->lang->line("BUTTON_PDF"); ?></a>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 text-center">
        <h1>
            <u>
                <?php echo $this->lang->line("TASK_TITLE");?>
            </u>
        </h1>
        <div class="col-xs-12 ">
            <span class="col-xs-3 pull-right text-right">
                <?php echo $this->lang->line('PRINT_DATE').": ". System_helper::convert_date(time(),'ViewDate');?>
            </span>
        </div>
    </div>
</div>
<div class="row">
<table class="table table-bordered table-responsive" >
    <?php
    if(empty($results))
    {
        ?>
        <tr><th class="label-danger text-center" ><?php echo $this->lang->line('DATA_NOT_FOUNT')?> </th></tr>
    <?php
    }
    else
    {
        ?>
        <tr class="label-default">
            <th><?php echo $this->lang->line('DATE')?></th>
            <th><?php echo $this->lang->line('ACCOUNT_HEAD_NAME')?></th>
            <th><?php echo $this->lang->line('AMOUNT')?></th>
        </tr>
    <?php
    $total_amount=0;
        foreach($results as $date=>$result)
        {
        ?>
            <tr class="text-danger">
                <th colspan="3"><?php echo $date; ?></th>
            </tr>
        <?php
            for($i=0; $i<count($result['date']); $i++)
            {
                $total_amount+=$result['date'][$i]['amount'];
                ?>
                <tr>
                    <th>&nbsp;</th>
                    <td><?php echo $result['date'][$i]['account_name']; ?></td>
                    <td><?php echo $result['date'][$i]['amount']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        <tr class="label-default">
            <th colspan="2" style="text-align: right;"><?php echo $this->lang->line('TOTAL')?></th>
            <th><?php echo $total_amount;?></th>
        </tr>
    <?php
    }
    ?>

</table>


</div>
