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

    }

    public function index()
    {
        if (!$this->is_login()) {
            $this->load_login_view();
            return;
        }
        $data['title'] = 'Mục hỏi đáp';
        $this->load->view('pages/dm/faq/faq_view_all', $data);
    }
}
