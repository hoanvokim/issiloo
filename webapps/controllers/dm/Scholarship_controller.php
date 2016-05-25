<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class Scholarship_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION["activeLanguage"])) {
            $_SESSION["activeLanguage"] = "vi";
        }
        $this->load->model('News_model');
        $this->load->model('Tag_model');
    }

    public function index()
    {
        $data['programs'] = $this->News_model->getNewsByCatId($this->config->item('hoc_bong'));
        $data['title'] = 'Học Bổng';
        $this->load->view('pages/dm/scholarship/view_all', $data);
    }

    public function create_scholarship()
    {
        $data['title'] = 'Thêm thời bài học bổng mới';
        $data['tags'] = $this->Tag_model->findAll();
        $this->load->view('pages/dm/scholarship/add', $data);
    }

    public function create_scholarship_submit()
    {
        if (isset($_POST["save"])) {
            $insertId = -1;
            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('userfile')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/upload/images/news/' . $upload_files['file_name'];
                $insertId = $this->News_model->insert_full(
                    $this->config->item('hoc_bong'),
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
                $insertId = $this->News_model->insert_full(
                    $this->config->item('hoc_bong'),
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

            if($insertId !== -1){
                $news_update_record = $this->News_model->getNewsById($insertId);
                $content = $news_update_record['content'];
                $save_path = 'assets/upload/images/news/';
                $updated_content = saveImgAndUpdateContent($save_path,$content);
                if(strlen($updated_content) > 0){
                    $this->News_model->update_content($insertId,'vi_content',$updated_content);
                }
            }

            $tags = $this->input->post('tags');
            if (count($tags) > 0) {
                foreach ($tags as $tag) {
                    $this->Tag_model->saveReferenceNews($tag, $insertId);
                }
            }
        }
        if (isset($_POST["cancel"])) {
        }
        redirect('scholarship-manager', 'refresh');
    }

    public function update_scholarship()
    {
        $current = $this->News_model->getNewsById($this->uri->segment(3));
        $data['newsId'] = $current['id'];
        $data['slug'] = $current['slug'];
        $data['title_header'] = $current['title_header'];
        $data['description_header'] = $current['description_header'];
        $data['keyword_header'] = $current['keyword_header'];
        $data['vititle'] = $current['title'];
        $data['vicontent'] = $current['content'];
        $data['visummary'] = $current['summary'];
        $data['img_src'] = $current['img_src'];

        $data['title'] = 'Cập nhật bài viết:<strong>' . $current['title'] . '</strong>';
        $this->load->view('pages/dm/scholarship/edit', $data);
    }

    public function update_scholarship_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('userfile')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/upload/images/news/' . $upload_files['file_name'];

                $this->News_model->insert_full(
                    $this->config->item('hoc_bong'),
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
                $this->News_model->update_full(
                    $this->input->post('newsId'),
                    $this->config->item('hoc_bong'),
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

            $news_id = $this->input->post('newsId');
            $news_update_record = $this->News_model->getNewsById($news_id);
            $content = $news_update_record['content'];
            $save_path = 'assets/upload/images/news/';
            $updated_content = saveImgAndUpdateContent($save_path,$content);
            if(strlen($updated_content) > 0){
                $this->News_model->update_content($news_id,'vi_content',$updated_content);
            }

            redirect('scholarship-manager', 'refresh');
        }
        if (isset($_POST["remove-current"])) {
            $this->News_model->updateImage($this->input->post('newsId'));
            if (strpos($this->input->post('img_src'), 'youtube') == false) {
                unlink('./' . $this->input->post('img_src'));
            }
            $data['newsId'] = $this->input->post('newsId');
            $data['img_src'] = '';
            $data['slug'] = $this->input->post('slug');
            $data['title_header'] = $this->input->post('title_header');
            $data['description_header'] = $this->input->post('description_header');
            $data['keyword_header'] = $this->input->post('keyword_header');
            $data['vititle'] = $this->input->post('vititle');
            $data['vicontent'] = $this->input->post('vicontent');
            $data['visummary'] = $this->input->post('visummary');
            $data['title'] = 'Cập nhật bài viết:<strong>' . $this->input->post('vititle') . '</strong>';
            $this->load->view('pages/dm/scholarship/edit', $data);

        }
        if (isset($_POST["cancel"])) {
            redirect('scholarship-manager', 'refresh');
        }
        if (isset($_POST["delete"])) {
            $news = $this->News_model->getNewsById($this->input->post('newsId'));
            if (!is_null($news['img_src'])) {
                unlink('./' . $news['img_src']);
            }
            $this->News_model->delete($this->input->post('newsId'));
            redirect('scholarship-manager', 'refresh');
        }
    }

    public function update_scholarship_cancel()
    {
        redirect('scholarship-manager', 'refresh');
    }

    public function delete_scholarship()
    {
        $news = $this->News_model->getNewsById($this->uri->segment(3));
        if (!is_null($news['img_src'])) {
            unlink('./' . $news['img_src']);
        }
        $this->News_model->delete($this->uri->segment(3));
        redirect('scholarship-manager', 'refresh');
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
