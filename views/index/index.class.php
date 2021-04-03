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
    function show($results, $tags)
    {

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

                            echo    "<div class='index_images--top'>
                                    <div class='index_images'>
                                        <div class='index_images--info'>
                                            <div class='index_images--info-user'>
                                                <div  class='left_user_image_small--container'> 
                                                <img style='margin-right: 10px;' class='user_img' alt='User profile image' src='" . $result['user_img'] . "' / >
                                                </div>
                                                    <p style='margin-left: 10g9tmpx;' >" . $result['username'] . "</p>
                                            </div>   
                                            <div class='index_images--info-tag'> 
                                                <p class='index_images--tag'> " . $result['tag_name'] . " </p> 
                                                <p style='padding-left: 10px;'>" . $result['gallery_name'] . "</p>
                                            </div>
                                        </div>
                                            <img class='middle_index_img' alt='" . $result['img_alt'] . "' src='" . $result['img_path'] . "' / >
                                    </div>
                                </div>";
                        }
                    }
                    ?>
                </div>
            </div>
            <div style="margin-right: 5%;" class="index_container--right">
                <div class="index_right">
                    <h4>Filter by tag</h4>
                    <div class="index_right__container">
                        <?php
                        $width_large = 4;
                        $row_count = 3;

                        if ($tags === 0) {
                            echo "No images were found. Please add one.";
                        } else {
                            echo '<div class="row">';

                            foreach ($tags as $tag) {
                                $row_count++;
                                echo "<div  class='col-$width_large tags' id=" . $tag['pk_tag_id'] . "> <button ><a href='index.php?action=filter_tag_index&tag_id=" . $tag['pk_tag_id'] . "'>" . $tag['tag_name'] . " </a></button></div>";
                            }
                            echo '</div>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>

<?php
        parent::footer();
    }
}
