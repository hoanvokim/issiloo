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
        if (empty($_SESSION["activeLanguage"])) {
            $_SESSION["activeLanguage"] = "vi";
        }
    }

    public function add_news()
    {
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->findStudyAbroadRoot();
        $categories = array();
        foreach ($data['categories'] as $category) {
            $categories = $this->loadSub($categories, $category, 0);
        }
        $data['categories'] = $categories;

        $data['title'] = 'Viết bài';
        $this->load->view('pages/dm/study/study_news_add', $data);
    }

    public function add_news_into_category()
    {
        $this->load->model('News_model');
        $this->load->model('Category_model');
        $data['categories'] = $this->Category_model->findStudyAbroadRoot();
        $categories = array();
        foreach ($data['categories'] as $category) {
            $categories = $this->loadSub($categories, $category, $this->uri->segment(3));
        }
        $data['categories'] = $categories;

        $current_news_list = $this->News_model->getNewsByCatId($this->uri->segment(3));
        if (count($current_news_list > 0)) {
            foreach ($current_news_list as $current) {
                $data['newsId'] = $current['id'];
                $data['slug'] = $current['slug'];
                $data['title_header'] = $current['title_header'];
                $data['description_header'] = $current['description_header'];
                $data['keyword_header'] = $current['keyword_header'];
                $data['vititle'] = $current['title'];
                $data['content'] = $current['content'];
                $data['summary'] = $current['summary'];
                $data['img_src'] = $current['img_src'];
            }
        } else {
            $data['newsId'] = '';
            $data['slug'] = '';
            $data['title_header'] = '';
            $data['description_header'] = '';
            $data['keyword_header'] = '';
            $data['vititle'] = '';
            $data['content'] = '';
            $data['summary'] = '';
            $data['img_src'] = '';
        }
        $data['currentCategory'] = $this->uri->segment(3);
        $data['title'] = 'Viết bài';
        $this->load->view('pages/dm/study/study_news_add_into_category', $data);
    }

    public function loadSub($categories, $currentCategory, $id)
    {
        $subCategories = $this->Category_model->findByParent($currentCategory['id']);
        if (count($subCategories) > 0) {
            foreach ($subCategories as $category) {
                $this->load->model('News_model');
                if (strcasecmp($id, $category['id']) == 0 || count($this->News_model->getNewsByCatId($category['id'])) == 0) {
                    array_push($categories, array(
                        'id' => $category['id'],
                        'vi_name' => $category['vi_name'],
                        'parent_id' => $currentCategory['vi_name'],
                        'updated_date' => $category['updated_date'],
                        'created_date' => $category['created_date'],
                        'can_be_deleted' => FALSE,
                    ));
                }
                $categories = $this->loadSub($categories, $category, $id);
            }
        }
        return $categories;
    }

    public function add_news_add()
    {
        $this->load->library('upload', $this->get_config());
        if ($this->upload->do_upload('userfile')) {
            $upload_files = $this->upload->data();
            $file_path = 'assets/upload/images/' . $upload_files['file_name'];

            $this->load->model('News_model');
            $this->News_model->insert_full(
                $this->input->post('catId'),
                $file_path,
                $this->input->post('slug'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $this->input->post('vititle'),
                $this->input->post('vicontent'),
                $this->input->post('visummary')
            );
        } else {
            $this->load->model('News_model');
            $this->News_model->insert_full(
                $this->input->post('catId'),
                $this->input->post('img_src'),
                $this->input->post('slug'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $this->input->post('vititle'),
                $this->input->post('vicontent'),
                $this->input->post('visummary')
            );
        }

        redirect('manage-study-category', 'refresh');
    }

    public function add_news_into_category_add()
    {
        $this->load->library('upload', $this->get_config());
        if ($this->upload->do_upload('userfile')) {
            $upload_files = $this->upload->data();
            $file_path = 'assets/upload/images/' . $upload_files['file_name'];

            $this->load->model('News_model');
            $this->News_model->insert_full(
                $this->input->post('catId'),
                $file_path,
                $this->input->post('slug'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $this->input->post('vititle'),
                $this->input->post('vicontent'),
                $this->input->post('visummary')
            );
        } else {
            $this->load->model('News_model');
            $this->News_model->update_full(
                $this->input->post('newsId'),
                $this->input->post('catId'),
                $this->input->post('img_src'),
                $this->input->post('slug'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $this->input->post('vititle'),
                $this->input->post('vicontent'),
                $this->input->post('visummary')
            );
        }

        redirect('manage-study-category', 'refresh');
    }


    public function add_news_cancel()
    {
        redirect('admin', 'refresh');
    }

    private function get_config()
    {
        return array(
            'upload_path' => "./assets/upload/images/news",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );

    }
}