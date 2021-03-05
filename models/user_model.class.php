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
  private $db;
  private $conn;

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

  function register()
  {
  }

  //Registers user and shows confirmation page
  function register_confirm()
  {

    if (isset($_POST['submit'])) {

      $username = '';
      $password = '';
      $lastname = '';
      $firstname = '';

      $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
      $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
      $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING));
      $lastname = trim(filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING));

      $image = $_FILES['image']['name'];
      $tempname = $_FILES["image"]["tmp_name"];
      $folder = "dist/images/" . $image;
      //encode the password
      $hash = password_hash($password, PASSWORD_DEFAULT);

      echo "First Name:" . $firstname . "<br>";
      echo "Last Name:" . $lastname . "<br>";
      echo "Username:" . $username . "<br>";
      echo "Password:" . $hash . "<br><br>";
      echo $image;

      $sql = "INSERT INTO " . $this->db->getUserTable() . " (username, password, first_name, last_name, user_img ) VALUES ('$username', '$hash', '$firstname', '$lastname', '$image')";
      echo "SQL:" . $sql . "<br>";
      echo "<hr>";

      if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded successfully";
      } else {
        echo "Failed to upload image";
      }

      $result = $this->db->insert_user($sql);

      $user_id = mysqli_insert_id($this->conn);
      if ($user_id) {
        $_SESSION["pk_user_id"] = $user_id;
      }

      echo "result: " . $result;

      return $result;
    }
  }

  //Login Confirmation
  function login_confirm()
  {
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

      $sql = "SELECT * FROM " . $this->db->getUserTable() . " WHERE username='$username'";

      $result = $this->conn->query($sql);
      $row = mysqli_fetch_assoc($result);

      session_start();
      $_SESSION["pk_user_id"] = $row["pk_user_id"];
    }
  }

  function logout_confirm()
  {
    session_start();
    unset($_SESSION);
    session_destroy();
  }

  function profile()
  {
  }

  function add_gallery()
  {
  }

  function add_image_confirm()
  {
    session_start();

    if (isset($_POST['submit'])) {

      $galleryId = "";
      $image = "";
      $imageAlt = "";
      $tag = $_POST["tag"];

      $galleryId = $_GET["id"];
      $image = filter_input(INPUT_POST, "image", FILTER_SANITIZE_STRING);
      $imageAlt = filter_input(INPUT_POST, "imagealt", FILTER_SANITIZE_STRING);



      $image = $_FILES["galleryImage"]["name"];
      $tempname = $_FILES["galleryImage"]["tmp_name"];
      $folder = "dist/galleryImages/" . $image;

      echo "galleryID: " . $galleryId . "<br>";
      echo "image: " . $image . "<br>";
      echo "image alt: " . $imageAlt . "<br>";

      if (move_uploaded_file($tempname, $folder)) {
        echo "Image uploaded.";
      } else {
        echo "Failed.";
      }

      $sql =
        "INSERT INTO final_images (fk_gallery_id, img_path, img_alt ) VALUES ('$galleryId', '$folder', '$imageAlt')";
      // INSERT INTO final_tags (tag_name, fk_image_id) VALUES ('$tag', '$imageId');";
     
      
        $result = $this->db->insert_img($sql);

      $sql = "SELECT pk_img_id FROM final_images ORDER BY pk_img_id DESC LIMIT 1";

        $IDresult = $this->conn->query($sql);

         //echo "Result: " . $result . "<br>";
        // return $IDresult;
        //return $result;
        print_r($IDresult);
       // print_r($IDresult[0]["pk_img_id"]);
        //echo "RESULT ID: " . $IDresult[0];
        $imageInfo = array();
        while ($row = $IDresult->fetch_assoc()) {
          $imageInfo[] = $row;
        }

        print_r($imageInfo);
       $imageID = $imageInfo[0]["pk_img_id"];

       $sql =
        "INSERT INTO final_img_tags (fk_img_id, fk_tag_id) VALUES ('$imageID', '$tag')";

        $result = $this->db->insert_tag($sql);

        print_r($result);

        //return $galleryInfo;

      //Grab last uploaded image id w select 
      //Insert img id into tags 

      //$image_id = mysqli_insert_id($this->conn);
    }
  }


  function add_image()
  {
     
  }

  //Adds gallery
  function single_gallery_view()
  {

    $galleryName = '';
    $galleryName = trim(filter_input(INPUT_POST, "galleryName", FILTER_SANITIZE_STRING));

    session_start();
    if ($_GET["id"]) {
      $sql = "SELECT * FROM final_gallery WHERE fk_user_id = '" . $_SESSION['pk_user_id'] . "' AND pk_gallery_id = '" . $_GET["id"] . "'";
      echo "SQL:" . $sql . "<br>";
      echo "<hr>";
      $result = $this->conn->query($sql);

      $galleryInfo = array();

      while ($row = $result->fetch_assoc()) {
        $galleryInfo[] = $row;
      }
      return $galleryInfo;
    } else {
      $sql = "INSERT INTO " . $this->db->getGalleryTable() . " (fk_user_id, gallery_name) VALUES ('" . $_SESSION['pk_user_id'] . "','$galleryName')";
      echo "SQL:" . $sql . "<br>";

      $result = $this->db->insert_gallery($sql);
      return $result;
    }
  }

  function get_all_usernames()
  {
    //Add all usernames to each gallery on home page
    // session_start();
    // $user_id = $_SESSION["pk_user_id"];
    // $sql = "SELECT * FROM final_users 
    // JOIN final_gallery
    // ON final_users.pk_user_id=final_gallery.fk_user_id";
    $sql = "SELECT * FROM final_users";

    $usernames = $this->conn->query($sql);
    return $usernames;
  }

  //Returns the username
  function get_last_username()
  {
    $user_id = $_SESSION["pk_user_id"];
    $sql = "SELECT * FROM final_users WHERE pk_user_id = $user_id";

    $username = $this->db->get_last_username($sql);

    return $username;
  }

  function get_gallery_name()
  {
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

    $sql = "SELECT * FROM final_gallery WHERE pk_gallery_id = $galleryId";

    $galleryName = $this->db->get_gallery_name($sql);

    return $galleryName;
  }

  function get_profile_img()
  {
    $user_id = $_SESSION["pk_user_id"];
    $sql = "SELECT * FROM final_users WHERE pk_user_id = $user_id";

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
  }

  function get_all_galleries()
  {
    session_start();

    $sql = "SELECT * FROM final_gallery";

    $results = $this->conn->query($sql);
    return $results;
  }

  
// SELECT *
// FROM images i, tags t, imagetags it
// WHERE i.image_id = it.fk_img_id
// AND t.tag_id = it.fk_tag_id
// AND t.tag_id = 4


// SELCT *
// FROM images i, tags t
// JOIN images ON i.image_id = t.tag_id
// WHERE t.tag_id = 4

// $imageArray = array();

// while($row = mysqli_assoc()) { $imageArray[] = $image; }

// return $imageArray;

// echo "Image: " . $imageArray[0]['image_path'];

// foreach($imageArray as $image) {

  
//   echo "<a href='tag.php?id=" . $image['tag_id'] ."'>Tag</a>";
// }


}
