<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_controller extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //load curr lang.
        $this->lang->load('message', 'vietnamese');
        if(empty($_SESSION["activeLanguage"])){
            $_SESSION["activeLanguage"] = "vi";
        }

        //load models for home page.
        $this->load->model('Category_model');
    }

    public function index(){
        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $data['title_header'] = 'Contact';

        $this->load->view('pages/webapp/contact',$data);

    }

}