<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */
class Gallery_Model extends CI_Model
{
    public function getGalleryByUniverity($uniId)
    {
        $sql = "select gallery.id, img_src, vi_title from universityimages, gallery where universityimages.university_id = $uniId and gallery.id = universityimages.image_id";
        return $this->db->query($sql)->result_array();
    }

    public function getGalleryById($id)
    {
        $sql = "select gallery.id, img_src, vi_title from gallery where gallery.id = $id";
        return $this->db->query($sql)->result_array()[0];
    }

    public function getGalleryByNews()
    {
        $temp = $_SESSION["activeLanguage"] == "vi" ? "vi_title" : "en_title";
        $sql = "select img_src,$temp as title from newsgallery, gallery where newsgallery.images_id=gallery.id limit 0,10";
        return $this->db->query($sql)->result_array();
    }

    public function getGalleryByNewsId($news_id)
    {
        $sql = "select gallery.* from newsgallery, gallery where news_id=$news_id and images_id = gallery.id";
        return $this->db->query($sql)->result_array();
    }

    public function insertUniversityImage($filename, $id)
    {
        if (count($filename) > 0) {
            foreach ($filename as $file) {
                $data = array(
                    'img_src' => 'assets/upload/images/university/' . $file,
                    'type' => 'university',
                    'vi_title' => $file
                );
                $this->db->insert('gallery', $data);
                $insert_id = $this->db->insert_id();
                $data = array(
                    'university_id' => $id,
                    'image_id' => $insert_id
                );
                $this->db->insert('universityimages', $data);
            }
        }
    }

    public function insertNewsImage($filename, $id)
    {
        if (count($filename) > 0) {
            foreach ($filename as $file) {
                $data = array(
                    'img_src' => 'assets/upload/images/sharing/' . $file,
                    'type' => 'sharing',
                    'vi_title' => $file
                );
                $this->db->insert('gallery', $data);
                $insert_id = $this->db->insert_id();
                $data = array(
                    'news_id' => $id,
                    'images_id' => $insert_id
                );
                $this->db->insert('newsgallery', $data);
            }
        }
    }

    public function deleteList($images)
    {
        $sql = "delete from gallery where id in (";
        foreach ($images as $value) {
            $sql = $sql . $value . ",";
        }
        $sql = substr($sql, 0, -1);
        $sql = $sql . ")";
        return $this->db->query($sql);
    }

    public function deleteImagesByNewsID($newsId)
    {
        $list = $this->getGalleryByNewsId($newsId);
        if (count($list) > 0) {
            $sql1 = "delete from gallery where id in (";
            foreach ($list as $item) {
                $sql1 = $sql1 . $item['id'] . ",";
            }
            $sql1 = substr($sql1, 0, -1);
            $sql1 = $sql1 . ")";
            return $this->db->query($sql1);
        }
    }
    public function deleteImagesByUniversityID($uniId)
    {
        $list = $this->getGalleryByUniverity($uniId);
        if (count($list) > 0) {
            $sql1 = "delete from gallery where id in (";
            foreach ($list as $item) {
                $sql1 = $sql1 . $item['id'] . ",";
            }
            $sql1 = substr($sql1, 0, -1);
            $sql1 = $sql1 . ")";
            return $this->db->query($sql1);
        }
    }
}
