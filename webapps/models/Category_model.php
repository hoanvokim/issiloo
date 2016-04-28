<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */

class Category_Model extends CI_Model
{
     public $name_field = "vi_name";

     public function __construct(){
         $this->name_field = $_SESSION["activeLanguage"] == "vi" ? "vi_name" : "en_name";
     }

    public function getMainMenu($parent_id=null,&$strMenu){
        $temp_name = $this->name_field;
        $sql = "select id,parent_id,slug,$temp_name from category where is_menu=1 and ";
        if($parent_id == null){
           $sql = $sql."parent_id is null ";
        }else{
            $sql = $sql."parent_id = $parent_id ";
        }
        $sql = $sql."order by parent_id, sort_index";
        $arr_result = $this->db->query($sql)->result_array();
        if(count($arr_result)>0){

            foreach($arr_result as $item){
                $url = base_url().$item['slug'];
                $strMenu = $strMenu . "<li><a href='$url'>".$item[$temp_name];
                if($this->hasSubMenu($item['id'])){
                    $strMenu = $strMenu . '<span class="ion ion-ios-arrow-down"></span>';
                }
                $strMenu = $strMenu . "</a>";
                if($item['id'] == null){
                    ;
                }elseif($this->isDropMenu($item['id'])){
                    $strMenu = $strMenu . '<ul class="dropmenu">';
                }else{
                    $strMenu = $strMenu . '<ul class="submenu">';
                }
                $this->getMainMenu($item['id'],$strMenu);

                if(!($item['id'] == null)){
                    $strMenu = $strMenu . "</li></ul>";
                }else{
                    $strMenu = $strMenu . "</li>";
                }
            }
        }
    }

    public function getParentId($id){
        $sql = "select parent_id from category where is_menu = 1 and id = $id";
        $result = $this->db->query($sql)->result_array();
        if(count($result)>0){
            foreach($result as $item){
                return $item['parent_id'];
            }
        }
        return false;
    }

    private function isDropMenu($id){
        $parent_id = $this->getParentId($id);
        if($parent_id == null){
             return true;
        }
        return false;
    }

    private function hasSubMenu($id){
        $sql = "select * from category where is_menu = 1 and parent_id = $id";
        $result = $this->db->query($sql)->result_array();
        if(count($result)>0){
            return true;
        }
        return false;
    }
}
