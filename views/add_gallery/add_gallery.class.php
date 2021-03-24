<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: add_gallery.class.php
 * Description: Let's a user add a gallery 
*/

class AddGallery extends MainView
{
  function show()
  {
    parent::header();
?>
    <h2> Add Gallery</h2>
    <form method="POST" action="index.php?action=add_gallery_confirm">
      <div class="row mt-5">
        <div class="col-4"></div>
        <div id="form-container" class="col-4">
          Gallery Name: <input type="text" id="galleryName" name="galleryName" class="form-control" value="" placeholder="Gallery Name" required /><br />
          Make Gallery Private? <br />
          <div>
            <label>
              <input type="radio" id="isPrivate" name="isPrivate" value="1">
              Yes
            </label>
            <br />
            <label>
              <input type="radio" id="isPrivate" name="isPrivate" value="0">
              No
            </label>
          </div>


          <button type="submit" id="submit" class="btn btn-dark float-right">Submit</button>
        </div>
      </div>
    </form>

<?php
    parent::footer();
  }
}
