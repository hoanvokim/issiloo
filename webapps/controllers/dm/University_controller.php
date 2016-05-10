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
        $this->load->model('University_model');
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
        $this->University_model->insert(
            $this->input->post('uniTitle'), $this->input->post('uniDes'), $this->input->post('url')
        );
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
        $data['title'] = 'Cập nhật trường đại học';
        $this->load->view('pages/dm/university/edit', $data);
    }

    public function update_university_submit()
    {
        $this->University_model->update(
            $this->input->post('uniId'), $this->input->post('uniTitle'), $this->input->post('uniDes'), $this->input->post('url')
        );
        redirect('university-manager', 'refresh');
    }

    public function update_university_cancel()
    {
        redirect('university-manager', 'refresh');
    }

    public function delete_university()
    {
        $this->University_model->delete($this->uri->segment(3));
        redirect('university-manager', 'refresh');
    }
}
