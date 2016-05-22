<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 5/13/16
 * Time: 6:25 AM
 */
class Gallery_corner_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION["activeLanguage"])) {
            $_SESSION["activeLanguage"] = "vi";
        }
        $this->load->model('Gallery_model');
    }

    public function index()
    {
        $data['galleries'] = $this->Gallery_model->getGalleryByType('corner',0,10);
        $data['title'] = 'Chia sẽ ảnh và video';
        $this->load->view('pages/dm/gallery/view_all', $data);
    }

    public function create_gallery()
    {
        $data['title'] = 'Thêm 1 ảnh mới';
        $this->load->view('pages/dm/gallery/add', $data);
    }

    public function create_gallery_submit()
    {
        if (isset($_POST["save"])) {

            $this->load->library('upload', $this->get_config('candidate'));
            if ($this->upload->do_upload('userfile')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/upload/images/candidate/' . $upload_files['file_name'];

                $this->Gallery_model->insert(
                    $file_path,
                    'corner',
                    $this->input->post('vi_title')
                );
            }
        }
        if (isset($_POST["cancel"])) {
        }
        redirect('gallery-corner-manager', 'refresh');
    }

    public function update_gallery()
    {
        $current = $this->Gallery_model->getGalleryById($this->uri->segment(3));
        $data['id'] = $current['id'];
        $data['img_src'] = $current['img_src'];
        if (strlen($data['img_src']) > 0) {
            $data['hasImg'] = 1;
        } else {
            $data['hasImg'] = 0;
        }
        $data['vi_title'] = $current['vi_title'];

        $data['title'] = 'Cập nhật ảnh';
        $this->load->view('pages/dm/gallery/edit', $data);
    }

    public function update_gallery_submit()
    {
        if (isset($_POST["save"])) {
            $this->load->library('upload', $this->get_config('candidate'));
            if ($this->upload->do_upload('userfile')) {
                $upload_files = $this->upload->data();
                $file_path = 'assets/upload/images/candidate/' . $upload_files['file_name'];

                $this->Gallery_model->update(
                    $this->input->post('id'),
                    $file_path,
                    $this->input->post('vi_title')
                );
            } else {
                $this->Gallery_model->update(
                    $this->input->post('id'),
                    $this->input->post('img_src'),
                    $this->input->post('vi_title')
                );
            }
            redirect('gallery-corner-manager', 'refresh');

        }
        if (isset($_POST["delete"])) {
            $gallery = $this->Gallery_model->getGalleryById($this->input->post('id'));
            if (strlen($gallery['img_src']) > 0) {
                unlink('./' . $gallery['img_src']);
            }
            $this->Gallery_model->delete($this->uri->segment(3));
            redirect('gallery-corner-manager', 'refresh');
        }
        if (isset($_POST["cancel"])) {
            redirect('gallery-corner-manager', 'refresh');
        }

        if (isset($_POST["delete-img"])) {
            $gallery = $this->Gallery_model->getGalleryById($this->input->post('id'));
            if(!is_null($gallery['img_src'])) {
                unlink('./' . $gallery['img_src']);
            }
            $this->Gallery_model->update(
                $this->input->post('id'),
                '',
                $this->input->post('vi_title')
            );

            $data['id'] = $this->input->post('id');
            $data['img_src'] = $this->input->post('img_src');
            $data['vi_title'] = $this->input->post('vi_title');
            $data['hasImg'] = 0;
            $data['title'] = 'Cập nhật ảnh chia sẽ';
            $this->load->view('pages/dm/gallery/edit', $data);
        }
    }

    public function delete_gallery()
    {
        $gallery = $this->Gallery_model->getGalleryById($this->uri->segment(3));
        if (strlen($gallery['img_src']) > 0) {
            unlink('./' . $gallery['img_src']);
        }
        $this->Gallery_model->delete($this->uri->segment(3));
        redirect('gallery-corner-manager', 'refresh');
    }

    //$folder : candidate | university
    private function get_config($folder)
    {
        $path = "./assets/upload/images/$folder";
        return array(
            'upload_path' => $path,
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => TRUE,
            'max_size' => "20480000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
        );
    }
}
