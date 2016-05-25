<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class Faq_controller extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (empty($_SESSION["activeLanguage"])) {
            $_SESSION["activeLanguage"] = "vi";
        }
        $this->load->model('Faq_model');
    }

    public function index()
    {
        $data['faqs'] = $this->Faq_model->findAll();
        $data['title'] = 'Câu hỏi thường gặp';
        $this->load->view('pages/dm/faq/view_all', $data);
    }

    public function create_faq()
    {
        $data['title'] = 'Thêm câu hỏi thường gặp';
        $this->load->view('pages/dm/faq/add', $data);
    }

    public function create_faq_submit()
    {
        $insertId = -1;
        $insertId = $this->Faq_model->insert(
            $this->input->post('faqQuestion'),
            $this->input->post('faqAnswer')
        );

        $faq_id = $insertId;
        $faq_update_record = $this->Faq_model->findById($faq_id);
        $answer = $faq_update_record['vi_answer'];
        $save_path = 'assets/upload/images/news/';
        $updated_answer = saveImgAndUpdateContent($save_path,$answer);
        if(strlen($updated_answer) > 0){
            $this->Faq_model->update_answer($faq_id,'vi_answer',$updated_answer);
        }

        redirect('faq-manager', 'refresh');
    }

    public function create_faq_cancel()
    {
        redirect('faq-manager', 'refresh');
    }

    public function update_faq()
    {
        $current = $this->Faq_model->findById($this->uri->segment(3));
        $data['faqId'] = $current['id'];
        $data['faqQuestion'] = $current['vi_question'];
        $data['faqAnswer'] = $current['vi_answer'];

        $data['title'] = 'Cập nhật nội dung';
        $this->load->view('pages/dm/faq/edit', $data);
    }

    public function update_faq_submit()
    {

        $this->Faq_model->update(
            $this->input->post('faqId'),
            $this->input->post('faqQuestion'),
            $this->input->post('faqAnswer')
        );

        $faq_id = $this->input->post('faqId');
        $faq_update_record = $this->Faq_model->findById($faq_id);
        $answer = $faq_update_record['vi_answer'];
        $save_path = 'assets/upload/images/news/';
        $updated_answer = saveImgAndUpdateContent($save_path,$answer);
        if(strlen($updated_answer) > 0){
            $this->Faq_model->update_answer($faq_id,'vi_answer',$updated_answer);
        }

        redirect('faq-manager', 'refresh');
    }

    public function update_faq_cancel()
    {
        redirect('faq-manager', 'refresh');
    }

    public function delete_faq()
    {
        $this->Faq_model->delete($this->uri->segment(3));
        redirect('faq-manager', 'refresh');
    }

}
