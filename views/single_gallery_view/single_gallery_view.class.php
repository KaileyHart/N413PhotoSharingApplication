<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: single_gallery_view.class.php
 * Description: Shows all the images in one gallery
*/

class SingleGallery extends MainView
{
    function show($galleryName, $images, $tags)
    {
        parent::header();




        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>Uh oh...You ar\'t logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>
        <div class="gallery__container">

            <div class="left">
                <div class="right__container">
                    <div style="display: flex; align-items: center; margin-left: 5%;">
                        <a href="index.php?action=profile" style="margin-right: 2%; color: black"> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
                                <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
                            </svg>
                        </a>
                        <h2><?= $galleryName[0]["gallery_name"]; ?></h2>
                    </div>


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
                                <div class=" gallery">
                                    <?php

                                     $width_large = 2;
                                     $row_count = 0;

                                    if ($images === 0) {
                                        echo "No images were found. Please add one.";
                                    } else {
                                        echo "<div class = 'row'> ";
                                        foreach ($images as $image) {
                                            $row_count++;
                                            echo "<div class='col'> 
                                                <div class=' gallery_images--top '> 
                            <div class='gallery_images '>
                            <div class='gallery_images--info'>
                            <p>" . $image['img_alt'] . "</p> <p class='gallery_images--tag'> " . $image['tag_name'] . " </p></div>
                            <img class='middle_gallery_img' alt='" . $image["img_alt"] . "' src='" . $image["img_path"] . "' / ></div></div></div> ";
                                        }
                                    }
                                    echo '</div>';
                                    ?>
                                   
                                </div>
                    </div>
        </div>
        <?php


        parent::footer();
    }
}
