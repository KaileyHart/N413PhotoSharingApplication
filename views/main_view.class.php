<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: main_view.class.php
 * Description: Inscludes header and footer
*/

class MainView
{

  //Header Template
  function header()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
      <title class="title">Phototastic</title>

      <!--JQuery-->
      <script src="dist/js/jquery-3.5.1.min.js" type="application/javascript"></script>
      <!--Bootstrap-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
      <!--Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--Fonts-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Source+Sans+Pro:ital,wght@0,300;1,400&display=swap" rel="stylesheet">
      <!--Styles-->
      <link rel="stylesheet" href="dist/css/profile.css" type="text/css" />
      <link rel="stylesheet" href="dist/css/single_gallery.css" type="text/css" />
      <link rel="stylesheet" href="dist/css/index.css" type="text/css" />
      <link rel="stylesheet" href="dist/css/responsive.css" type="text/css" />


      <style>
        .space {
          margin-bottom: 2%;
        }

        nav {
          padding: 20px;
          margin-bottom: 50px;
        }

        .nav-right {
          margin-left: 500px;
        }

        .navbar-center {
          display: flex;

          margin: 0 auto;
        }

        .nav-icons {
          font-size: 20px;
        }

        .nav-icons-plus {
          font-size: 20px;
        }

        .btn {
          padding: 2px 10px;
          vertical-align: center;
          margin-top: 8px;
        }
      </style>
    </head>

    <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-dark  ">
        <a class="navbar-brand title" href="index.php">Phototastic</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
          
        </button>

        <div class="navbar-collapse collapse" id="navbar">
          <ul class="navbar-nav  ms-auto">
            <?php
            if (isset($_SESSION["pk_user_id"])) {
              echo "<li  class='nav-item'><a class='nav-link nav-li' href='index.php?action=profile'>Profile</a></li>
                        <li class='nav-item'><a class='nav-link nav-li' href='index.php?action=logout_confirm'>Logout</a></li>
                  ";
            } else {
              echo "<li class='nav-item'><a class='nav-link nav-li' href='index.php?action=login'>Login</a></li>
                  <li class='nav-item'><a class='nav-link nav-li' href='index.php?action=register'>Register</a></li>";
            }
            ?>
          </ul>
        </div>
      </nav>
    <?php
  }



  function footer()
  {
    ?>

    </body>
    <footer></footer>

    </html>
<?php


  }
}
