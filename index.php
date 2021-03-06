<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: index.php
 * Description: The homepage and the bootstrap file.
*/

require_once("vendor/autoload.php");

//create an object of UserController
$user_controller = new UserController();

//retrieve the action from a querystring variable named "action"
if (!($action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING))) {
  $action = "index";  //default action
}

//take different action depending on the action value
switch ($action) {
  case "index":
    $user_controller->index();
    break;
  case "register":
    $user_controller->register();
    break;
  case "register_confirm":
    $user_controller->register_confirm();
    break;
  case "login":
    $user_controller->login();
    break;
  case "login_confirm":
    $user_controller->login_confirm();
    break;
  case "logout_confirm":
    $user_controller->logout_confirm();
    break;
  case "profile":
    $user_controller->profile();
    break;
  case "edit_profile":
    $user_controller->edit_profile();
    break;
  case "edit_profile_username":
    $user_controller->edit_profile_username();
    break;
  case "edit_profile_image":
    $user_controller->edit_profile_image();
    break;
  case "edit_profile_username_confirm":
    $user_controller->edit_profile_username_confirm();
    break;
  case "edit_profile_image_confirm":
    $user_controller->edit_profile_image_confirm();
    break;
  case "delete_profile_confirm":
    $user_controller->delete_profile_confirm();
    break;
  case "add_gallery":
    $user_controller->add_gallery();
    break;
  case "add_gallery_confirm":
    $user_controller->add_gallery_confirm();
    break;
  case "delete_gallery":
    $user_controller->delete_gallery();
    break;
  case "edit_gallery":
    $user_controller->edit_gallery();
    break;
  case "edit_gallery_name":
    $user_controller->edit_gallery_name();
    break;
  case "edit_gallery_privacy":
    $user_controller->edit_gallery_privacy();
    break;
    case "edit_gallery_privacy_confirm":
      $user_controller->edit_gallery_privacy_confirm();
      break;
  case "edit_gallery_confirm":
    $user_controller->edit_gallery_confirm();
    break;
  case "single_gallery_view":
    $user_controller->single_gallery_view();
    break;
  case "add_image":
    $user_controller->add_image();
    break;
  case "add_image_confirm":
    $user_controller->add_image_confirm();
    break;
  case "edit_img_tag":
    $user_controller->edit_img_tag();
    break;
  case "edit_img_tag_confirm":
    $user_controller->edit_img_tag_confirm();
    break;
  case "delete_image":
    $user_controller->delete_image();
    break;
  case "filter_tag_index":
    $user_controller->filter_tag_index();
    break;
  case "reset":
    $user_controller->reset();
    break;
  case "do_reset":
    $user_controller->reset();
    break;
  default:
    $user_controller->error("Invalid action was requested.");
}
