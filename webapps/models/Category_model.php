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

    public function getMainMenu($parent_id=null){
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
            echo "<ul>";
            foreach($arr_result as $item){
                echo "<li>".$item[$temp_name]."</li>";
                $this->getMainMenu($item['id']);
            }
            echo "</ul>";
        }
    }
}
