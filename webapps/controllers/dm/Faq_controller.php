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
        $this->load->model('faq_model', '', true);
        $this->load->model('user_model', '', TRUE);

    }

    public function index()
    {
        if (!$this->is_login()) {
            $this->load_login_view();
            return;
        }
        $data['title'] = 'Mục hỏi đáp';
        $data['faqs'] = $this->faq_model->find_all();
        $this->load->view('pages/dm/faq/faq_view_all', $data);
    }

    public function execute_search()
    {
        if (!$this->is_login()) {
            $this->load_login_view();
            return;
        }
        $searchValue = $this->input->post('inputSearchValue');
        $data['faqs'] = $this->faq_model->faq_search($searchValue);
        $this->load->view('components/dm/faq/faq_results', $data);
    }

    public function save_faq()
    {
        $this->_validate();
        $data = array(
            'en_question' => $this->input->post('enQuestion'),
        );
        $id = $this->faq_model->save($data);
    }

    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        $username = $this->input->post('enQuestion');
        if ($username == '') {
            $data['inputerror'][] = 'enQuestion';
            $data['error_string'][] = 'Question is required';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }

}
