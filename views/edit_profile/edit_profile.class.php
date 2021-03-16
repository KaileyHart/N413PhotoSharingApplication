<?php
/*
 * Author: Kailey Hart
 * Date: 03-16-2021
 * Name: edit_profile.class.php
 * Description: Edit profile page where the user can reset their password, change their username, and change their profile image
*/

class EditProfile extends MainView
{
    function show($results, $username, $image)
    {



        parent::header();
        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>

        <div class="profile__container">
            <div class="left">
                <h2>Edit Your Profile</h2>
                <div class="left__container">
                    <div style="max-width: 250px; height: auto;" class="left_user_image--container">
                      <img  class="left_user_image" alt="profile image" src="dist/images/<?=$image['user_img']?>"> 
                    </div>
                    <div class="left__buttons">
                        <p><?=$username['username']?></p>
                        <button><a href="index.php?action=edit_profile_username"> Edit Username</a> </button>
                        <button><a href="index.php?action=edit_profile_img"> Edit Profile Image</a> </button>
                        <!-- <button><a href="index.php?action=reset_profile_pass">Reset Password</a> </button> -->
                        <button><a href="index.php?action=delete_profile">Delete Profile</a> </button>
                    </div>

                </div>
            </div>



        </div>

       


<?php
        parent::footer();
    }
}
