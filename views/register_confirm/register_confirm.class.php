<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: register_confirm.class.php
 * Description: RegisterConfirm page
*/

class RegisterConfirm extends MainView
{
  function display()
  {
    echo "<h3>Welcome h3</h3>";
  }

  function show()
  {
    parent::header();
?>
    <h1>Welcome</h1>

<?php
    parent::footer();
  }
}
