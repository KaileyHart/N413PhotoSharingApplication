<?php
/*
 * Author: Kailey Hart
 * Date: 03-16-2021
 * Name: edit_profile_username.class.php
 * Description: Edit profile username
*/

class EditProfileUsername extends MainView
{
    function show($results, $username, $image)
    {
        parent::header();
        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>
        <form method="POST" action="index.php?action=edit_profile_username_confirm&id=<?=$username['pk_user_id']?>" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-4"></div>
                <div id="form-container" class="col-4">
                    New User Name: <input type="text" id="username" name="username" class="form-control" value="" placeholder="Enter User Name" required /><br />
                    <button type="submit" id="submit" name="submit" class="btn btn-dark float-right">Submit </button>
                </div>
            </div>
        </form>

<?php
        parent::footer();
    }
}
