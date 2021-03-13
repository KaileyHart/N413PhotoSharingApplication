<?php
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: index.class.php
 * Description: The homepage 
*/
//require_once('views/main_view.class.php');

class Index extends MainView
{
    function show($results, $usernames)
    {

        // if($results['fk_user_id'] = $usernames['pk_user_id']) {
        // } else {
        //     echo "false";
        // }

        parent::header();

?>
        <div class="index_container">
            <div class="index_container--left"></div>
            <div class="index_container--center">
                <h2>Public Feed</h2>
                <div class="index">
                    <?php
                    if ($results === 0) {
                        echo "No galleries were found. Please add one.";
                    } else {
                      

                        foreach ($results as $result) {
                            echo "<div class='index_images--top'>
                            <div class='index_images'>
                            <div class='index_images--info'>
                            <div class='index_images--info-user'>
                            <div  class='left_user_image_small--container'> <img style='margin-right: 10px;' class='user_img' alt='User profile image' src='dist/images/" . $result["user_img"] ."' / ></div>
                            <p style='margin-left: 10g9tmpx;' >" . $result['username'] . "</p></div>   <div class='index_images--info-tag'> <p class='index_images--tag'> " . $result['tag_name'] . " </p> <p style='padding-left: 10px;'>" . $result['gallery_name'] . "</p></div></div>
                            <img class='middle_index_img' alt='" . $result["img_alt"] . "' src='" . $result["img_path"] . "' / ></div></div>";
                        }
                    }


                    // if ($images === 0) {
                    //     echo "No images were found. Please add one.";
                    // } else {

                    //     foreach ($images as $image) {
                    //         echo "<div class='gallery_images--top'>
                    //         <div class='gallery_images'>
                    //         <div class='gallery_images--info'>
                    //         <p>" . $image['img_alt'] . "</p> <p class='gallery_images--tag'> " . $image['tag_name'] . " </p></div>
                    //         <img class='middle_gallery_img' alt='" . $image["img_alt"] ."' src='" . $image["img_path"] ."' / ></div></div>"; 
                    //     }


                    // }



                    //Only outputting one user?
                    // if ($usernames === 0) {
                    //     echo "No galleries were found. Please add one.";
                    // } else {
                    //     foreach ($usernames as $username) {
                    //       if($result['fk_user_id'] === $username['pk_user_id'] ) {
                    //         echo "
                    //         <div><b>" . $username['username'] . "</b>" .  "</div>";
                    //         }
                    //       }
                    // }

                    ?>
                </div>
            </div>
            <div class="index_container--right"></div>
        </div>

<?php
        parent::footer();
    }
}
