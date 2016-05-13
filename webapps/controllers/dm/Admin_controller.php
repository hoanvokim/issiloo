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
        $this->load->model('User_model', '', TRUE);
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
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
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
        $email = $this->input->post('email');
        $result = $this->User_model->authenticate($email, $password);
        if ($result) {
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'email' => $row->email
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
