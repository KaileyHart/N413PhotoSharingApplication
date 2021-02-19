<?php 
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: user_model.class.php
 * Description: Manages user data
*/

require_once('app/class.database.php');

class UserModel {

    //Variables
    private $db;
    private $conn;

    //construct
    function __construct() {
         $this->db = Database::getInstance();
         $this->conn = $this->db->getSQL();
    }

    //Logout user
    function logout() {}

    //Delete user
    function delete() {}

    //Reset password?
    function reset() {}

    //Register user
    function register() {
         //Variables
         $username = '';
         $password = '';
         $lastname = '';
         $firstname = '';
         $result = '';

        //Retrieves and sanitizes user input
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
		$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $lastname = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);

        //encode the password
        $hash = password_hash($password, PASSWORD_DEFAULT);
		
        //Inserts user input in db
        $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES(NULL, '$username', '$hash', '$firstname', '$lastname')";
        
        //Runs the sql command and results with success or fail 
        if($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
       
    }

    //Login user
    function login() {
        //Retrieves user and pass from db
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        //Selects user data from the final_users table
        $sql = "SELECT password FROM " . $this->db->getUserTable() . "WHERE username='$username'";

        //Runs the sql statement
        $result = $this->conn->query($sql);

        //$results = array();

        //If password is there, set a cookie? or session?
        if($result AND $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hash = $row['password'];
            if(password_verify($password, $hash)) {
                session_start();
                $_SESSION["pk_user_id"] = $row["id"];
                return true;
            }
            return false;
        }
    }
}
