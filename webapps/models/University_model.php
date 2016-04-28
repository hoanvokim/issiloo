<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */

class University_Model extends CI_Model
{
    public $title = "vi_title";
    public $description = "vi_description";

    public function __construct(){
        $this->title = $_SESSION["activeLanguage"] == "vi" ? "vi_title" : "en_title";
        $this->description = $_SESSION["activeLanguage"] == "vi" ? "vi_description" : "en_description";
    }
     public function getAll(){
         $title = $this->title;
         $description = $this->description;
         $sql = "select id as university_id, $title as title, $description as description, url from university";
         return $this->db->query($sql)->result_array();
     }
}
