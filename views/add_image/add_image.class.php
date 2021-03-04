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
    <h2>Add Image to <?=$galleryName[0]['gallery_name']?></h2>
    <form method="POST" action="index.php?action=add_image_confirm&id=<?= $galleryName[0]["pk_gallery_id"]; ?>" enctype="multipart/form-data" >
    <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">
            Upload image: <input type="file" id="galleryImage" name="galleryImage" class="form-control" value="" placeholder="Upload an Image" required /><br />
            Image Description : <input type="text" id="imagealt" name="imagealt" class="form-control" value="" placeholder="Image Description" required /><br />
            <label for="tag">Image Tag</label>
            <br>
            <select name="tag" id="tag">
                <option value="family">family</option>
                <option value="friends">friends</option>
                <option value="fashion">fashion</option>
                <option value="nature">nature</option>
                <option value="architecture">architecture</option>
                <option value="animal">animal</option>
                <option value="food">food</option>
                <option value="technology">technology</option>
                <option value="travel">travel</option>
                <option value="art">art</option>
                <option value="drinks">drinks</option>
                <option value="patterns">patterns</option>
                <option value="spirituality">spirituality</option>
                <option value="business">business</option>
                <option value="interiors">interiors</option>
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