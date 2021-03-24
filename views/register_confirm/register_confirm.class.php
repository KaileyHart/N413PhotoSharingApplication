<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: register_confirm.class.php
 * Description: Confirms user registration and outputs username
*/

class RegisterConfirm extends MainView
{
  
  function show()
  {
    
   
    parent::header();

    echo "<pre>";
    echo "</pre>";

    //echo "<p>The last user added was: " . $username['username'] . "</p>";

    if(isset($_SESSION["pk_user_id"])){
      echo '<div style="max-width: 900px; display: flex;flex-direction: column;   margin: 0 auto; text-align: center;">
      <h2 style="margin-bottom: 30px; margin-top: 30px; ">Congrats! You Registered!</h2>
      
      <button style="background-color: black; border: none; max-width: 500px; margin: 0 auto; border-radius: 5px"> <a style="color: #fff; text-decoration: none; cursor: pointer;" href="index.php?action=profile" style="margin-right: 2%; color: black ">View Profile </button>
  </div>';
  }else{
      echo '<h3>Uh oh...The Registration was not successful. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
  }

    parent::footer();
  }
}
