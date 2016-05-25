<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_controller extends CI_Controller{

    public function summernote_image_upload(){

        echo 'hehe haha';
        return;
        if ($_FILES['image']['name']) {
            if (!$_FILES['image']['error']) {
                $ext = explode('.', $_FILES['image']['name']);
                $filename = underscore($ext[0]) . '.' . $ext[1];
                $destination = base_url() . 'assets/upload/images/news/' . $filename; //change path of the folder...
                $location = $_FILES["image"]["tmp_name"];
                move_uploaded_file($location, $destination);
                echo base_url() . 'assets/upload/images/news/' . $filename;
            } else {
                echo $message = 'The following error occured:  ' . $_FILES['image']['error'];
            }
        }

    }

}