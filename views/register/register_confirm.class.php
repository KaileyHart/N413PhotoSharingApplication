<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: register_confirm.class.php
 * Description: Register page confirmation
*/

class RegisterConfirm extends MainView
{

    function show($result)
    {
        parent::header();
?>
        <p><?= $result ?></p>
        <?php // Checks if data was submitted
        if ($result) {
            echo '<p>Thank you for registering.';
        } else {
            echo '<p>Sorry, but something went wrong.  Please try again later.';
        }


        ?>



<?php
    }
}
