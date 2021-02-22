<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: user_model.class.php
 * Description: Manages user data
*/

require_once('app/class.database.php');

class UserModel
{

  //Variables
  private $db;
  private $conn;

  //construct
  function __construct()
  {
    $this->db = Database::getInstance();
    // $this->conn = $this->db->getSQL();
  }

  //Logout user
  function logout()
  {
  }

  //Delete user
  function delete()
  {
  }

  //Reset password?
  function reset()
  {
  }

  //Register user
  function register()
  {
    // we don't need to do anything here
  }

  function register_confirm()
  {
    //Variables
    $username = '';
    $password = '';
    $lastname = '';
    $firstname = '';

    //Retrieves and sanitizes user input
    $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
    $lastname = trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING));

    //encode the password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // displays information
    echo "First Name:" . $firstname . "<br>";
    echo "Last Name:" . $lastname . "<br>";
    echo "Username:" . $username . "<br>";
    echo "Password:" . $hash . "<br><br>";

    $sql = "INSERT INTO " . $this->db->getUserTable() . " (username, password, first_name, last_name) VALUES ('$username', '$hash', '$firstname', '$lastname')";
    echo "SQL:" . $sql . "<br>";
    echo "<hr>";

    //Inserts user input in db
    $result = $this->db->insert_user($sql);

    echo "result: " . $result;

    return $result;
  }

  //Login user
  function login()
  {
    //Retrieves user and pass from db
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    //Selects user data from the final_users table
    $sql = "SELECT password FROM " . $this->db->getUserTable() . "WHERE username='$username'";

    //Runs the sql statement
    $result = $this->conn->query($sql);

    //$results = array();

    //If password is there, start a session with user id
    if ($result and $result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $hash = $row['password'];
      if (password_verify($password, $hash)) {
        session_start();
        $_SESSION["pk_user_id"] = $row["id"];
        return true;
      }
      return false;
    }
  }
}
