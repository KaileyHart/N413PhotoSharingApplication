<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: register_confirm.class.php
 * Description: Confirms user registration and outputs username
*/

class RegisterConfirm extends MainView
{
  function show($username)
  {
    parent::header();

    echo "<pre>";
    print_r($username);
    echo "</pre>";

    echo "<p>The last user added was: " . $username['username'] . "</p>";

    parent::footer();
  }
}
