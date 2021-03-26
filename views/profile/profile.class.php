<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: profile.class.php
 * Description: Profile page -- where user can view their galleries, add an image to each gallery, add a gallery, edit their profile, and sort their galleries
*/

class Profile extends MainView
{
    function show($results, $username, $image)
    {



        parent::header();
        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
?>

        <div class="profile__container">
            <div class="left">
                <h2>Your Profile</h2>
                <div class="left__container">
                    <div style="max-width: 225px; height: auto;" class="left_user_image--container">
                      <img  class="left_user_image" alt="profile image" src="<?=$image['user_img']?>"> 
                    </div>
                    <div class="left__buttons">
                        <p><?=$username['username']?></p>
                        <button><a href="index.php?action=add_gallery"> + Add gallery</a> </button>
                        <button><a href="index.php?action=edit_profile">Edit Profile</a> </button>
                    </div>

                </div>
            </div>



            <div class="middle">
                <h2>Your Galleries</h2>
                <div class="gallery">
                    <?php
                    if ($results === 0) {
                        echo "No galleries were found. Please add one.";
                    } else {

                        foreach ($results as $result) {
                            $galleryId = $result['pk_gallery_id'];
                            echo "
                            <div >
                            <div>
                                <a href='index.php?action=single_gallery_view&id=$galleryId'>
                                    <div class='gallery' data-id='" . $result['pk_gallery_id'] . "' data-item='" . $result['gallery_name'] . "'>
                                    <div>
                                        <b>" . $result['gallery_name'] . "</b> 

                                        </div> 
                                    </div> 
                                </a>
                               
                            </div>
                            </div>
                           
                           
                            ";
                            //<img style='height: 100px; width: auto;' class='middle_gallery_img' alt='" . $result["img_alt"] . "' src='" . $result["img_path"] . "' / ></div>
                        }
                    }
                    
                    ?>
                </div>
            </div>

            <div class="right">
                <h4>Filter by tag</h4>
                <div class="right__container">
                <?php
                   

                   
                
                    
                    ?>
                </div>
            </div>
        </div>

       


<?php
        parent::footer();
    }
}
