<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */

class Gallery_Model extends CI_Model
{
     public function getGalleryByUniverity($uniId){
         $sql = "select img_src from universityimages, gallery where universityimages.university_id = $uniId and gallery.id = universityimages.image_id";
         return $this->db->query($sql)->result_array();
     }

     public function getGalleryByNews(){
         $temp = $_SESSION["activeLanguage"] == "vi" ? "vi_title" : "en_title";
         $sql = "select img_src,$temp as title from newsgallery, gallery where newsgallery.images_id=gallery.id limit 0,10";
         return $this->db->query($sql)->result_array();
     }

     public function getGalleryByNewsId($news_id){
         $sql = "select gallery.* from newsgallery, gallery where news_id=$news_id and images_id = gallery.id";
         return $this->db->query($sql)->result_array();
     }
}
