<?php

/*
 * Author: Kailey Hart
 * Date: 04-12-2021
 * Name: edit_gallery_privacy.class.php
 * Description: Edit Gallery Private or Public Status
*/

class EditGalleryPrivacy extends MainView
{
    function show($galleryName)
    {
        parent::header();
?>

        <div style="margin-left: 32%; display: flex; align-items: center;">
            <a href="index.php?action=edit_gallery&id=<?= $_GET['id'] ?>" style="color: #000; margin-top: 50px; margin-right: 20px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>
            <h2 ><?php echo "Edit "  . $galleryName[0]['gallery_name'] . ""
                ?> </h2>
        </div>

 
    <form method="POST" action="index.php?action=edit_gallery_privacy_confirm&id=<?= $galleryName[0]["pk_gallery_id"]; ?>">
      <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">
          Make Gallery Private? <br />
          <div>
            <label>
              <input type="radio" id="isPrivate" name="isPrivate" value="1">
              Yes
            </label>
            <br />
            <label>
              <input type="radio" id="isPrivate" name="isPrivate" value="0">
              No
            </label>
          </div>


          <button type="submit" id="submit" class="btn btn-dark float-right">Submit</button>
        </div>
      </div>
    </form>

<?php
        parent::footer();
    }
}
