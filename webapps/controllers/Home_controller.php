<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('message', 'vietnamese');
        $this->load->model('Category_model');
        $_SESSION["activeLanguage"] = "vi";
    }

    public function index()
    {
        //$this->Category_model->getMainMenu();
        $this->load->view("pages/home");
    }
}
