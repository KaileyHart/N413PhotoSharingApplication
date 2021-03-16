<?php
/*
 * Author: Kailey Hart
 * Date: 03-15-2021
 * Name: edit_img_tag_confirm.class.php
 * Description: Confirms image tag update
*/

class EditImgTagConfirm extends MainView  {
    
    function show($result)
    {
        parent::header();

        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
   
?>



        <div class="top-row">
            <h2>You successfully edited your image tag!</h2>
        </div>
<?php
        parent::footer();
    }
}