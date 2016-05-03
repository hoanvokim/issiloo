<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class Study_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION["activeLanguage"])) {
            $_SESSION["activeLanguage"] = "vi";
        }


    }

    public function view_all()
    {
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->findStudyAbroadRoot();
        $categories = array();
        $can_be_deleted = TRUE;
        foreach ($data['categories'] as $category) {
            if ($this->Category_model->findByParent($category['id'])) {
                $can_be_deleted = FALSE;
            };
            array_push($categories, array(
                'id' => $category['id'],
                'vi_name' => $category['vi_name'],
                'parent_id' => $category['parent_id'],
                'updated_date' => $category['updated_date'],
                'created_date' => $category['created_date'],
                'can_be_deleted' => $can_be_deleted,
            ));
            $categories = $this->loadSub($categories, $category);
        }
        $data['categories'] = $categories;
        $data['title'] = 'Xem tất cả Category';
        $this->load->view('pages/dm/study_view_all', $data);
    }

    public function loadSub($categories, $currentCategory)
    {
        $subCategories = $this->Category_model->findByParent($currentCategory['id']);
        if(count($subCategories) > 0) {
            foreach ($subCategories as $category) {
                array_push($categories, array(
                    'id' => $category['id'],
                    'vi_name' => $category['vi_name'],
                    'parent_id' => $currentCategory['vi_name'],
                    'updated_date' => $category['updated_date'],
                    'created_date' => $category['created_date'],
                    'can_be_deleted' => FALSE,
                ));
                $categories = $this->loadSub($categories, $category);
            }
        }
        return $categories;
    }
}