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
        $this->load->model('Gallery_model');
    }

    public function index($slug){
        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $news_id = $this->News_model->getIdFromSlug($slug);
        $data['detail'] = $this->News_model->getNewsById($news_id);    //array of a news.
        $data['banner_title'] = $data['detail']['title'];
        $data['title_header'] = $data['banner_title'];

        $category_id = $data['detail']['category_id'];
        $category_info = $this->Category_model->getInfoFromId($category_id);

        $data['lst_post'] = $this->News_model->getNewsByCatId($category_id);
        $data['cur_post'] = $this->getIndexFromLstPost($data['lst_post'],$news_id);
        $data['max_post'] = count($data['lst_post']) - 1;

        $data['is_video'] = false;
        if($category_id==8 || $category_info['vi_name'] == 'Góc chia sẻ' || $category_info['en_name'] == 'Sharing'){
            if(strpos($data['detail']['img_src'],'youtube')==false){
                $data['is_video'] = false;
            }else{
                $data['is_video'] = true;
                $data['link_embed'] = strpos($data['detail']['img_src'],'embed') == false ? str_replace('watch?v=','embed/',$data['detail']['img_src']) : $data['detail']['img_src'];
            }
            $data['img_galleries'] = $this->Gallery_model->getGalleryByNewsId($news_id);
            $this->load->view('pages/webapp/share_corner_detail',$data);
        }else{
            $data['relatednews'] = $this->News_model->getRelatedNewsById($news_id);
            $data['tagnews'] = $this->Tag_model->getTagByNewsId($news_id);
            $this->load->view('pages/webapp/detail_news',$data);
        }
    }

    public function getIndexFromLstPost($aNews,$news_id){
        $cnt = count($aNews);
        if($cnt>0){
            for($i=0;$i<$cnt;$i++){
                if($aNews[$i]['id'] == $news_id){
                    return $i;
                }
            }
        }
        return -1;
    }

}