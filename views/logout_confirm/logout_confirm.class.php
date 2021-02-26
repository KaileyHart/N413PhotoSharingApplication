<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: logout_confirm.class.php
 * Description: Tells user they logged out
*/

class LogoutConfirm extends MainView
{
  function show()
 
  {  session_start();
    session_destroy();
    
    parent::header();
    ?>

<p></p>
    <?php
 
 if(isset($_SESSION["pk_user_id"])){
    echo '<h3>Something went wrong here. Try to log out again.</h3>';
}else{
    echo '<h3>You logged out.</h3>';
}


    parent::footer();
  }
}