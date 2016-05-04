<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class News_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_news()
    {
    }

    public function add_news_into_category()
    {
        $this->load->model('Category_model');
        $data['title'] = 'Viết bài';
        $this->load->view('pages/dm/news_add_into_category', $data);
    }

}