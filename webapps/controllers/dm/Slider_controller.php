<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 5/13/16
 * Time: 6:25 AM
 */
class Slider_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION["activeLanguage"])) {
            $_SESSION["activeLanguage"] = "vi";
        }
        $this->load->model('Slider_model');
    }

    public function index()
    {
        $data['sliders'] = $this->Slider_model->getAll();
        $data['title'] = 'Sliders';
        $this->load->view('pages/dm/slider/view_all', $data);
    }

    public function create_slider()
    {
        $data['title'] = 'Thêm slider mới';
        $this->load->view('pages/dm/slider/add', $data);
    }

    public function create_slider_submit()
    {
        if (isset($_POST["save"])) {

            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('userfile')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/upload/images/slider/' . $upload_files['file_name'];

                $this->Slider_model->insert(
                    $file_path,
                    $this->input->post('url'),
                    $this->input->post('vi_content')
                );
            }
        }
        if (isset($_POST["cancel"])) {
        }
        redirect('slider-manager', 'refresh');
    }

    public function update_slider()
    {
        $current = $this->Slider_model->findById($this->uri->segment(3));
        $data['id'] = $current['id'];
        $data['img_src'] = $current['img_src'];
        if (strlen($data['img_src']) > 0) {
            $data['hasImg'] = 1;
        }else {
            $data['hasImg'] = 0;
        }
        $data['url'] = $current['url'];
        $data['vi_content'] = $current['vi_content'];

        $data['title'] = 'Cập nhật slider';
        $this->load->view('pages/dm/slider/edit', $data);
    }

    public function update_slider_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config());
            if ($this->upload->do_upload('userfile')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/upload/images/slider/' . $upload_files['file_name'];

                $this->Slider_model->update(
                    $this->input->post('id'),
                    $file_path,
                    $this->input->post('url'),
                    $this->input->post('vi_content')
                );
            } else {
                $this->Slider_model->update(
                    $this->input->post('id'),
                    $this->input->post('img_src'),
                    $this->input->post('url'),
                    $this->input->post('vi_content')
                );
            }

        }
        if (isset($_POST["delete"])) {
            $this->Slider_model->delete($this->uri->segment(3));
        }
        if (isset($_POST["cancel"])) {
        }

        if (isset($_POST["delete-img"])) {
            unlink('./assets/upload/images/slider/12.jpg');
            $this->Slider_model->update(
                $this->input->post('id'),
                '',
                $this->input->post('url'),
                $this->input->post('vi_content')
            );
            $data['hasImg'] = 0;
        }
        redirect('slider-manager', 'refresh');
    }

    public function delete_slider()
    {
        $this->Slider_model->delete($this->uri->segment(3));
        redirect('slider-manager', 'refresh');
    }

    private function get_config()
    {
        return array(
            'upload_path' => "./assets/upload/images/slider",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
    }
}
