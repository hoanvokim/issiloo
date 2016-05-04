<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */
class Category_Model extends CI_Model
{
    public $name_field = "vi_name";

//    Fundamental functions

    public function __construct()
    {
        $this->name_field = $_SESSION["activeLanguage"] == "vi" ? "vi_name" : "en_name";
    }

    public function findAll()
    {
        return $this->db->get("category")->result_array();
    }

    public function findByParent($parent)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('parent_id =', $parent);
        return $this->db->get()->result_array();
    }

    public function findById($catId)
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id =', $catId);
        return $this->db->get()->result_array();
    }

    public function insert($vi_name)
    {
        $children = $this->findByParent(1);
        $sortIndex = sizeof($children);
        $data = array(
            'vi_name' => $vi_name,
            'parent_id' => 1,
            'sort_index' => $sortIndex
        );

        $this->db->insert('category', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function insertWithParent($vi_name, $parentId)
    {
        $children = $this->findByParent($parentId);
        $sortIndex = sizeof($children);
        $data = array(
            'vi_name' => $vi_name,
            'parent_id' => $parentId,
            'sort_index' => $sortIndex,
            'is_menu' => 1
        );

        $this->db->insert('category', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($catId, $vi_name)
    {
        $data = array(
            'vi_name' => $vi_name
        );
        $this->db->where('id', $catId);
        $this->db->update('category', $data);
    }

    public function updateWithParent($catId, $vi_name)
    {
        $data = array(
            'vi_name' => $vi_name
        );
        $this->db->where('id', $catId);
        $this->db->update('category', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('category');
    }

//    Utilities

    public function findStudyAbroadRoot()
    {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('id = 10');
        return $this->db->get()->result_array();
    }

    public function getMainMenu($parent_id = null, &$strMenu)
    {
        $temp_name = $this->name_field;
        $sql = "select id,parent_id,slug,$temp_name from category where is_menu=1 and ";
        if ($parent_id == null) {
            $sql = $sql . "parent_id is null ";
        } else {
            $sql = $sql . "parent_id = $parent_id ";
        }
        $sql = $sql . "order by parent_id, sort_index";
        $arr_result = $this->db->query($sql)->result_array();
        if (count($arr_result) > 0) {

            foreach ($arr_result as $item) {
                $url = base_url() . "cat/" . $item['slug'];
                $strMenu = $strMenu . "<li><a href='$url'>" . $item[$temp_name];
                if ($this->hasSubMenu($item['id'])) {
                    $strMenu = $strMenu . '<span class="ion ion-ios-arrow-down"></span>';
                }
                $strMenu = $strMenu . "</a>";
                if ($item['id'] == null) {
                    ;
                } elseif ($this->isDropMenu($item['id'])) {
                    $strMenu = $strMenu . '<ul class="dropmenu">';
                } else {
                    $strMenu = $strMenu . '<ul class="submenu">';
                }
                $this->getMainMenu($item['id'], $strMenu);

                if (!($item['id'] == null)) {
                    $strMenu = $strMenu . "</li></ul>";
                } else {
                    $strMenu = $strMenu . "</li>";
                }
            }
        }
    }

    public function getAllSubMenu($parent_id, &$aMenu)
    {
        $sql = "select id from category where is_menu=1 and parent_id = $parent_id";
        $arr_result = $this->db->query($sql)->result_array();
        if (count($arr_result) > 0) {
            foreach ($arr_result as $item) {
                $aMenu[] = $item['id'];
                $this->getAllSubMenu($item['id'], $aMenu);
            }
        }
    }

    public function getDirectSubMenu($parent_id, &$aMenu)
    {
        $sql = "select id from category where is_menu=1 and parent_id = $parent_id";
        $arr_result = $this->db->query($sql)->result_array();
        if (count($arr_result) > 0) {
            foreach ($arr_result as $item) {
                $aMenu[] = $item['id'];
            }
        }
    }


    public function getParentId($id)
    {
        $sql = "select parent_id from category where is_menu = 1 and id = $id";
        $result = $this->db->query($sql)->result_array();
        if (count($result) > 0) {
            foreach ($result as $item) {
                return $item['parent_id'];
            }
        }
        return false;
    }

    private function isDropMenu($id)
    {
        $parent_id = $this->getParentId($id);
        if ($parent_id == null) {
            return true;
        }
        return false;
    }

    private function hasSubMenu($id)
    {
        $sql = "select * from category where is_menu = 1 and parent_id = $id";
        $result = $this->db->query($sql)->result_array();
        if (count($result) > 0) {
            return true;
        }
        return false;
    }

    public function getName($id)
    {
        $temp = $this->name_field;
        $sql = "select $temp from category where id=$id";
        $row = $this->db->query($sql)->row();
        return $row->$temp;
    }

    public function getIdFromSlug($slug)
    {
        $sql = "select id from category where is_menu=1 and slug='$slug' limit 0,1";
        $result = $this->db->query($sql)->result_array();
        return $result[0]['id'];
    }
}
