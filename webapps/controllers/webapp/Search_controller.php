<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_controller extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //load curr lang.
        $this->lang->load('message', 'vietnamese');
        if(empty($_SESSION["activeLanguage"])){
            $_SESSION["activeLanguage"] = "vi";
        }

        //load models for home page.
        $this->load->model('Category_model');
        $this->load->model('News_model');
        $this->load->model('Tag_model');
        $this->load->library('pageutility');
        $this->load->model('Faq_model');

        $this->load->library('email');
    }

    public function find($tag_name=''){
        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $data['title_header'] = 'Searching';
    }

}