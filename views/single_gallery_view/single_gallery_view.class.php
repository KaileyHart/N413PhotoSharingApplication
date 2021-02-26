<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: single_gallery_view.class.php
 * Description: Shows all the images in one gallery
*/

class SingleGallery  extends MainView
{
    function show()
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
                    
                        <button>Back</button>
                        <h2>Your Gallery Name Here</h2>
                    
                </div>

                <div class="left__container">
                    <div class="left__buttons">

                        <button><a href="index.php?action=add_image"> + Add Image</a> </button>
                        <button><a href="index.php?action=edit_gallery">Edit Gallery</a> </button>
                    </div>

                </div>
            </div>



            <div class="middle">
                <h2>Gallery Images</h2>
                <div class="gallery">

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
