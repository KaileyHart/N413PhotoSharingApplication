<?php 
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: add_image.class.php
 * Description: Allows user to add an image 
*/


class AddImage extends MainView {
    function show($galleryName) {
        echo "gallery name: " . $galleryName[0]['gallery_name'];
        parent::header();
    ?>
    <div style="margin-left: 30%; display: flex; align-items: center;">
      <a href="index.php?action=single_gallery_view&id=<?= $galleryName[0]["pk_gallery_id"]; ?>" style="margin-right: 2%; color: black"> <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
          <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
        </svg>
      </a>
      <h2>Add Image to "<?=$galleryName[0]['gallery_name']?>"</h2>
    </div>
    
    <form method="POST" action="index.php?action=add_image_confirm&id=<?= $galleryName[0]["pk_gallery_id"]; ?>" enctype="multipart/form-data" >
    <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">
            Upload image: <input type="file" id="galleryImage" name="galleryImage" class="form-control" value="" placeholder="Upload an Image" required /><br />
            Image Description : <input type="text" id="imagealt" name="imagealt" class="form-control" value="" placeholder="Image Description" required /><br />
            <label for="tag">Image Tag</label>
            <br>
            <select name="tag" id="tag">
                <option value="1" >family</option>
                <option value="2" >friends</option>
                <option value="3">fashion</option>
                <option value="4" >nature</option>
                <option value="5" >architecture</option>
                <option value="6" >animal</option>
                <option value="7" >food</option>
                <option value="8" >technology</option>
                <option value="9" >travel</option>
                <option value="10">art</option>
                <option value="11" >drinks</option>
                <option value="12" >patterns</option>
                <option value="13">spirituality</option>
                <option value="14" >business</option>
                <option value="15" >interiors</option>
            </select>
            <br>
            <button type="submit" id="submit" name="submit" class="btn btn-dark float-right">Submit</button>
        </div>
    </div>
</form>

    <?php
    parent::footer();
    }
}