<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

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

    public function __construct()
    {
        $this->title = $_SESSION["activeLanguage"] == "vi" ? "vi_title" : "en_title";
        $this->description = $_SESSION["activeLanguage"] == "vi" ? "vi_description" : "en_description";
    }

    public function getAll()
    {
        $title = $this->title;
        $description = $this->description;
        $sql = "select id as university_id, $title as title, $description as description, url from university order by university_id desc";
        return $this->db->query($sql)->result_array();
    }

    public function getById($uniId)
    {
        $title = $this->title;
        $description = $this->description;
        $sql = "select id as university_id, $title as title, $description as description, url from university where id = $uniId";
        $list = $this->db->query($sql)->result_array();
        if(count($list > 0)) {
	        foreach ($list as $item) {
		     return $item;
		}
	}
        return -1;
    }

    public function insert($uniTitle, $uniDes, $url)
    {
        $data = array(
            'vi_title' => $uniTitle,
            'vi_description' => $uniDes,
            'url' => $url
        );

        $this->db->insert('university', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($uniId, $uniTitle, $uniDes, $url)
    {
        $data = array(
            'vi_title' => $uniTitle,
            'vi_description' => $uniDes,
            'url' => $url
        );
        $this->db->where('id', $uniId);
        $this->db->update('university', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('university');
    }

}