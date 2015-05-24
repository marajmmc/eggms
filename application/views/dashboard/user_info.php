<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$user = User_helper::get_user();

if($user)
{
    ?>
    <img src="<?php echo base_url()?>images/shop/<?php echo @$user->logo ?>" style="width: 50px; height: 50px;" /> <?php echo @$user->shop_name;?>
    <?php
}
else
{
    echo "Account Book";
}
?>