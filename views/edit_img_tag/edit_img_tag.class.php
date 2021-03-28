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
<div style="display: flex; align-items: center; margin-left: 5%;">
            <a href="index.php?action=single_gallery_view&id=<?= $_GET['id'] ?>" style="margin-right: 2%; color: black">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>
            <h2>Edit Image Tag </h2>
        </div>
   
    <form method="POST" action="index.php?action=edit_img_tag_confirm&img_id=<?= $_GET['img_id']?>" enctype="multipart/form-data" >
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