<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: register.class.php
 * Description: Register page
*/

class Register extends MainView
{
  function show()
  {
    parent::header();
?>
    <form method="POST" action="index.php?action=register_confirm" enctype="multipart/form-data">
      <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">
          First Name: <input type="text" id="firstname" name="firstname" class="form-control" value="" placeholder="Enter First Name" required /><br />
          Last Name: <input type="text" id="lastname" name="lastname" class="form-control" value="" placeholder="Enter Last Name" required /><br />
          User Name: <input type="text" id="username" name="username" class="form-control" value="" placeholder="Enter User Name" required /><br />
          Password: <input type="password" id="password" name="password" class="form-control" value="" placeholder="Enter Password" required /><br />
          Upload Image: <input type="file" id="image" name="image" class="form-control" value="" placeholder="Add a Profile Image" optional/><br />
          <button type="submit" id="submit" name="submit" class="btn btn-dark float-right">Register</button>
        </div>
      </div>
    </form>

<?php
    parent::footer();
  }
}
