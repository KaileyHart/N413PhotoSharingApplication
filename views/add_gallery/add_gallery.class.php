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
    <div style="margin-left: 30%; display: flex; align-items: center;">
      <a href="index.php?action=profile" style="margin-right: 2%; color: black"> <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
          <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z" />
        </svg>
      </a>
      <h2> Add Gallery</h2>
    </div>
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
