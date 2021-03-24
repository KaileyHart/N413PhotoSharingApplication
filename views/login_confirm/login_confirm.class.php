<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: auth.class.php
 * Description: The Auth Page 
*/

class LoginConfirm extends MainView
{
    function show()
    {
        print_r($_SESSION["pk_user_id"]);
        parent::header();
        if(isset($_SESSION["pk_user_id"])){
            echo '<div style="max-width: 900px; display: flex;flex-direction: column;   margin: 0 auto; text-align: center;">
            <h2 style="margin-bottom: 30px; margin-top: 30px; ">You have successfully logged in!</h2>
            
            <button style="background-color: black; border: none; max-width: 500px; margin: 0 auto; border-radius: 5px"> <a style="color: #fff; text-decoration: none; cursor: pointer;" href="index.php" style="margin-right: 2%; color: black ">Home </button>
        </div>';
        }else{
            echo '<h3>Uh oh...The Log-In was not successful. Check your credentials and try again.</h3>
                  <a href="index.php?action=login"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>


           

      
               
       
         
<?php
        parent::footer();
    }
}
