<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koreanstudyabroad_controller extends CI_Controller
{

    public function __construct(){

        parent::__construct();
        //load curr lang.
        $this->lang->load('message', 'vietnamese');
        if(empty($_SESSION["activeLanguage"])){
            $_SESSION["activeLanguage"] = "vi";
        }

        //load models for home page.
        $this->load->model('Category_model');
        $this->load->model('Setting_model');
        $this->load->library('email');
        $this->load->helper('form');

        $this->load->model('News_model');
        $this->load->model('Tag_model');
        $this->load->model('Gallery_model');
    }

    public function index($slug_url = null)
    {
        $data['defaultbanner'] = $this->Setting_model->getValueFromKey('defaultbanner');
        $data['status'] = '';
        if($this->input->post('btn_send')){

            $contact['protocol'] = $this->config->item('protocol');
            $contact['charset'] = $this->config->item('charset');
            $contact['mailtype'] = $this->config->item('mailtype');
            $contact['wordwrap'] = $this->config->item('wordwrap');
            $this->email->initialize($contact);

            $sender_mail = $this->input->post('sender_email');
            $sender_phone = $this->input->post('sender_phone');
            $sender_name = $this->input->post('sender_name');

            $sender_subject = $this->input->post('sender_subject');
            $sender_content = $this->input->post('sender_content')."\n Phone : ".$sender_phone;;

            $this->email->from($sender_mail, $sender_name);

            $this->email->to($this->config->item('contact_email'));

            $this->email->subject($sender_subject);
            $this->email->message($sender_content);
            if ( ! $this->email->send())
            {
                $data['status'] = 'error';
            }else{
                $data['status'] = 'success';
            }
        }

        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        $duhochanquoc = $this->Category_model->findById($this->config->item('duhochanquoc'));
        foreach ($duhochanquoc as $duhoc) {
            $data['duhochanquoc'] = $duhoc;
            $data['title_header'] = $duhoc['vi_name'];
        }

        if ($slug_url == null) {
            $duhoctieng = $this->Category_model->findById($this->config->item('duhoctieng'));
            foreach ($duhoctieng as $duhoc) {
                $data['duhoctieng'] = $duhoc;
            }
            $duhocnganh = $this->Category_model->findById($this->config->item('duhocnganh'));
            foreach ($duhocnganh as $duhoc) {
                $data['duhocnganh'] = $duhoc;
            }
            $duhocnghe = $this->Category_model->findById($this->config->item('duhocnghe'));
            foreach ($duhocnghe as $duhoc) {
                $data['duhocnghe'] = $duhoc;
            }
            $this->load->view('pages/webapp/korean_study_aboard', $data);
        }
        else {
            $newsId = null;
            switch ($slug_url) {
                case 'du-hoc-tieng' :
                    $newsId = $this->config->item('baiviet_duhoctieng');
                    break;
                case 'du-hoc-nganh' :
                    $newsId = $this->config->item('baiviet_duhocnganh');
                    break;
                case 'du-hoc-nghe' :
                    $newsId = $this->config->item('baiviet_duhocnghe');
                    break;
            }

            $data['detail'] = $this->News_model->getNewsById($newsId);    //array of a news.    if not return -1
            $data['banner_title'] = $data['detail'] != -1 ? $data['detail']['title'] : '';
            $data['banner_bg'] = $data['detail'] != -1 ? $data['detail']['img_src'] : '';
            $data['title_header'] = $data['banner_title'];

            $category_id = $data['detail'] != -1 ? $data['detail']['category_id'] : -1;
            $category_info = $this->Category_model->getInfoFromId($category_id);  //a category row. if not return -1

            $data['category_info'] = $category_info;

            $data['lst_post'] = $this->News_model->getNewsByCatId($category_id);
            $data['cur_post'] = $this->getIndexFromLstPost($data['lst_post'], $newsId);
            $data['max_post'] = count($data['lst_post']) - 1;

            $data['is_video'] = false;
            if ($category_info != -1 && ($category_id == $this->config->item('gocchiase') || $category_info['vi_name'] == 'Góc chia sẻ' || $category_info['en_name'] == 'Sharing')) {
                if (strpos($data['detail']['img_src'], 'youtube') == false) {
                    $data['is_video'] = false;
                }
                else {
                    $data['is_video'] = true;
                    $data['link_embed'] = strpos($data['detail']['img_src'], 'embed') == false ? str_replace('watch?v=', 'embed/', $data['detail']['img_src']) : $data['detail']['img_src'];
                }
                $data['img_galleries'] = $this->Gallery_model->getGalleryByNewsId($newsId);
                $this->load->view('pages/webapp/share_corner_detail', $data);
            }
            else {
                $data['relatednews'] = $this->News_model->getRelatedNewsById($newsId);
                $data['tagnews'] = $this->Tag_model->getTagByNewsId($newsId);
                $this->load->view('pages/webapp/detail_news', $data);
            }
        }
    }

    public function getIndexFromLstPost($aNews, $news_id)
    {
        $cnt = count($aNews);
        if ($cnt > 0) {
            for ($i = 0; $i < $cnt; $i++) {
                if ($aNews[$i]['id'] == $news_id) {
                    return $i;
                }
            }
        }
        return -1;
    }

}