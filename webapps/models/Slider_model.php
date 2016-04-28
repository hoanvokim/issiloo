<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */

class Slider_Model extends CI_Model
{
      public function getAll(){
          $sql = "select * from slider";
          return $this->db->query($sql)->result_array();
      }
}
