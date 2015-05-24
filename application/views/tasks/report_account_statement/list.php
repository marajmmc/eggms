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
echo "<pre>";
print_r($results);
echo "</pre>";

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

    <?php
    if(empty($results))
    {
        ?>
    Data Not Found.
    <?php
    }
    else
    {
        foreach($results as $result)
        {
            if(isset($result))
            {
                echo $result[1]['date']?$result[1]['date']:'';
            }

            //echo $result[2]['date']?$result[2]['date']:'';
        }
    }
    ?>

</div>
