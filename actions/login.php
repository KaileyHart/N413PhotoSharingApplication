<?php
/*
Author: Kailey Hart
Date: 02-12-2021
File: login.php
Description: login page
*/

require_once("../classes/class.database.php");

//Create instance of db
$db = new Database();

//Set Variables
$username = "";
$password = "";

//SQL select query
$sql = "SELECT * FROM 'final_users' WHERE username = '".$username."' AND password = '".$password."' ";

$db->getSQL($sql);

$login->login($username, $password);


//Sanitize
if(isset($_POST["username"])) { 
    $username = $_POST["username"]; 
}
if(isset($_POST["password"])) { 
    $password = $_POST["password"];
}



// if($row) {
//     session_start();
//     $_SESSION['pk_user_id'] = $row['id'];
// }


if(isset($_SESSION["pk_user_id"])){
    echo '<h3>You are now Logged In.</h3>';
}else{
    echo '<h3>The Log-In was not successful.</h3>
          <a href="login_view.php"><button class="btn btn-primary mt-5">Try Again</button></a>';
}



?>







