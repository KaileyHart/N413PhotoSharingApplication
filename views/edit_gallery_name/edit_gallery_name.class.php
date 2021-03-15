<?php

/*
 * Author: Kailey Hart
 * Date: 03-14-2021
 * Name: edit_gallery.class.php
 * Description: Edit Gallery/Update gallery name
*/

class EditGalleryName extends MainView  {
    function show($galleryName) {
        parent::header();
    ?>
   <h2><?php $galleryId = (isset($_GET['id']) ? $_GET['id'] : ''); echo "Edit "  . $galleryName[0]['gallery_name'] . " <br> ID: " .  $galleryId;
   ?> </h2>
   
      <form method="POST" action="index.php?action=edit_gallery_confirm&id=<?= $galleryName[0]["pk_gallery_id"]; ?>">
    <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">
            Gallery Name: <input type="text" id="galleryName" name="galleryName" class="form-control" value="" placeholder="Gallery Name" required /><br />
            
            <button type="submit" id="submit" class="btn btn-dark float-right">Submit</button>
        </div>
    </div>
</form>

    <?php
    parent::footer();
    }


	

}