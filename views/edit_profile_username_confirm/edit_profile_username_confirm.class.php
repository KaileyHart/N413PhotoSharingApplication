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
        <div style="max-width: 900px; display: flex;flex-direction: column;   margin: 0 auto; text-align: center;">
                <h2 style="margin-bottom: 30px; margin-top: 30px; ">You successfully edited your username!</h2>
                
                <button style="background-color: black; border: none; max-width: 500px; margin: 0 auto;"> <a style="color: #fff; text-decoration: none; cursor: pointer;" href="index.php?action=profile" style="margin-right: 2%; color: black">View Changes </button>
        </div>


<?php
        parent::footer();
    }
}
