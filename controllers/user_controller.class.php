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
    $main_view = new Index();
    $main_view->show();
  }

  //Calls register method from user model & shows Registration form
  function register()
  {
    $result = $this->user_model->register();

    $main_view = new Register();
    $main_view->show($result);
  }

  function register_confirm()
  {
    $result = $this->user_model->register_confirm();
    $result = "Something";

    $main_view = new RegisterConfirm();
    $main_view->display();
  }

  //Calls login method from user model & shows login form 
  function login()
  {
    $main_view = new Login();
    $main_view->show();
  }

  //Authenticates user on login
  function auth()
  {
    $result = $this->user_model->login();
    $main_view = new Auth();
    $main_view->show($result);
  }

  //Allows user to logout
  function logout()
  {
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
