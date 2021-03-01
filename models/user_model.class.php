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
    $this->conn = $this->db->getSQL();
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

  //Registers user and shows confirmation page
  function register_confirm()
  {

    if (isset($_POST['submit'])) {
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

      $image = $_FILES['image']['name'];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "dist/images/" . $image;
      //encode the password
      $hash = password_hash($password, PASSWORD_DEFAULT);

      // displays information
      echo "First Name:" . $firstname . "<br>";
      echo "Last Name:" . $lastname . "<br>";
      echo "Username:" . $username . "<br>";
      echo "Password:" . $hash . "<br><br>";
      echo $image;
      //echo "Image: <img src='dist/images/" . $image['user_img'] . " ><br><br>";

      $sql = "INSERT INTO " . $this->db->getUserTable() . " (username, password, first_name, last_name, user_img ) VALUES ('$username', '$hash', '$firstname', '$lastname', '$image')";
      echo "SQL:" . $sql . "<br>";
      echo "<hr>";

      if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded successfully";
      } else {
        echo "Failed to upload image";
      }

      //Inserts user input in db
      $result = $this->db->insert_user($sql);

      $user_id = mysqli_insert_id($this->conn);
      if ($user_id) {
        $_SESSION["pk_user_id"] = $user_id;
      }

      echo "result: " . $result;

      return $result;
    }
  }



  //Login user
  function login()
  {
    //Need anything ?
  }

  //Login Confirmation
  function login_confirm()
  {
    //Retrieves user and pass from db
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    $sql = "SELECT password FROM " . $this->db->getUserTable() . " WHERE username='$username'";

    $result = $this->conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    print_r($row['password']);

    $hash = $row['password'];

    if (password_verify($password, $hash)) {
      $correctPassword = true;
    } else {
      $correctPassword = false;
    }

    echo 'correct password: ' . $correctPassword;
    if ($correctPassword) {


      //Selects user data from the final_users table
      $sql = "SELECT * FROM " . $this->db->getUserTable() . " WHERE username='$username'";

      print_r($sql);

      //Runs the sql statement
      //$result = mysqli_query($this->conn = $this->db->getSQL(), $sql);
      $result = $this->conn->query($sql);
      $row = mysqli_fetch_assoc($result);

      //echo "result:" . $result . "<br>";

      print_r($row);
      // if ($result) {
      session_start();
      $_SESSION["pk_user_id"] = $row["pk_user_id"];

      // }
    }
  }


  //Logout user and show confirmation page
  function logout_confirm()
  {
    session_start();
    unset($_SESSION);
    session_destroy();
  }

  //Adds an image to a gallery
  function add_image()
  {
  }

  function add_gallery()
  {
    //May not need?
  }

  //Adds gallery
  function single_gallery_view()
  {

    //Variables
    $galleryName = '';

    //Retrieves and sanitizes user input
    $galleryName = trim(filter_input(INPUT_POST, "galleryName", FILTER_SANITIZE_STRING));

    // displays information
    echo "Gallery Name:" . $galleryName . "<br>";
    session_start();
    $sql = "INSERT INTO " . $this->db->getGalleryTable() . " (fk_user_id, gallery_name) VALUES ('" . $_SESSION['pk_user_id'] . "','$galleryName')";
    echo "SQL:" . $sql . "<br>";
    echo "<hr>";

    //Inserts user input--the gallery-- in db
    $result = $this->db->insert_gallery($sql);

    echo "result: " . $result;

    return $result;
  }

  //Adds an image to a gallery
  function profile()
  {
    //May not need
  }

  //Returns the username
  function get_last_username()
  {
    $user_id = $_SESSION["pk_user_id"];
    $sql = "SELECT * FROM final_users WHERE pk_user_id = $user_id";

   //to db
    $username = $this->db->get_last_username($sql);

    return $username;
  }

  function get_gallery_id() {

  }

  function get_gallery_name() {
    session_start();

    $user_id = $_SESSION["pk_user_id"];
    $gallerySql = "SELECT * FROM final_gallery WHERE fk_user_id = $user_id";

    $results = $this->conn->query($gallerySql);

    if ($results === 0) {
      echo "No galleries were found. Please add one.";
  } else {

      foreach ($results as $result) {
          $galleryId = $result['pk_gallery_id'];

      }
    }

    //Need to somehow grab the gallery id
    
    $sql = "SELECT * FROM final_gallery WHERE pk_gallery_id = $galleryId";

    //to db
    $galleryName = $this->db->get_gallery_name($sql);

    return $galleryName;
  }


  function get_profile_img()
  {
    $user_id = $_SESSION["pk_user_id"];
    $sql = "SELECT * FROM final_users WHERE pk_user_id = $user_id";

    //Inserts user input in db
    $image = $this->db->get_profile_img($sql);

    return $image;
  }

  function get_single_user_galleries()
  {
    session_start();

    $user_id = $_SESSION["pk_user_id"];
    $gallerySql = "SELECT * FROM final_gallery WHERE fk_user_id = $user_id";

    $results = $this->conn->query($gallerySql);

    return $results;

    //if ($results->num_rows > 0) {
    // output data of each row
    //$galleries = array();
    // while ($row = $results->fetch_assoc()) {
    //$galleries[] = $row;
    //echo "Gallery Name: " . $row["gallery_name"] . " - Usr ID: " . $row["fk_user_id"] . "<br>";
    //return $galleries;
    //}
    //   } else {
    //     echo "0 results";
    //   }

  }

  function get_all_galleries()
  {

    $sql = "SELECT * FROM final_gallery";

    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
        echo "Gallery Name: " . $row["gallery_name"] . " - Usr ID: " . $row["fk_user_id"] . "<br>";
      }
    } else {
      echo "0 results";
    }
  }
}
