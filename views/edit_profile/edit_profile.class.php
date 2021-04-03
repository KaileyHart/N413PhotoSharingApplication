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
            <div class="edit_left">
                <div style="display: flex; align-items: center;">
                    <a style="margin-top: 50px; color: #000;" href="index.php?action=profile" style="margin-right: 2%; color: black">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                        </svg>
                    </a>
                    <h2 >Edit Your Profile</h2>
                </div>

                <div class="edit_left__container">
                    <div style="max-width: 250px; height: auto;" class="edit_left_user_image--container">
                        <img class="edit_left_user_image" alt="profile image" src="<?= $image['user_img'] ?>">
                    </div>
                    <div class="edit_left__buttons">
                        <p><?= $username['username'] ?></p>
                        <button style="background-color: #000; border: none; border-radius: 5px;"><a style="color: #fff; text-decoration: none;" href="index.php?action=edit_profile_username&id=<?= $username['pk_user_id'] ?>"> Edit Username</a> </button>
                        <button style="background-color: #000; border: none; border-radius: 5px;"><a style="color: #fff; text-decoration: none;" href="index.php?action=edit_profile_image&id=<?= $username['pk_user_id'] ?>"> Edit Profile Image</a> </button>
                        <!-- <button><a href="index.php?action=reset_profile_pass">Reset Password</a> </button> -->
                        <button style="background-color: #ff0000; border: none; border-radius: 5px;"><a style="color: #fff; text-decoration: none;" href="index.php?action=delete_profile_confirm&id=<?= $username['pk_user_id'] ?>">Delete Profile</a> </button>
                    </div>

                </div>
            </div>
        </div>


<?php
        parent::footer();
    }
}
