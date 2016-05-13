<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class University_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (empty($_SESSION["activeLanguage"])) {
            $_SESSION["activeLanguage"] = "vi";
        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload');
        $this->load->model('University_model');
        $this->load->model('Gallery_model');
    }

    public function index()
    {
        $data['universities'] = $this->University_model->getAll();
        $data['title'] = 'Xem tất cả trường đại học';
        $this->load->view('pages/dm/university/view_all', $data);
    }

    public function create_university()
    {
        $data['title'] = 'Thêm trường đại học';
        $this->load->view('pages/dm/university/add', $data);
    }

    public function create_university_submit()
    {
        $id = $this->University_model->insert(
            $this->input->post('uniTitle'), $this->input->post('uniDes'), $this->input->post('url')
        );


        $files = $_FILES;
        $cpt = count($_FILES['userfile']['name']);
        for($i=0; $i<$cpt; $i++)
        {
            $_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload();
            $fileName = $_FILES['userfile']['name'];
            $images[] = $fileName;
        }
        $this->Gallery_model->insertUniversityImage($images, $id);

        redirect('university-manager', 'refresh');
    }

    public function create_university_cancel()
    {
        redirect('university-manager', 'refresh');
    }

    public function update_university()
    {
        $uni = $this->University_model->getById($this->uri->segment(3));
        $data['uniId'] = $uni['university_id'];
        $data['uniTitle'] = $uni['title'];
        $data['uniDes'] = $uni['description'];
        $data['url'] = $uni['url'];
        $data['images'] = $this->Gallery_model->getGalleryByUniverity($uni['university_id']);
        $data['title'] = 'Cập nhật trường đại học';
        $this->load->view('pages/dm/university/edit', $data);
    }

    public function update_university_submit()
    {
        if(isset($_POST["save"])) {
            $this->University_model->update(
                $this->input->post('uniId'), $this->input->post('uniTitle'), $this->input->post('uniDes'), $this->input->post('url')
            );
            redirect('university-manager', 'refresh');
        }

        if(isset($_POST["cancel"])){
            redirect('university-manager', 'refresh');
        }
        if(isset($_POST["delete"])){
            $this->University_model->delete($this->input->post('uniId'));
            redirect('university-manager', 'refresh');
        }
        if(isset($_POST["delete-img"])){
            $this->Gallery_model->deleteList($this->input->post('deleteimg'));
            //
            $data['uniId'] = $this->input->post('uniId');
            $data['uniTitle'] = $this->input->post('uniTitle');
            $data['uniDes'] = $this->input->post('uniDes');
            $data['url'] = $this->input->post('url');
            $data['images'] = $this->Gallery_model->getGalleryByUniverity($this->input->post('uniId'));
            $data['title'] = 'Cập nhật trường đại học';
            $this->load->view('pages/dm/university/edit', $data);
        }
        if(isset($_POST["add-img"])){
            $files = $_FILES;
            $cpt = count($_FILES['userfile']['name']);
            for($i=0; $i<$cpt; $i++)
            {
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload();
                $fileName = $_FILES['userfile']['name'];
                $images[] = $fileName;
            }
            $this->Gallery_model->insertUniversityImage($images, $this->input->post('uniId'));
            //
            $data['uniId'] = $this->input->post('uniId');
            $data['uniTitle'] = $this->input->post('uniTitle');
            $data['uniDes'] = $this->input->post('uniDes');
            $data['url'] = $this->input->post('url');
            $data['images'] = $this->Gallery_model->getGalleryByUniverity($this->input->post('uniId'));
            $data['title'] = 'Cập nhật trường đại học';
            $this->load->view('pages/dm/university/edit', $data);
        }
    }

    public function delete_university()
    {
        $this->University_model->delete($this->input->post('uniId'));
        redirect('university-manager', 'refresh');
    }

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './assets/upload/images/university';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '20480000';
        $config['overwrite'] = TRUE;

        return $config;
    }

}
