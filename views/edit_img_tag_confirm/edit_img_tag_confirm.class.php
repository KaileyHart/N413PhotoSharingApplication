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



<div style="max-width: 900px; display: flex;flex-direction: column;   margin: 0 auto; text-align: center;">
    <h2 style="margin-bottom: 30px; margin-top: 30px; ">You successfully edited your image tag!</h2>
    
    <button style="background-color: black; border: none; max-width: 500px; margin: 0 auto; border-radius: 5px"> <a style="color: #fff; text-decoration: none; cursor: pointer;" href="index.php?action=profile" style="margin-right: 2%; color: black ">Back to Profile </button>
</div>
<?php
        parent::footer();
    }
}