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

    public function find($keyword = null,$curpage = null){

        if($this->input->post('search_keyword')){
            $keyword = $this->input->post('search_keyword');
        }
        $keyword = urldecode($keyword);
        $total_row = $this->News_model->getTotalRowBySearchTag($keyword);
        $data['search_item_count'] = $total_row > 0 ? $total_row : 0;
        $data['keyword'] = $keyword;

        if($total_row > 0){
            //limit = 10
            $this->pageutility->setData($total_row,10);
            $data['total_page'] = $this->pageutility->total_page;
            $data['cur_page'] = $curpage == null ? 1 : $curpage;
            $data['anews'] =  $this->News_model->getNewsBySearchTag($keyword,$curpage,$this->pageutility->limit);
            $data['search_item_count'] = $total_row;
        }

        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $data['title_header'] = 'Searching';
        $data['status'] = '';
        $this->load->view("pages/webapp/search_result",$data);
    }

}