<?php

/*
 * Author: Kailey Hart
 * Date: 03-15-2021
 * Name: edit_img_tag.class.php
 * Description: Edit image tag name 
*/

class EditImgTag extends MainView  {
    function show() {
        parent::header();

        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>Uh oh...You ar\'t logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>
   <h2>Edit Image Tag for <?= $_GET['id']?>[image alt]</h2>
    <form method="POST" action="index.php?action=edit_img_tag_confirm&id=<?= $_GET['id']?>" enctype="multipart/form-data" >
    <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">

            <label for="tag">New Image Tag</label>
            <br>
            <select name="tag" id="tag">
                <option value="1" >family</option>
                <option value="2" >friends</option>
                <option value="3">fashion</option>
                <option value="4" >nature</option>
                <option value="5" >architecture</option>
                <option value="6" >animal</option>
                <option value="7" >food</option>
                <option value="8" >technology</option>
                <option value="9" >travel</option>
                <option value="10">art</option>
                <option value="11" >drinks</option>
                <option value="12" >patterns</option>
                <option value="13">spirituality</option>
                <option value="14" >business</option>
                <option value="15" >interiors</option>
            </select>
            <br>
            <button type="submit" id="submit" name="submit" class="btn btn-dark float-right">Submit</button>
        </div>
    </div>
</form>
    <?php
    parent::footer();
    }


	

}