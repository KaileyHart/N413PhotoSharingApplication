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
                    <a href="index.php?action=profile" style="margin-right: 2%; color: black"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                        </svg>
                    </a>
                    <h2>Edit Your Profile</h2>
                </div>

                <div class="edit_left__container">
                    <div style="max-width: 250px; height: auto;" class="edit_left_user_image--container">
                        <img class="edit_left_user_image" alt="profile image" src="dist/images/<?= $image['user_img'] ?>">
                    </div>
                    <div class="edit_left__buttons">
                        <p><?= $username['username'] ?></p>
                        <button style="background-color: #000; border: none; border-radius: 5px;"><a style="color: #fff; text-decoration: none;"  href="index.php?action=edit_profile_username&id=<?= $username['pk_user_id'] ?>"> Edit Username</a> </button>
                        <button style="background-color: #000; border: none; border-radius: 5px;"><a style="color: #fff; text-decoration: none;"  href="index.php?action=edit_profile_image&id=<?= $username['pk_user_id'] ?>"> Edit Profile Image</a> </button>
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
