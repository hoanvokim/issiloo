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
    public $summary = "vi_summary";

    public function __construct(){
        $this->title = $_SESSION["activeLanguage"] == "vi" ? "vi_title" : "en_title";
        $this->content = $_SESSION["activeLanguage"] == "vi" ? "vi_content" : "en_content";
        $this->summary = $_SESSION["activeLanguage"] == "vi" ? "vi_summary" : "en_summary";
        $this->load->model("Category_model");
    }

    public function getIdFromSlug($slug){
        $sql = "select id from news where slug='$slug' limit 0,1";
        $result = $this->db->query($sql)->result_array();
        return $result[0]['id'];
    }

    public function getNewsById($id){
        $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary from news where id = $id";
        $result = $this->db->query($sql)->result_array();
        return $result[0];
    }

     public function getNewsByCatId($catId){
         $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary from news where category_id = $catId";
         return $this->db->query($sql)->result_array();
     }

     public function getLastNews(){
         $sql = "select img_src,$this->title as title, $this->summary as summary, created_date from news order by created_date desc limit 0,4";
         return $this->db->query($sql)->result_array();
     }

     public function getNewsByCatCollection($aCat){
         $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary from news where category_id in (";
         $cnt = count($aCat);
         for($i=0;$i<$cnt-1;$i++){
            $sql = $sql . $aCat[$i] . ",";
         }
         $sql = $sql . $aCat[$cnt-1] . ")";
         return $this->db->query($sql)->result_array();
     }

     public function getRelatedNewsByCatId($category_id){
         $arr = array();
         $cnt = 0;
         $aSubMenu = array();
         $this->Category_model->getDirectSubMenu($category_id,$aSubMenu);
         foreach($aSubMenu as $item){
             if(count($this->getNewsByCatId($item))==0){
                 continue;
             }
             $arr[$cnt]['cat_name'] = $this->Category_model->getName($item);
             $arr[$cnt]['related_news'] = $this->getNewsByCatId($item);
             $cnt++;
         }
         return $arr;
     }

    public function getRelatedNewsById($news_id){
        $sql = "select category_id from news where id=$news_id";
        $result = $this->db->query($sql)->result_array();
        $category_id = $result[0]['category_id'];

        $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary ";
        $sql = $sql . "from news where category_id = $category_id and id <> $news_id limit 0,3";
        return $this->db->query($sql)->result_array();
    }
}
