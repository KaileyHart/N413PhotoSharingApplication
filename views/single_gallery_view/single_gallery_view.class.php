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
                        <a href="index.php?action=profile" style="margin-right: 2%; color: black">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                            </svg>
                        </a>
                        <h2><?= $galleryName[0]["gallery_name"]; ?></h2>
                    </div>
                </div>

                <div class="left__container">
                    <div class="left__buttons">
                       <a href="index.php?action=add_image&id=<?= $galleryName[0]["pk_gallery_id"]; ?>"> <button> + Add Image </button></a>
                        
                        <a href="index.php?action=edit_gallery&id=<?= $galleryName[0]["pk_gallery_id"]; ?>""><button>Edit Gallery </button></a>
                    </div>
                </div>
            </div>



            <div class=" middle">
                                <div class=" gallery">
                                    <?php

                                    // $width_large = 1;
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
                            <img id='img' class='middle_gallery_img' alt='" . $image["img_alt"] . "' src='" . $image["img_path"] . "' / ></div></div></div> ";
                                        }
                                    }
                                    echo '</div>';
                                    ?>

                                </div>
                    </div>
                </div>
                <script>
                document.getElementById("img").onclick = function() {
                  
                    console.log("clicked");
                   
                } 

                    
                
                </script>
               
        <?php


        parent::footer();
    }
}
