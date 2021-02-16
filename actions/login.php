<?php
/*
Author: Kailey Hart
Date: 02-12-2021
File: login.php
Description: login page
*/

require_once("../classes/class.database.php");

//Create instance of db
// $db = new Database();
// $dbConn = $db->getSQL($sql);


//Set Variables
//$username = "";
//$password = "";

//SQL select query
//$sql = "SELECT * FROM 'final_users' WHERE username = '".$username."' AND password = '".$password."' ";

//$db->getSQL($sql);

//$login->login($username, $password);


//Sanitize
// if(isset($_POST["username"])) { 
//     $username = $_POST["username"]; 
// }
// if(isset($_POST["password"])) { 
//     $password = $_POST["password"];
// }



// if($row) {
//     session_start();
//     $_SESSION['pk_user_id'] = $row['id'];
// }


// if(isset($_SESSION["pk_user_id"])){
//     echo '<h3>You are now Logged In.</h3>';
// }else{
//     echo '<h3>The Log-In was not successful.</h3>
//           <a href="login_view.php"><button class="btn btn-primary mt-5">Try Again</button></a>';
// }


//Sanitize 

//POST username & Password

//SQL SELECT Statement
// function sanitize($item){
//         global $link;
//         $item = html_entity_decode($item);
//         $item = trim($item);
//         $item = stripslashes($item);
//         $item = strip_tags($item);
//         $item = mysqli_real_escape_string( $link, $item );
//         return $item;
//     }

// global $link;

//     $username = "";
//     $password = "";

//     if(isset($_POST["username"])) { $username = $_POST["username"]; }
//     if(isset($_POST["password"])) { $password = $_POST["password"]; }

//     $sql= "SELECT * FROM `final_users` 
//            WHERE username = '".$username."'
//            AND password = '".$password."'
//            LIMIT 1";
//     $result = mysqli_query($link, $sql);
//     $row = mysqli_fetch_array($result, MYSQLI_BOTH);
//     if($row){
//         session_start();
//         $_SESSION["pk_user_id"] = $row["id"];
//     }

include("../templates/head.php");

//retrieve username and password
$username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

//sql statement to filter the users table data with a username
$sql = "SELECT * FROM 'final_users' WHERE username = '" . $username . "' AND password = '" . $password . "' ";
$db = new Database();
$dbConn = $db->getSQL($sql);

print_r($dbConn);


//execute the query
//$query = $dbConn->query($sql);

//verify password; if password is valid, set a temporary cookie
// if ($query and $query->num_rows > 0) {
//     $result_row = $query->fetch_assoc();
//     $hash = $result_row['password'];
//     if (password_verify($password, $hash)) {
//         setcookie("user", $username);
//         return true;
//     }
// } else {
//     return false;
// }



?>


<div class="container-fluid">
    <div id="headline" class="row mt-5">
        <div class="col-12 text-center">
            <h2>Full Stack Amp Jam Log-in</h2>
        </div> <!-- /col-12 -->
    </div> <!-- /row -->
    <div class="row mt-5">
        <div class="col-4"></div> <!-- spacer-->
        <p>HELLLO</p>
            
            <?php

            if (isset($_SESSION["pk_user_id"])) {
                echo '<h3>You are now Logged In.</h3>';
            } else {
                echo '<h3>The Log-In was not successful.</h3>
                      <a href="login.php"><button class="btn btn-primary mt-5">Try Again</button></a>';
            }
            ?>
            <!-- <?php
                // if (strpos($result, "successful") == true) { //if the user has logged in, display the logout button
                //     echo "Want to log out? <a href='index.php?action=logout'>Logout</a>";
                //     echo "uhhhhh.";
                // } else { //if the user has not logged in, display the login button
                //     echo "Already have an account? <a href='index.php?action=login'>Login</a>";
                // }
                ?> -->
        </div> <!-- /.col-4 -->
    </div> <!-- /.row -->
</div> <!-- /.container-fluid -->
</body>

</html>