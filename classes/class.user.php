<?php
/*
Author: Kailey Hart
Date: 02-12-2021
File: class.user.php
Description: 
*/

require_once("class.database.php");

class User extends Database
{

  function __construct()
  {
    parent::__construct();
  }

  function login($username, $password)
  {
    $sql = "SELECT * FROM final_users WHERE username = '$username' AND password = '$password'";
    $query = $this->conn->query($sql);

    if ($query->num_rows > 0) {
      $row = $query->fetch_array();
      return $row['id'];
    } else {
      return false;
    }
  }

  function signup()
  {

    //If the form is submitted, then insert the profile into the db
    if (isset($_REQUEST['username'])) {
      $username = stripslashes($_REQUEST['username']);
      $username = mysqli_real_escape_string($link, $username);
      $password = stripslashes($_REQUEST['username']);
      $password = mysqli_real_escape_string($link, $username);


      $query = "INSERT into `final_users` (username, password) VALUES ('$username', '" . md5($password) . "')";
      $result = mysqli_query($link, $query);
      if ($result) {
        echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
      }
    } else {
    }
  }
}
