<?php
/*
 * Author: Kailey Hart
 * Date: 02-23-2021
 * Name: profile.class.php
 * Description: Profile page -- where user can view their galleries, add an image to each gallery, add a gallery, edit their profile, and sort their galleries
*/

class Profile extends MainView
{

    private $db;
    private $conn;

    function __construct()
    {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getSQL();
    }

    function show($results, $username, $image, $galleryPreviews)
    {
        parent::header();
        if (!isset($_SESSION["pk_user_id"])) {
            echo '<h3>You are not logged in. Check your credentials and try again.</h3>
            <a href="index.php?action=register"><button class="btn btn-dark mt-5">Try Again</button></a>';
        }
        //print_r($galleryPreviews);

?>

        <div class="profile__container">
            <div class="profile_left">
                <div class="profile_left__container">
                    <div style="max-width: 225px; height: auto;" class="left_user_image--container">
                        <img class="left_user_image" alt="profile image" src="<?= $image['user_img'] ?>">
                    </div>
                    <div class="profile_left__buttons">
                        <p><b> <?= $username['username'] ?></b></p>
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
                            echo "<div class='gallery--preview'>";
                            $galleryId = $result['pk_gallery_id'];
                            echo "

                    
                                <a class='gallery--img-a' href='index.php?action=single_gallery_view&id=$galleryId'>
                                    <div class='gallery--img' data-id='" . $result['pk_gallery_id'] . "' data-item='" . $result['gallery_name'] . "'>
                                    <p>
                                        <b>" . $result['gallery_name'] . "</b> 
                                    </p> 
                                    
                                
                                
                            ";

                            $sql = "SELECT *
                            FROM final_images i, final_tags t, final_img_tags it
                            WHERE i.pk_img_id = it.fk_img_id
                            AND t.pk_tag_id = it.fk_tag_id
                            AND i.fk_gallery_id = $galleryId
                            LIMIT 6";
                            
                            $results = $this->conn->query($sql);

                            $previewImages = array();

                            while ($row = $results->fetch_assoc()) {
                                $previewImages[] = $row;
                            }


                            foreach ($previewImages as $previewImage ) {
                          

                                echo "<img class='profile_middle_gallery_img'id='" . $previewImage["pk_img_id"] . "' alt='" . $previewImage["img_alt"] . "' src='" . $previewImage["img_path"] . "' / ></a>
                               ";
                           
                            }
                        }
                    }

                    ?>
                </div>
               
            </div>

            <div class="right">

            </div>
        </div>




<?php
        parent::footer();
    }
}
