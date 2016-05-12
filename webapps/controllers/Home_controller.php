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
        $this->load->library('email');
    }

    public function index()
    {

        $data['status'] = '';
        if($this->input->post('btn_consult_send')){
            $contact['protocol'] = $this->config->item('protocol');
            $contact['charset'] = $this->config->item('charset');
            $contact['mailtype'] = $this->config->item('mailtype');
            $contact['wordwrap'] = $this->config->item('wordwrap');
            $this->email->initialize($contact);

            $consult_name = $this->input->post('consult_name');
            $consult_email = $this->input->post('consult_email');
            $consult_phone = $this->input->post('consult_phone');

            $consult_subject = $this->input->post('consult_subject');
            $consult_content = $this->input->post('consult_content')."\n Phone : ".$consult_phone;

            $this->email->from($consult_email, $consult_name);

            $this->email->to($this->config->item('contact_email'));

            $this->email->subject($consult_subject);
            $this->email->message($consult_content);
            if ( ! $this->email->send())
            {
                $data['status'] = 'error';
            }else{
                $data['status'] = 'success';
            }
            $sql = "insert into user(email,name,phone) values('$consult_email','$consult_name','$consult_phone')";
            $result = $this->db->query($sql);
            if($result){
                $data['status'] = 'success';
            }else{
                $data['status'] = 'error';
            }
        }

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

        $data['title_header'] = $this->lang->line('MENU_HOME');

        $this->load->view("pages/home",$data);
    }
}
