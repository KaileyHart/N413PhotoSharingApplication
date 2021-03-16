<?php
/*
 * Author: Kailey Hart
 * Date: 03-16-2021
 * Name: edit_profile_username_confirm.php
 * Description: Edit Profile Username Confirmation
*/

class EditProfileUsernameConfirm extends MainView
{
    function show($result)
    {
        parent::header();

        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }

        print_r($result);
?>



        <div class="top-row">
            <h2>You successfully edited your username!</h2>


        </div>




<?php
        parent::footer();
    }
}
