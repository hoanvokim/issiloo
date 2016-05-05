<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class News_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_news()
    {
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->findStudyAbroadRoot();
        $categories = array();
        foreach ($data['categories'] as $category) {
            array_push($categories, array(
                'id' => $category['id'],
                'vi_name' => $category['vi_name']
            ));
            $categories = $this->loadSub($categories, $category);
        }
        $data['categories'] = $categories;

        $data['title'] = 'Viết bài';
        $this->load->view('pages/dm/study_news_add', $data);
    }

    public function add_news_into_category()
    {
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->findStudyAbroadRoot();
        $categories = array();
        foreach ($data['categories'] as $category) {
            array_push($categories, array(
                'id' => $category['id'],
                'vi_name' => $category['vi_name']
            ));
            $categories = $this->loadSub($categories, $category);
        }
        $data['categories'] = $categories;
        
        $data['title'] = 'Viết bài';
        $this->load->view('pages/dm/study_news_add_into_category', $data);
    }

    public function loadSub($categories, $currentCategory)
    {
        $subCategories = $this->Category_model->findByParent($currentCategory['id']);
        if (count($subCategories) > 0) {
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