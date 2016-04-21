<?php     if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: NhuTran
 * Date: 1/31/16
 * Time: 12:09 AM
 * To change this template use File | Settings | File Templates.
 */
class VerifyLogin_controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model','',TRUE);
    }

    function index()
    {
        //This method will have the credentials validation
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            $this->load_login_view();
        }
        else
        {
            redirect('admin', 'refresh');
        }
    }

    function check_database($password)
    {
        $username = $this->input->post('username');
        $result = $this->user_model->login($username, $password);
        if($result)
        {
            $sess_array = array();
            foreach($result as $row)
            {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }
}
