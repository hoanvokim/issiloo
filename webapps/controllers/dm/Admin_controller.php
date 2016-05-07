<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class Admin_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', '', TRUE);
    }

    public function index()
    {
        if (!$this->is_login()) {
            $this->load_login_view();
            return;
        }
        $data['title'] = 'Xem tổng quan';
        $this->load->view('pages/dm/index', $data);
    }

    public function login_submit()
    {
        $data["title"] = "Login";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pages/security/login', $data);
        } else {
            redirect('admin', 'refresh');
        }

    }

    function logout()
    {
        $this->session->unset_userdata('authenticated_user');
        session_destroy();
        redirect('admin', 'refresh');
    }

    function check_database($password)
    {
        $username = $this->input->post('username');
        $result = $this->user_model->authenticate($username, $password);
        if ($result) {
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('authenticated_user', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}
