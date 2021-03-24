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
    <form method="POST" action="index.php?action=edit_profile_image_confirm&id=<?= $username['pk_user_id'] ?>" enctype="multipart/form-data"  class="profile__container" >
      <div class="edit_left">
        <div style="display: flex; align-items: center; margin-bottom: 30px;">
          <a href="index.php?action=edit_profile" style="margin-right: 2%; color: black"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
              <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
            </svg>
          </a>
          <h3 >Edit Your Profile Image</h3>
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
