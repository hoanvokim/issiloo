<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_controller extends CI_Controller{

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
    }

    public function index($slug){
        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $news_id = $this->News_model->getIdFromSlug($slug);
        $data['detail'] = $this->News_model->getNewsById($news_id);
        $data['banner_title'] = $data['detail']['title'];
        $data['title_header'] = $data['banner_title'];

        $data['news_sidebar'] = $this->News_model->getRelatedNewsById($news_id);
        $data['tagnews'] = $this->Tag_model->getTagByNewsId($news_id);



        $this->load->view('pages/webapp/detail_news',$data);
    }

}