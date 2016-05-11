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

    public $question = "vi_question";
    public $answer = "vi_answer";

    public function __construct(){
        $this->question = $_SESSION["activeLanguage"] == "vi" ? "vi_question" : "en_question";
        $this->answer = $_SESSION["activeLanguage"] == "vi" ? "vi_answer" : "en_answer";
    }

    public function faq_search($value)
    {
        if (!isset($value)) {
            return $this->find_all();
        }
        $value = '%' . $value . '%';
        $sql = "SELECT * FROM faq WHERE vi_question like ? OR vi_answer like ?";
        $query = $this->db->query($sql, array($value, $value));
        return $query->result();
    }

    public function find_all()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAll(){
        $sql = "select id, $this->question as question, $this->answer as answer, created_date, updated_date from faq";
        return $this->db->query($sql)->result_array();
    }

    public function find_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert($faq)
    {
        $this->db->insert($this->table, $faq);
    }

    public function update($id, $faq)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $faq);
    }
}
