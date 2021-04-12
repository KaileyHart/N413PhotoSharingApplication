<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: user_controller.class.php
 * Description: Controls each 'view'
*/


// login, logout, register
require_once('views/login_confirm/login_confirm.class.php');
require_once('views/register_confirm/register_confirm.class.php');
require_once('views/logout_confirm/logout_confirm.class.php');
//Profile
require_once('views/profile/profile.class.php');
require_once('views/edit_profile/edit_profile.class.php');
require_once('views/edit_profile_username/edit_profile_username.class.php');
require_once('views/edit_profile_image/edit_profile_image.class.php');
require_once('views/edit_profile_image_confirm/edit_profile_image_confirm.class.php');
require_once('views/edit_profile_username_confirm/edit_profile_username_confirm.class.php');
require_once('views/delete_profile_confirm/delete_profile_confirm.class.php');
//Image
require_once('views/add_image_confirm/add_image_confirm.class.php');
require_once('views/add_image/add_image.class.php');
require_once('views/delete_image_confirm/delete_image_confirm.class.php');
//Gallery
require_once('views/add_gallery/add_gallery.class.php');
require_once('views/add_gallery_confirm/add_gallery_confirm.class.php');
require_once('views/edit_gallery/edit_gallery.class.php');
require_once('views/edit_gallery_confirm/edit_gallery_confirm.php');
require_once('views/edit_gallery_name/edit_gallery_name.class.php');
require_once('views/edit_gallery_privacy/edit_gallery_privacy.class.php');
require_once('views/edit_gallery_privacy_confirm/edit_gallery_privacy_confirm.class.php');
require_once('views/single_gallery_view/single_gallery_view.class.php');
require_once('views/delete_gallery_confirm/delete_gallery_confirm.class.php');
//Tags
require_once('views/edit_img_tag/edit_img_tag.class.php');
require_once('views/edit_img_tag_confirm/edit_img_tag_confirm.class.php');
require_once('views/filter_tag_index/filter_tag_index.class.php');



class UserController
{

  //Variables
  private $user_model;

  //construct
  function __construct()
  {
    $this->user_model = new UserModel;
  }

  //Shows home page
  function index()
  {
    $tags = $this->user_model->get_all_tags();
    $results = $this->user_model->get_all_galleries();
    $main_view = new Index();
    $main_view->show($results, $tags);
  }

  //Calls register method from user model & shows Registration form
  function register()
  {
    $result = $this->user_model->register_confirm();
    //$result = $this->user_model->register();
    $main_view = new Register();
    $main_view->show($result);
  }

  function register_confirm()
  {
    $result = $this->user_model->register_confirm();
    $main_view = new RegisterConfirm();
    $main_view->show();
  }

  function login()
  {
    $main_view = new Login();
    $main_view->show();
  }

  function login_confirm()
  {
    $result = $this->user_model->login_confirm();
    $main_view = new LoginConfirm();
    $main_view->show($result);
  }

  //Allows user to logout
  function logout_confirm()
  {
    $this->user_model->logout_confirm();
    $main_view = new LogoutConfirm;
    $main_view->show();
  }

  //Add gallery 
  function add_gallery()
  {
    $this->user_model->add_gallery();
    $main_view = new AddGallery;
    $main_view->show();
  }

  function add_gallery_confirm()
  {
    $result = $this->user_model->single_gallery_view();
    $main_view = new AddGalleryConfirm;
    $main_view->show($result);
  }


  function delete_gallery()
  {
    $result = $this->user_model->delete_gallery_confirm();
    $main_view = new DeleteGalleryConfirm;
    $main_view->show($result);
  }


  function edit_gallery()
  {
    $images = $this->user_model->display_single_gallery_images();
    $galleryName = $this->user_model->single_gallery_view();
    $main_view = new EditGallery;
    $main_view->show($galleryName, $images);
  }

  function edit_gallery_name()
  {
    $galleryName = $this->user_model->single_gallery_view();
    $main_view = new EditGalleryName;
    $main_view->show($galleryName);
  }

  function edit_gallery_privacy()
  {
    $galleryName = $this->user_model->single_gallery_view();
    $main_view = new EditGalleryPrivacy;
    $main_view->show($galleryName);
  }

  function edit_gallery_privacy_confirm()
  {
    $result = $this->user_model->edit_gallery_privacy_confirm();
    $main_view = new EditGalleryPrivacyConfirm;
    $main_view->show($result);
  }

  function edit_gallery_confirm()
  {
    $result = $this->user_model->edit_gallery_confirm();
    $main_view = new EditGalleryConfirm;
    $main_view->show($result);
  }

  //Add gallery 
  function single_gallery_view()
  {
    $tags = $this->user_model->get_all_tags();
    $galleryName = $this->user_model->single_gallery_view();
    $images = $this->user_model->display_single_gallery_images();
    $main_view = new SingleGallery;
    $main_view->show($galleryName, $images, $tags);
  }

  //Add image to a gallery 
  function add_image()
  {
    $galleryName = $this->user_model->single_gallery_view();
    //$this->user_model->add_image();
    $main_view = new AddImage;
    $main_view->show($galleryName);
  }

  //Delete an image
  function delete_image()
  {
    $result = $this->user_model->delete_image_confirm();
    $main_view = new DeleteImageConfirm;
    $main_view->show($result);
  }

  //Add image to a gallery 
  function add_image_confirm()
  {
    $result = $this->user_model->add_image_confirm();
    $main_view = new AddImageConfirm;
    $main_view->show($result);
  }

  //Edits image tag
  function edit_img_tag()
  {
    $galleryName = $this->user_model->single_gallery_view();
    $result = $this->user_model->edit_img_tag();
    $main_view = new EditImgTag;
    $main_view->show($result, $galleryName);
  }

  //Image tag confirmation
  function edit_img_tag_confirm()
  {
    $result = $this->user_model->edit_img_tag_confirm();
    $main_view = new EditImgTagConfirm;
    $main_view->show($result);
  }

  //Shows user profile
  function profile()
  {
    $galleryPreviews = $this->user_model->gallery_preview();
    $results = $this->user_model->get_single_user_galleries();
    $username = $this->user_model->get_last_username();
    $image = $this->user_model->get_profile_img();
    $this->user_model->profile();
    $main_view = new Profile;
    $main_view->show($results, $username, $image, $galleryPreviews);
  }

  //Edit profile page 
  function edit_profile()
  {
    $results = $this->user_model->get_single_user_galleries();
    $username = $this->user_model->get_last_username();
    $image = $this->user_model->get_profile_img();
    $this->user_model->edit_profile();
    $main_view = new EditProfile;
    $main_view->show($results, $username, $image);
  }

   //Edit profile username for user
   function edit_profile_username()
   {
     $results = $this->user_model->get_single_user_galleries();
     $username = $this->user_model->get_last_username();
     $image = $this->user_model->get_profile_img();
     $this->user_model->edit_profile();
     $main_view = new EditProfileUsername;
     $main_view->show($results, $username, $image);
   }
    //Edit profile image for user
  function edit_profile_image()
  {
    $results = $this->user_model->get_single_user_galleries();
    $username = $this->user_model->get_last_username();
    $image = $this->user_model->get_profile_img();
    $this->user_model->edit_profile();
    $main_view = new EditProfileImage;
    $main_view->show($results, $username, $image);
  }

     //Edit profile username for user
     function edit_profile_username_confirm()
     {
       $this->user_model->edit_profile_username_confirm();
       $results = $this->user_model->get_single_user_galleries();
       $username = $this->user_model->get_last_username();
       $image = $this->user_model->get_profile_img();
       $main_view = new EditProfileUsernameConfirm;
       $main_view->show($results, $username, $image);
     }
      //Edit profile image for user
    function edit_profile_image_confirm()
    {
      $results = $this->user_model->get_single_user_galleries();
      $username = $this->user_model->get_last_username();
      $image = $this->user_model->get_profile_img();
      $this->user_model->edit_profile_image_confirm();
      $main_view = new EditProfileImageConfirm;
      $main_view->show($results, $username, $image);
    }

  //Delete user profile 
  function delete_profile_confirm()
  {
    $results = $this->user_model->get_single_user_galleries();
    $username = $this->user_model->get_last_username();
    $image = $this->user_model->get_profile_img();
    $this->user_model->delete_profile_confirm();
    $main_view = new DeleteProfileConfirm;
    $main_view->show($results, $username, $image);
  }

  //filter images with tags on the index page
  function filter_tag_index() {
    $filteredResults = $this->user_model->filter_by_tag();
    $tags = $this->user_model->get_all_tags();
    $results = $this->user_model->get_all_galleries();
    $main_view = new FilterTagIndex;
    $main_view->show($results, $tags, $filteredResults);
  }

 
  //Reset pass?
  function reset()
  {
  }

  //Show an error
  function error()
  {
  }
}
