<?php

/*
 * Author: Kailey Hart
 * Date: 03-14-2021
 * Name: edit_gallery.class.php
 * Description: Edit Gallery/Delete Gallery 
*/

class EditGallery extends MainView
{
    function show($galleryName, $images)
    {
        parent::header();

        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>Uh oh...You ar\'t logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>
        <!-- <h2><?php $galleryId = (isset($_GET['id']) ? $_GET['id'] : '');
                    echo "Edit "  . $galleryName[0]['gallery_name'] . " <br> ID: " .  $galleryId;
                    ?> </h2>
   <p>This is where I will be able to edit name and delete gallery and delete images in a gallery</p> -->
        <div class="gallery__container">

            <div class="left">
                <div class="right__container">
                    <div style="display: flex; align-items: center;">
                        <a href="index.php?action=single_gallery_view&id=<?= $_GET['id'] ?>" style="margin-right: 2%; color: black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                            </svg>
                        </a>
                        <h2>Edit <?= $galleryName[0]["gallery_name"]; ?></h2>
                    </div>


                </div>

                <div class="left__container">
                    <div class="left__buttons">

                        <button><a href="index.php?action=add_image&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"> + Add Image</a> </button>
                        <button><a href="index.php?action=edit_gallery_name&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"">Edit Gallery Name</a> </button>
                       
                        <button style=" background-color: #ff0000;"><a href="index.php?action=delete_gallery&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"">Delete Gallery</a> </button>
                    </div>

                </div>
            </div>



            <div class=" middle">
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
                            <button style='margin-right: 15px; background-color:#484BDB; border: none; border-radius: 5px;'><a style='color: #fff; text-decoration: none;' href='index.php?action=edit_img_tag&img_id=$imgId'>Edit Tag</a></button>
                            </div>
                           
                            </div>
                            <img class='middle_gallery_img' alt='" . $image["img_alt"] . "' src='" . $image["img_path"] . "' / >
                           
                            </div>
                            
                        </div>";
                                            }
                                        }

                                        ?>
                                    </div>
                    </div>


                </div>

        <?php
        parent::footer();
    }
}
