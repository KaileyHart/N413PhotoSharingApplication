
<?php 
require_once('../templates/head.php');
//require_once('../classes/class.database.php');
require_once('../config.php');


//$database = new Database();



//$users = $database->getSQL($select_login);

//If the form is submitted, then insert the profile into the db
if(isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($link, $username);
    $password = stripslashes($_REQUEST['username']);
    $password = mysqli_real_escape_string($link, $username);

   
    $query = "INSERT into `final_users` (username, password)
VALUES ('$username', '".md5($password)."')";
        $result = mysqli_query($link ,$query);
        if($result){
            echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{

}
?>



</body>
</html>