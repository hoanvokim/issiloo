<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 9/4/17
 * Time: 10:34 PM
 */
class Setting_Model extends CI_Model
{
    public function getAll()
    {
        try{

            $sql = "select * from setting";
            return $this->db->query($sql)->result_array();

        }catch(Exception $e){

            return false;

        }
    }

    public function update($key, $value)
    {
        $data = array(
            'value' => $value
        );
        $this->db->where('key', $key);
        $this->db->update('setting', $data);
    }
}