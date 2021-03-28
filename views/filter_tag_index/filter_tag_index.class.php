<?php
/*
 * Author: Kailey Hart
 * Date: 03-28-2021
 * Name: filter_tag_index.class.php
 * Description: Filter images by tag on the index page
*/

class FilterTagIndex extends MainView
{
    function show($results, $tags, $filteredResults)
    {
        parent::header();

?>

        <div class="index_container">
            <div class="index_container--left"></div>
            <div class="index_container--center">
                <h2>Public Feed</h2>
                <div class="index">
                    <?php
                
                        foreach ($filteredResults as $filteredResult) {
                       
                            echo "<div class='index_images--top'>
                            <div class='index_images'>
                            <div class='index_images--info'>
                            <div class='index_images--info-user'>
                            <div  class='left_user_image_small--container'> <img style='margin-right: 10px;' class='user_img' alt='User profile image' src='" . $filteredResult['user_img'] . "' / ></div>
                            <p style='margin-left: 10g9tmpx;' >" . $filteredResult['username'] . "</p></div>   <div id='" . $_GET['tag_id'] . "'  class='index_images--info-tag'> <p class='index_images--tag'> " . $filteredResult['tag_name'] . " </p> <p style='padding-left: 10px;'>" . $filteredResult['gallery_name'] . "</p></div></div>
                            <img class='middle_index_img' alt='" . $filteredResult['img_alt'] . "' src='" . $filteredResult['img_path'] . "' / ></div></div>";
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
                            echo "<div class='tags_all'> <button ><a href='index.php'>all</a></button> </div>";

                            foreach ($tags as $tag) {
                                $row_count++;
                                
                                echo "<div  class='col-$width_large tags' id=" . $tag['pk_tag_id'] . "> 
                              
                                    <button >
                                        <a href='index.php?action=filter_tag_index&tag_id=" . $tag['pk_tag_id'] . "'>" . $tag['tag_name'] . " </a>
                                    </button>
                                </div>";
                            }
                            echo '</div>';
                        }
                        ?>

                    </div>
                </div>
            </div>
            <script></script>
        </div>


<?php
        parent::footer();
    }
}
?>