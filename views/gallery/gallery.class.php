<?php

/*
 * Author: Kailey Hart
 * Date: 03-01-2021
 * Name: single_gallery_view.class.php
 * Description: Gallery class
*/

class Gallery {

    //private data members
    private $fk_user_id, $pk_gallery_id, $gallery_name;

    //the constructor
    public function __construct($fk_user_id, $pk_gallery_id, $gallery_name) {
        $this->pk_gallery_id = $pk_gallery_id;
        $this->fk_user_id = $fk_user_id;
        $this->gallery_name = $gallery_name;
     
    }
	
	//getters
    public function getUserId() {
        return $this->fk_user_id;
    }

    public function getGalleryId() {
        return $this->pk_gallery_id;
    }


    public function setGalleryId($pk_gallery_id) {
        $this->pk_gallery_id = $pk_gallery_id;
    }

}