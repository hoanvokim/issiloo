<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_news_controller extends CI_Controller{

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
    }

    public function index($slug){

        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $category_id = $this->Category_model->getIdFromSlug($slug);
        $data['banner_title'] = $this->Category_model->getName($category_id);
        $data['title_header'] = $data['banner_title'];

        $aMenu = array();
        $aMenu[] = $category_id;
        $this->Category_model->getAllSubMenu($category_id,$aMenu);
        $data['aMenu'] = $aMenu;

        $data['anews'] = $this->News_model->getNewsByCatCollection($aMenu);
        $data['relatednews'] = $this->News_model->getRelatedNewsByCatId($category_id);

        $this->load->view("pages/webapp/list_news",$data);
    }

}