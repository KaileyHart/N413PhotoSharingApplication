<?php 


require_once("classes/class.database.php");

$database = new Database();

$select_login = "SELECT * FROM final_users WHERE pk_user_id = 1";

$users = $database->getSQL($select_login);
 
print_r($users);

//echo "my name is $first_name";

echo "Welcome " . $users[0]['first_name'];


