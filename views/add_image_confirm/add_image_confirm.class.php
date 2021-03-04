<?php
/*
 * Author: Kailey Hart
 * Date: 03-04-2021
 * Name: add_image_confirm.php
 * Description: Image Added Confirmation
*/

class AddImageConfirm extends MainView
{
    function show($result)
    { 
        parent::header();

        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
        
        print_r($result);
        // print_r($_SESSION["pk_user_id"]);
        // parent::header();
        // if(isset($_SESSION["pk_user_id"])){
        //     echo '<h3>Congrats! You Logged In.</h3>';
        // }else{
        //     echo '<h3>Uh oh...The Log-In was not successful. Check your credentials and try again.</h3>
        //           <a href="index.php?action=login"><button class="btn btn-dark mt-5">Try Again</button></a>';
        // }
?>


           
        <div class="top-row"> This is the add image confirmation page</div>
      
               
       
         
<?php
        parent::footer();
    }
}
