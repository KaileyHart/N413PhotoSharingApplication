<?php 
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: index.class.php
 * Description: The homepage 
*/
//require_once('views/main_view.class.php');

class Index extends MainView {
    function show($results, $usernames) {
       
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
                <div class="gallery">
                    <?php
                    if ($results === 0) {
                        echo "No galleries were found. Please add one.";
                    } else {

                        foreach ($results as $result) {
                            $galleryId = $result['pk_gallery_id'];
                            echo "
                        <div><a href='index.php?action=single_gallery_view&id=$galleryId'>
                         <div class='gallery' data-id='" . $result['pk_gallery_id'] . "' data-item='" . $result['gallery_name'] . "'>
                        <div><b>" . $result['gallery_name'] . "</b> " . $result['fk_user_id'] . "</b> " . $result['pk_gallery_id'] . "</div> </div> </a></div>";
                        }
                    }
                    
                    
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