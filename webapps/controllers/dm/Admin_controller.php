<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/29/16
 * Time: 9:44 PM
 */
class Admin_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Xem tổng quan';
        $this->load->view('pages/dm/index', $data);
    }
}
