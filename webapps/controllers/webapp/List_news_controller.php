<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_news_controller extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        //load curr lang.
        $this->lang->load('message', 'vietnamese');
        if (empty($_SESSION["activeLanguage"])) {
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

    public function index($slug, $curpage = null)
    {

        $data['status'] = '';
        if ($this->input->post('btn_consult_send')) {
            $contact['protocol'] = $this->config->item('protocol');
            $contact['charset'] = $this->config->item('charset');
            $contact['mailtype'] = $this->config->item('mailtype');
            $contact['wordwrap'] = $this->config->item('wordwrap');
            $this->email->initialize($contact);

            $consult_name = $this->input->post('consult_name');
            $consult_email = $this->input->post('consult_email');
            $consult_phone = $this->input->post('consult_phone');

            $consult_subject = $this->input->post('consult_subject');
            $consult_content = $this->input->post('consult_content') . "\n Phone : " . $consult_phone;

            $this->email->from($consult_email, $consult_name);

            $this->email->to($this->config->item('contact_email'));

            $this->email->subject($consult_subject);
            $this->email->message($consult_content);
            if (!$this->email->send()) {
                $data['status'] = 'error';
            } else {
                $data['status'] = 'success';
            }
            $sql = "insert into user(email,name,phone) values('$consult_email','$consult_name','$consult_phone')";
            $result = $this->db->query($sql);
            if ($result) {
                $data['status'] = 'success';
            } else {
                $data['status'] = 'error';
            }
        }

        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null, $strMenu);
        $data['menustr'] = $strMenu;

        $category_id = $this->Category_model->getIdFromSlug($slug);
        $data['banner_title'] = $this->Category_model->getName($category_id);
        $data['title_header'] = $data['banner_title'];

        $aMenu = array();
        $aMenu[] = $category_id;
        $this->Category_model->getAllSubMenu($category_id, $aMenu);
        $data['aMenu'] = $aMenu;

        //limit = 10
        $this->pageutility->setData($this->News_model->getToTalRowByCatCollection($aMenu), 10);
        $data['total_page'] = $this->pageutility->total_page;
        $data['cur_page'] = $curpage == null ? 1 : $curpage;
        $data['slug'] = $slug;
        $data['anews'] = $this->News_model->getNewsByCatCollection($aMenu, $curpage, $this->pageutility->limit);
        $data['relatednews'] = $this->News_model->getRelatedNewsByCatId($category_id);

        $category_info = $this->Category_model->getInfoFromId($category_id);

       if($category_id==8 || $category_info['vi_name'] == 'Góc chia sẻ' || $category_info['en_name'] == 'Sharing'){

            $arr_news = array();
            $cnt = 0;
            foreach($data['anews'] as $item){
                $arr_news[$cnt]['id'] = $item['id'];
                $arr_news[$cnt]['category_id'] = $item['category_id'];
                $arr_news[$cnt]['img_src'] = $item['img_src'];
                $arr_news[$cnt]['slug'] = $item['slug'];
                $arr_news[$cnt]['title'] = $item['title'];
                if(strripos($item['img_src'],'embed/') !== false || strripos($item['img_src'],'watch?v=') !== false){
                    //is video
                    $arr_news[$cnt]['youtube_thumbnail'] = $this->getThumbnailFromYoutubeLink($item['img_src']);
                }else{
                    $arr_news[$cnt]['youtube_thumbnail'] = false;
                }
                $cnt++;
            }
            $data['anews'] = $arr_news;
            $this->load->view('pages/webapp/share_corner',$data);

        }elseif($category_id==19 || $category_info['vi_name'] == 'Hỏi đáp' || $category_info['en_name'] == 'FAQs'){

           $data['faqs'] = $this->Faq_model->getAll();
           $this->load->view('pages/webapp/faq',$data);

        } elseif ($category_id == 1 || $category_info['vi_name'] == 'Giới thiệu' || $category_info['en_name'] == 'Introduce') {
           $data['intros'] = $this->News_model->getIntroduces(1);
           $this->load->view('pages/webapp/intro', $data);
       } else{
           $this->load->view("pages/webapp/list_news",$data);
       }
    }

    public function tag($tag_id, $curpage = null)
    {
        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null, $strMenu);
        $data['menustr'] = $strMenu;

        $data['title_header'] = $this->Tag_model->getNameById($tag_id);

        //limit = 10
        $this->pageutility->setData($this->News_model->getTotalRowByTagId($tag_id), 10);
        $data['total_page'] = $this->pageutility->total_page;
        $data['cur_page'] = $curpage == null ? 1 : $curpage;
        $data['tag_id'] = $tag_id;
        $data['anews'] = $this->News_model->getNewsByTagId($tag_id, $curpage, $this->pageutility->limit);

        $data['tag_name'] = $data['title_header'];

        $this->load->view("pages/webapp/list_news_tag", $data);
    }

    public function getThumbnailFromYoutubeLink($youtube_link){
        if(strpos($youtube_link,'embed')!==false){
            //embed link.
            $video_id = substr(str_replace('embed/','',$youtube_link),strripos($youtube_link,'embed/'));
        }else{
            $video_id = substr(str_replace('watch?v=','',$youtube_link),strripos($youtube_link,'watch?v='));
        }
        return "http://img.youtube.com/vi/$video_id/0.jpg";
    }

}