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


       
       
    if(isset($_SESSION["pk_user_id"])){
      echo '<h3><h2> Single Gallery </h2></h3>';
  }else{
      echo '<h3>Uh oh...The Registration was not successful. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
  }


        parent::footer();
    }
}
