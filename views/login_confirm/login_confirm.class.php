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
        parent::header();
?>
        <div class="top-row"> You Logged in!</div>
      
               
       
         
<?php
        parent::footer();
    }
}
