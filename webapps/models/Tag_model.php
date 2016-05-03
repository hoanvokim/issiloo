<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */

class Tag_Model extends CI_Model
{
    public function getTagByNewsId($news_id){
        $sql = "select tag.id as tag_id, tag.name as tag_name from tag, tagnews where tagnews.news_id = $news_id and tagnews.tag_id = tag.id";
        return $this->db->query($sql)->result_array();
    }
}
