<?php
/*
Author: Kailey Hart
Date: 02-12-2021
File: login_view.php
Description: login page
*/
?>

<html>
<form method="POST" action="../actions/login.php">
    <div class="row mt-5">
        <div class="col-4"></div> 
        <div id="form-container" class="col-4">
            User Name: <input type="text" id="username" name="username" class="form-control" value="" placeholder="Enter User Name" required /><br />
            Password: <input type="password" id="password" name="password" class="form-control" value="" placeholder="Enter Password" required /><br />
            <button type="submit" id="submit" class="btn btn-dark float-right">Submit</button>
        </div> 
    </div> 
</form>

</html>
