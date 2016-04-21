<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 3/17/16
 * Time: 3:38 PM
 */
class Demo_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $data['title'] = 'Product General';
        $this->load->view('pages/webapp/demo', $data);
    }

}
?>
