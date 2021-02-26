<?php 
/*
 * Author: Kailey Hart
 * Date: 02-12-2021
 * Name: index.class.php
 * Description: The homepage 
*/
//require_once('views/main_view.class.php');

class Index extends MainView {
    function show($allGalleries) {
        parent::header();
        
    ?>
    <div><?php echo $allGalleries ?></div>

    <?php
    parent::footer();
    }
}