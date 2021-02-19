<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: auth.class.php
 * Description: The Auth Page 
*/

class Auth extends MainView
{
    function show($result)
    {
        parent::header();
?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p><?= $result ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                <?php
                if (strpos($result, "successful") == true) { //if the user has logged in, display the logout button
                    echo "Want to log out? <a href='index.php?action=logout'>Logout</a>";
                } else { //if the user has not logged in, display the login button
                    echo "Already have an account? <a href='index.php?action=login'>Login</a>";
                }
                ?>
                 <?php
            if(isset($_SESSION["pk_user_id"])){
                echo '<h3>Congrats! You Logged In.</h3>';
            }else{
                echo '<h3>Uh oh...The Log-In was not successful. Check your credentials and try again.</h3>
                      <a href="login.php"><button class="btn btn-dark mt-5">Try Again</button></a>';
            }
        ?>
            </span>
            <span style="float: 
<?php
        parent::footer();
    }
}
