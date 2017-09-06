<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        //load curr lang.
        $this->lang->load('message', 'vietnamese');
        $_SESSION["activeLanguage"] = "vi";

        //load models for home page.
        $this->load->model('Category_model');
        $this->load->model('Slider_model');
        $this->load->model('News_model');
        $this->load->model('University_model');
        $this->load->model('Gallery_model');
        $this->load->model('Setting_model');
        $this->load->model('Feature_model');
    }

    public function index()
    {
        $data['status'] = '';
        try {
            if ($this->input->post('btn_consult_send')) {
                $contact['protocol'] = $this->config->item('protocol');
                $contact['charset'] = $this->config->item('charset');
                $contact['mailtype'] = $this->config->item('mailtype');
                $contact['wordwrap'] = $this->config->item('wordwrap');

                $consult_name = $this->input->post('consult_name');
                $consult_email = $this->input->post('consult_email');
                $consult_phone = $this->input->post('consult_phone');

                $consult_subject = $this->input->post('consult_subject');
                $consult_content = "<i>Tên: " . $consult_name . "<br/>"
                    . "Email: ". $consult_email . "<br/>"
                    . "Số điện thoại: " . $consult_phone . "</i><br/>"
                    . "------------------------------------------<br/>"
                    . "<strong>Tiêu đề: " . $consult_subject . "</strong><br/><br/>"
                    . $this->input->post('consult_content');

                //test
                $config1 = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'sup.issiloo@gmail.com',
                    'smtp_pass' => 'TihHon@16LH',
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'wordwrap' => TRUE
                );

                $this->load->library('email', $config1);
                $this->email->set_newline("\r\n");
                $this->email->initialize($config1);

                $this->email->from('sup.issiloo@gmail.com', $consult_email);

                $this->email->to($this->config->item('contact_email'));

                $this->email->subject($consult_subject);
                $this->email->message($consult_content);
                if (!$this->email->send()) {
                    $data['status'] = 'error';
                } else {
                    $data['status'] = 'success';
                }
                $sql = "insert into user(email,name,phone,title,content) values('$consult_email','$consult_name','$consult_phone','$consult_subject','$consult_content')";
                $result = $this->db->query($sql);
                if ($result) {
                    $data['status'] = 'success';
                } else {
                    $data['status'] = 'error';
                }
            }

        } catch (Exception $e) {
            $data['status'] = 'error';
        }

        //get main menu
        $strMenu = '';
        $this->Category_model->getMainMenu(null, $strMenu);
        $data['menustr'] = $strMenu;

        //get slider
        $data['sliders'] = $this->Slider_model->getAll();
        $data['slogan'] = $this->Setting_model->getSlogan();
        $data['featureslogan'] = $this->Setting_model->getValueFromKey('featureslogan');
        $data['features'] = $this->Feature_model->getAll();
        $data['featureCount'] = 12/count($data['features']);

        //get widget news
        $duhochanquoc = $this->Category_model->findById($this->config->item('duhochanquoc'));
        foreach ($duhochanquoc as $duhoc) {
            $data['duhochanquoc'] = $duhoc;
        }

        $daotaohanngu = $this->Category_model->findById($this->config->item('daotaohanngu'));
        foreach ($daotaohanngu as $daotao) {
            $data['daotaohanngu'] = $daotao;
        }
//        //HARDCODE
//        $aImportantMenu = $this->config->item('homepage_widget_news');
//        $cnt = 0;
//        $aImpNews = array();
//        foreach ($aImportantMenu as $item) {
//            //get sub menu of each item.
//            $aCat = array();
//            $aCat[] = $item;
//            $this->Category_model->getAllSubMenu($item, $aCat);
//
//            $aTemp = $this->News_model->getNewsByArrCat($aCat);
//            if (count($aTemp) == 0) {
//                continue;
//            }
//
//            $imp_cat_info = $this->Category_model->getInfoFromId($item);
//            $aImpNews[$cnt]['cat_name'] = $this->Category_model->getName($item);
//            $aImpNews[$cnt]['cat_id'] = $item;
//            $aImpNews[$cnt]['cat_slug'] = $imp_cat_info['slug'];
//            $aImpNews[$cnt]['count_news'] = count($aTemp);
//            $max_news = count($aTemp) > 4 ? 4 : count($aTemp);
//            $aImpNews[$cnt]['related_news'] = $this->News_model->resizeNewsArray($aTemp, $max_news);
//            $cnt++;
//            $aCat = null;
//        }
//
//        $data['aImpNews'] = $aImpNews;

        //get university.
        $data['universities'] = $this->University_model->getAll();

        //get lastest news.
        $data['last_news'] = $this->News_model->getLastNews();

        $data['title_header'] = $this->lang->line('MENU_HOME');

        $this->load->view("pages/home", $data);
    }

    public function getThumbnailFromYoutubeLink($youtube_link)
    {
        if (strlen($youtube_link) > 0) {
            if (strpos($youtube_link, 'embed') !== false) {
                //embed link.
                $video_id = substr(str_replace('embed/', '', $youtube_link), strripos($youtube_link, 'embed/'));
            } else {
                $video_id = substr(str_replace('watch?v=', '', $youtube_link), strripos($youtube_link, 'watch?v='));
            }
            return "http://img.youtube.com/vi/$video_id/0.jpg";
        } else {
            return '';
        }
    }

}
