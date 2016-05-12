<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class Program_controller extends CI_Controller
{
    public $programId = 15;

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
        $data['programs'] = $this->News_model->getNewsByCatId($this->programId);
        $data['title'] = 'Chương trình đào tạo';
        $this->load->view('pages/dm/program/view_all', $data);
    }

    public function create_program()
    {
        $data['tags'] = $this->Tag_model->findAll();
        $data['title'] = 'Thêm chương trình mới';
        $this->load->view('pages/dm/program/add', $data);
    }

    public function create_program_submit()
    {
        $insertId = -1;
        $this->load->library('upload', $this->get_config());
        if ($this->upload->do_upload('userfile')) {
            $upload_files = $this->upload->data();
            $file_path = 'assets/upload/images/news/' . $upload_files['file_name'];
            $this->load->model('News_model');
            $insertId = $this->News_model->insert_full(
                $this->programId,
                $file_path,
                $this->input->post('slug'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $this->input->post('vititle'),
                $this->input->post('vicontent'),
                $this->input->post('visummary')
            );
        }
        else {
            $this->load->model('News_model');
            $insertId = $this->News_model->insert_full(
                $this->programId,
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
        $tags = $this->input->post('tags');
        foreach ($tags as $tag) {
            $this->Tag_model->saveReferenceNews($tag, $insertId);
        }
        redirect('program-manager', 'refresh');
    }

    public function create_program_cancel()
    {
        redirect('program-manager', 'refresh');
    }

    public function update_program()
    {
        $current = $this->News_model->getNewsById($this->uri->segment(3));
        $data['newsId'] = $current['id'];
        $data['slug'] = $current['slug'];
        $data['title_header'] = $current['title_header'];
        $data['description_header'] = $current['description_header'];
        $data['keyword_header'] = $current['keyword_header'];
        $data['vititle'] = $current['title'];
        $data['content'] = $current['content'];
        $data['summary'] = $current['summary'];
        $data['img_src'] = $current['img_src'];

        $data['tags'] = $this->Tag_model->findAll();
        $data['activeTags'] = $this->Tag_model->findByNews($data['newsId']);
        $data['title'] = 'Cập nhật bài viết:<strong>' . $current['title'] . '</strong>';
        $this->load->view('pages/dm/program/edit', $data);
    }

    public function update_program_submit()
    {
        $this->load->library('upload', $this->get_config());
        if ($this->upload->do_upload('userfile')) {
            $upload_files = $this->upload->data();
            $file_path = 'assets/upload/images/news/' . $upload_files['file_name'];

            $this->load->model('News_model');
            $this->News_model->insert_full(
                $this->programId,
                $file_path,
                $this->input->post('slug'),
                $this->input->post('title_header'),
                $this->input->post('description_header'),
                $this->input->post('keyword_header'),
                $this->input->post('vititle'),
                $this->input->post('vicontent'),
                $this->input->post('visummary')
            );
        }
        else {
            $this->load->model('News_model');
            $this->News_model->update_full(
                $this->input->post('newsId'),
                $this->programId,
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

        redirect('program-manager', 'refresh');
    }

    public function update_program_cancel()
    {

        redirect('program-manager', 'refresh');
    }

    public function delete_program()
    {
        $this->News_model->delete($this->uri->segment(3));
        redirect('program-manager', 'refresh');
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
