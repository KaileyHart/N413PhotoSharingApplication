<?php

/*
 * Author: Kailey Hart
 * Date: 03-15-2021
 * Name: delete_image_confirm.class.php
 * Description: Deletes the image in a specific gallery
*/

class DeleteImageConfirm extends MainView  {
    
    function show($result)
    {
        parent::header();

        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }

        print_r($result);
        //echo "$result[0]['gallery_name']";
?>



        <div class="top-row">
            <h2>You successfully deleted an image.</h2>


        </div>




<?php
        parent::footer();
    }


	

}