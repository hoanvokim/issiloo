<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //load curr lang.
        $this->lang->load('message', 'vietnamese');
        if(empty($_SESSION["activeLanguage"])){
            $_SESSION["activeLanguage"] = "vi";
        }

        //load models for home page.
        $this->load->model('Category_model');
        $this->load->model('Slider_model');
        $this->load->model('News_model');
        $this->load->model('University_model');
        $this->load->model('Gallery_model');
    }

    public function index()
    {
        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null,$strMenu);
        $data['menustr'] = $strMenu;

        //get slider
        $data['sliders'] = $this->Slider_model->getAll();

        //get widget news
        $data['dhhq'] = $this->Category_model->getName(11);
        $data['adhhq'] = $this->News_model->getNewsByCatId(11);

        $data['hbdh'] = $this->Category_model->getName(10);
        $data['ahbdh'] = $this->News_model->getNewsByCatId(10);

        $data['hth'] = $this->Category_model->getName(13);
        $data['ahth'] = $this->News_model->getNewsByCatId(13);

        //get university.
        $temp = $this->University_model->getAll();
        $universities = array();
        $cnt = 0;
        foreach($temp as $item){
            $universities[$cnt]['university_id'] = $item['university_id'];
            $universities[$cnt]['title'] = $item['title'];
            $universities[$cnt]['description'] = $item['description'];
            $universities[$cnt]['url'] = $item['url'];
            $images = $this->Gallery_model->getGalleryByUniverity($item['university_id']);
            $universities[$cnt]['gallery'] = $images;
            $cnt++;
        }

        $data['universities'] = $universities;

        //get lastest news.
        $data['last_news'] = $this->News_model->getLastNews();

        //get video and images.
        $data['video_image'] = $this->Gallery_model->getGalleryByNews();

        $this->load->view("pages/home",$data);
    }
}
