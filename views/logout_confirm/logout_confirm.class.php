<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: logout_confirm.class.php
 * Description: Tells user they logged out
*/

class LogoutConfirm extends MainView
{
  function __construct()
  {
    session_start();
    unset($_SESSION["pk_user_id"]);
    session_destroy();
    
  }
  
  function show()
 
  {  
    parent::header();
    ?>

    <?php
 
 if(isset($_SESSION["pk_user_id"])){
    echo "<h3>Something went wrong here. Try to log out again.</h3>";
}else{
    echo "<div style='max-width: 900px; display: flex;flex-direction: column;   margin: 0 auto; text-align: center;'>
    <h2 style='margin-bottom: 30px; margin-top: 30px; '>You successfully logged out!</h2><button style='background-color: black; border: none; max-width: 500px; margin: 0 auto; border-radius: 5px'> <a style='color: #fff; text-decoration: none; cursor: pointer;' href='index.php' style='margin-right: 2%; color: black '>Home </button>
</div>";
}


    parent::footer();
  }
}