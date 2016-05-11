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
        $this->load->model('Tag_model');
        $this->load->library('pageutility');
    }

    public function index($slug,$curpage = null){

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

        //limit = 10
        $this->pageutility->setData($this->News_model->getToTalRowByCatCollection($aMenu),10);
        $data['total_page'] = $this->pageutility->total_page;
        $data['cur_page'] = $curpage == null ? 1 : $curpage;
        $data['slug'] = $slug;
        $data['anews'] = $this->News_model->getNewsByCatCollection($aMenu,$curpage,$this->pageutility->limit);
        $data['relatednews'] = $this->News_model->getRelatedNewsByCatId($category_id);

        $category_info = $this->Category_model->getInfoFromId($category_id);

       if($category_id==8 || $category_info['vi_name'] == 'Góc chia sẻ' || $category_info['en_name'] == 'Sharing'){
            $this->load->view('pages/webapp/share_corner',$data);
        }else{
            $this->load->view("pages/webapp/list_news",$data);
        }
    }

    public function tag($tag_id,$curpage = null){
        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $data['title_header'] = $this->Tag_model->getNameById($tag_id);

        //limit = 10
        $this->pageutility->setData($this->News_model->getTotalRowByTagId($tag_id),10);
        $data['total_page'] = $this->pageutility->total_page;
        $data['tag_id'] = $tag_id;
        $data['anews'] =  $this->News_model->getNewsByTagId($tag_id,$curpage,$this->pageutility->limit);

        $data['tag_name'] =  $data['title_header'];

        $this->load->view("pages/webapp/list_news_tag",$data);
    }

}