<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: user_controller.class.php
 * Description: Controls each 'view'
*/
// require_once('models/user_model.class.php');
// //Views
// require_once('views/index/index.class.php');
// require_once('views/register/register.class.php');
// require_once('views/login/login.class.php');

// comment out for your machine
require_once('views/login_confirm/login_confirm.class.php');
require_once('views/register_confirm/register_confirm.class.php');
require_once('views/logout_confirm/logout_confirm.class.php');
require_once('views/add_image_confirm/add_image_confirm.class.php');
require_once('views/add_image/add_image.class.php');
require_once('views/add_gallery/add_gallery.class.php');
require_once('views/add_gallery_confirm/add_gallery_confirm.class.php');
require_once('views/profile/profile.class.php');
require_once('views/single_gallery_view/single_gallery_view.class.php');
require_once('views/edit_gallery/edit_gallery.class.php');
require_once('views/edit_gallery_confirm/edit_gallery_confirm.php');
require_once('views/edit_gallery_name/edit_gallery_name.class.php');
require_once('views/delete_gallery_confirm/delete_gallery_confirm.class.php');
require_once('views/delete_image_confirm/delete_image_confirm.class.php');


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
    
    $usernames = $this->user_model->get_all_usernames();
    $results = $this->user_model->get_all_galleries();
    $main_view = new Index();
    $main_view->show($results, $usernames );
  }

  //Calls register method from user model & shows Registration form
  function register()
  {$result = $this->user_model->register_confirm();
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
   function add_gallery() {
    $this->user_model->add_gallery();
    $main_view = new AddGallery;
    $main_view->show();
  }

  function add_gallery_confirm() {
    $result = $this->user_model->single_gallery_view();
    $main_view = new AddGalleryConfirm;
    $main_view->show($result);

  }


  function delete_gallery() {
    $result = $this->user_model->delete_gallery_confirm();
    $main_view = new DeleteGalleryConfirm;
    $main_view->show($result);
  }


  function edit_gallery() {
    //$this->user_model->edit_gallery();
    $images = $this->user_model->display_single_gallery_images();
    $galleryName = $this->user_model->single_gallery_view();
    $main_view = new EditGallery;
    $main_view->show($galleryName, $images);
  }

  function edit_gallery_name() {
    //$this->user_model->edit_gallery();
    $galleryName = $this->user_model->single_gallery_view();
    $main_view = new EditGalleryName;
    $main_view->show($galleryName);
  }

  function edit_gallery_confirm() {
    $result = $this->user_model->edit_gallery_confirm();

    $main_view = new EditGalleryConfirm;
    $main_view->show($result);
  }

  //Add gallery 
  function single_gallery_view() {
    $galleryName = $this->user_model->single_gallery_view();
    $images = $this->user_model->display_single_gallery_images();
    $main_view = new SingleGallery;
    $main_view->show($galleryName, $images);
  }

  //Add image to a gallery 
  function add_image() {
    $galleryName = $this->user_model->single_gallery_view();
    //$this->user_model->add_image();
    $main_view = new AddImage;
    $main_view->show($galleryName);
  }

  function delete_image() {
    $result = $this->user_model->delete_image_confirm();
    $main_view = new DeleteImageConfirm;
    $main_view->show($result);
  }


   //Add image to a gallery 
   function add_image_confirm() {
    $result = $this->user_model->add_image_confirm();
    // $this->user_model->add_image_confirm();
    $main_view = new AddImageConfirm;
    $main_view->show($result);
  }

  //Shows user profile
  function profile() {
    $results = $this->user_model->get_single_user_galleries();
    $username = $this->user_model->get_last_username();
    $image = $this->user_model->get_profile_img();
    $this->user_model->profile();
    $main_view = new Profile;
    $main_view->show($results, $username, $image);
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
