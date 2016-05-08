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

        $input_search_value = $this->post->input('inputSearchValue');
        $data = $this->faq_model->faq_search($input_search_value);
        echo json_encode($data);
    }
}
