<?php
/*
Author: Kailey Hart
Date: 02-12-2021
File: class.user.php
Description: 
*/

require_once("class.database.php");

class User extends Database {

    public function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM final_users WHERE username = '$username' AND password = '$password'";
        $query = $this->conn->query($sql);

        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['id'];
        }
        else{
            return false;
        }
    }

 
    public function sanitzie($item){
 
        return $this->conn->real_escape_string($item);
    }
}