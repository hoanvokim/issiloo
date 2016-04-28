<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */

class News_Model extends CI_Model
{

    public $title = "vi_title";
    public $content = "vi_content";

    public function __construct(){
        $this->title = $_SESSION["activeLanguage"] == "vi" ? "vi_title" : "en_title";
        $this->content = $_SESSION["activeLanguage"] == "vi" ? "vi_content" : "en_content";
    }

     public function getNewsByCatId($catId){
         $sql = "select * from news where category_id = $catId";
         return $this->db->query($sql)->result_array();
     }

     public function getLastNews(){
         $sql = "select img_src,$this->title as title, $this->content as content, created_date from news order by created_date desc limit 0,4";
         return $this->db->query($sql)->result_array();
     }
}
