<?php
/*
 * Author: Kailey Hart
 * Date: 03-16-2021
 * Name: edit_profile_image.class.php
 * Description: Edit profile image
*/

class EditProfileImage extends MainView
{
  function show($results, $username, $image)
  {



    parent::header();
    if (!isset($_SESSION["pk_user_id"])) {
      echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
    }
?>
    <form method="POST" action="index.php?action=edit_profile_image_confirm&id=<?= $username['pk_user_id'] ?>" enctype="multipart/form-data" class="profile__container">
      <div class="edit_left">
        <div style="display: flex; align-items: center; margin-bottom: 30px;">
          <a style="color: #000; margin-top: 50px;" href="index.php?action=edit_profile" style="margin-right: 2%; color: black">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
              <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
          </a>
          <h3>Edit Your Profile Image</h3>
        </div>


        <div id="form-container">
          <input type="file" id="image" name="image" class="form-control" value="" placeholder="Add a Profile Image" optional />
          <button type="submit" id="submit" name="submit" class="btn btn-dark float-right">Submit</button>
        </div>
      </div>
    </form>

<?php
    parent::footer();
  }
}
