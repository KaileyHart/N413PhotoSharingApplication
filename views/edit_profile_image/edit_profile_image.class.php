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
 <form method="POST" action="index.php?action=edit_profile_image_confirm&id=<?=$username['pk_user_id']?>" enctype="multipart/form-data">
      <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">
          Upload New Profile Image: <input type="file" id="image" name="image" class="form-control" value="" placeholder="Add a Profile Image" optional/><br />
          <button type="submit" id="submit" name="submit" class="btn btn-dark float-right">Submit</button>
        </div>
      </div>
    </form>

<?php
        parent::footer();
    }
}
