<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: single_gallery_view.class.php
 * Description: Shows all the images in one gallery
*/

class SingleGallery  extends MainView
{
    function show($galleryName, $images)
    {
       //print_r($galleryName);
        parent::header();




        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>Uh oh...You ar\'t logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>
        <div class="gallery__container">

            <div class="left">
                <div class="right__container">
                    
                        <button><a href="index.php?action=profile"> Back</a></button>
                        <h2><?= $galleryName[0]["gallery_name"]; ?></h2>
                    
                </div>

                <div class="left__container">
                    <div class="left__buttons">

                        <button><a href="index.php?action=add_image&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"> + Add Image</a> </button>
                        <!-- <button><a href="index.php?action=edit_gallery_name&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"">Edit Gallery</a> </button> -->
                        <button><a href="index.php?action=edit_gallery&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"">Edit Gallery</a> </button>
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
                            echo "<div class='gallery_images--top'>
                            <div class='gallery_images'>
                            <div class='gallery_images--info'>
                            <p>" . $image['img_alt'] . "</p> <p class='gallery_images--tag'> " . $image['tag_name'] . " </p></div>
                            <img class='middle_gallery_img' alt='" . $image["img_alt"] ."' src='" . $image["img_path"] ."' / ></div></div>"; 
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
