<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('message', 'vietnamese');
        $_SESSION["activeLanguage"] = "vi";
        $this->load->model('Category_model');
    }

    public function index()
    {
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;
        $this->load->view("pages/home",$data);
    }
}
