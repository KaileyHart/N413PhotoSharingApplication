<?php

/*
 * Author: Kailey Hart
 * Date: 03-14-2021
 * Name: edit_gallery.class.php
 * Description: Edit Gallery/Delete Gallery 
*/

class EditGallery extends MainView  {
    function show($galleryName, $images) {
        parent::header();

        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>Uh oh...You ar\'t logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>
  <!-- <h2><?php $galleryId = (isset($_GET['id']) ? $_GET['id'] : ''); echo "Edit "  . $galleryName[0]['gallery_name'] . " <br> ID: " .  $galleryId;
   ?> </h2>
   <p>This is where I will be able to edit name and delete gallery and delete images in a gallery</p> -->
        <div class="gallery__container">

            <div class="left">
                <div class="right__container">
                <div style="display: flex; align-items: center;">
                        <a href="index.php?action=single_gallery_view&id=<?= $_GET['id']?>" style="margin-right: 2%; color: black"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                                <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                            </svg>
                        </a>
                        <h2>Edit <?= $galleryName[0]["gallery_name"]; ?></h2>
                    </div>
                      
                    
                </div>

                <div class="left__container">
                    <div class="left__buttons">

                        <button><a href="index.php?action=add_image&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"> + Add Image</a> </button>
                        <button><a href="index.php?action=edit_gallery_name&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"">Edit Gallery Name</a> </button>
                       
                        <button style="background-color: #ff0000;"><a href="index.php?action=delete_gallery&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"">Delete Gallery</a> </button>
                    </div>

                </div>
            </div>



            <div class="middle">
                <h2>Gallery Images</h2>
                <div class="gallery">
                    <?php
                    if ($images === 0) {
                        echo "No images were found. Please add one.";
                    } else {
                      

                        foreach ($images as $image) {

                            $imgId = $image["pk_img_id"];
                            echo "
                            <div class='gallery_images--top'>
                            <div class='gallery_images'>
                            
                            <div class='gallery_images--info'>
                            <div style='display: flex;align-items: center;'>

                         
                            <p style='padding-left: 5px;'>" . $image['img_alt'] . "</p>
                            </div> 
                            <p class='gallery_images--tag'> " . $image['tag_name'] . " </p>
                            </div>
                            <div style='margin-bottom: 10px; display: flex;justify-content: space-between;;align-items: center;'>
                          <div>
                            <button style='margin-left: 15px; background-color: #ff0000; border: none; border-radius: 5px;'><a style='color: #fff; text-decoration: none;' href='index.php?action=delete_image&id=$imgId' > Delete</a></button>
                            </div>
                            <div>
                            <button style='margin-right: 15px; background-color:#484BDB; border: none; border-radius: 5px;'><a style='color: #fff; text-decoration: none;' href='index.php?action=edit_img_tag&id=$imgId'>Edit Tag</a></button>
                            </div>
                           
                            </div>
                            <img class='middle_gallery_img' alt='" . $image["img_alt"] ."' src='" . $image["img_path"] ."' / >
                           
                            </div>
                            
                        </div>"; 
                        }

                      
                    }
                    
                    ?>
                </div>
            </div>

            <div class="right">
                <h4>Filter by tag</h4>
                <div class="right__container">
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>
                    <div class="row"></div>
                </div>
            </div>
        </div>

    <?php
    parent::footer();
    }


	

}