<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */

class Faq_Model extends CI_Model
{
    var $table = 'faq';

    public function find_all()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function faq_search($value)
    {
        $sql = "SELECT * FROM faq WHERE vi_question = ? OR vi_answer = ?";
        $query = $this->db->query($sql, array($value, $value));
        return $query->result();
    }
}
