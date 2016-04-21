<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: NhuTran
 * Date: 1/29/16
 * Time: 10:33 PM
 * To change this template use File | Settings | File Templates.
 */
class Home_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->lang->load('message', 'english');
    }

    public function index()
    {
        $_SESSION["activeLanguage"] = "en";
    }
}
