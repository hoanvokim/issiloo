<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by IntelliJ IDEA.
 * User: hoanvo
 * Date: 4/25/16
 * Time: 5:34 PM
 */
class News_Model extends CI_Model
{

    public $title = "vi_title";
    public $content = "vi_content";
    public $summary = "vi_summary";

    public function __construct()
    {
        $this->title = $_SESSION["activeLanguage"] == "vi" ? "vi_title" : "en_title";
        $this->content = $_SESSION["activeLanguage"] == "vi" ? "vi_content" : "en_content";
        $this->summary = $_SESSION["activeLanguage"] == "vi" ? "vi_summary" : "en_summary";
        $this->load->model("Category_model");
    }

    public function getIdFromSlug($slug)
    {
        $sql = "select id from news where slug='$slug' limit 0,1";
        $result = $this->db->query($sql)->result_array();
        return $result[0]['id'];
    }

    public function getNewsById($id)
    {
        $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary from news where id = $id";
        $result = $this->db->query($sql)->result_array();
        return $result[0];
    }

    public function getNewsByCatId($catId)
    {
        $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary, created_date, updated_date from news where category_id = $catId";
        return $this->db->query($sql)->result_array();
    }

    public function getLastNews()
    {
        $sql = "select img_src, slug, $this->title as title, $this->summary as summary, created_date from news order by created_date desc limit 0,4";
        return $this->db->query($sql)->result_array();
    }

    public function getNewsByCatCollection($aCat, $cur_page, $limit)
    {
        $start = ($cur_page - 1) * $limit;
        $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary from news where category_id in (";
        $cnt = count($aCat);
        for ($i = 0; $i < $cnt - 1; $i++) {
            $sql = $sql . $aCat[$i] . ",";
        }
        $sql = $sql . $aCat[$cnt - 1] . ") limit $start,$limit";
        return $this->db->query($sql)->result_array();
    }

    public function getNewsByCatCollectionWithoutLimit($aCat)
    {
        $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, updated_date, $this->summary as summary from news where category_id in (";
        foreach ($aCat as $value) {
            $sql = $sql . $value . ",";
        }
        $sql = substr($sql, 0, -1);
        $sql = $sql . ")";
        return $this->db->query($sql)->result_array();
    }

    public function getToTalRowByCatCollection($aCat)
    {
        $sql = "select count(*) as total_row from news where category_id in(";
        $cnt = count($aCat);
        for ($i = 0; $i < $cnt - 1; $i++) {
            $sql = $sql . $aCat[$i] . ",";
        }
        $sql = $sql . $aCat[$cnt - 1] . ")";
        $rs = $this->db->query($sql)->result_array();
        return $rs[0]['total_row'];
    }

    public function getRelatedNewsByCatId($category_id)
    {
        $arr = array();
        $cnt = 0;
        $aSubMenu = array();
        $this->Category_model->getDirectSubMenu($category_id, $aSubMenu);
        foreach ($aSubMenu as $item) {
            if (count($this->getNewsByCatId($item)) == 0) {
                continue;
            }
            $arr[$cnt]['cat_name'] = $this->Category_model->getName($item);
            $arr[$cnt]['related_news'] = $this->getNewsByCatId($item);
            $cnt++;
        }
        return $arr;
    }

    public function getRelatedNewsById($news_id)
    {
        $sql = "select category_id from news where id=$news_id";
        $result = $this->db->query($sql)->result_array();
        $category_id = $result[0]['category_id'];

        $sql = "select id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary ";
        $sql = $sql . "from news where category_id = $category_id and id <> $news_id limit 0,3";
        return $this->db->query($sql)->result_array();
    }

    public function getTotalRowByTagId($tag_id)
    {
        $sql = "select count(*) as total_row from news, tagnews where tag_id = $tag_id and news_id = news.id";
        $rs = $this->db->query($sql)->result_array();
        return $rs[0]['total_row'];
    }

    public function getNewsByTagId($tag_id, $cur_page, $limit)
    {
        $start = ($cur_page - 1) * $limit;
        $sql = "select news.id, category_id, img_src, slug, title_header, description_header, keyword_header, $this->title as title, $this->content as content, created_date, $this->summary as summary from news, tagnews where tagnews.tag_id = $tag_id and tagnews.news_id = news.id limit $start,$limit";
        return $this->db->query($sql)->result_array();

    }

    public function getTotalRowBySearchTag($keyword){
        $select = "select distinct news_id ";
        $from = "from tag, tagnews, news ";
        $where = "where lower(tag.name) = lower('$keyword') and tag.id=tagnews.tag_id and tagnews.news_id = news.id";
        $sql = $select.$from.$where;
        return count($this->db->query($sql)->result_array());
    }

    public function getNewsBySearchTag($keyword, $cur_page, $limit){
        $start = ($cur_page - 1) * $limit;
        $select = "select distinct news_id , category_id, img_src, slug, $this->title as title, $this->content as content, created_date, $this->summary as summary ";
        $from = "from tag, tagnews, news ";
        $where = "where lower(tag.name) = lower('$keyword') and tag.id=tagnews.tag_id and tagnews.news_id = news.id limit $start,$limit";
        $sql = $select.$from.$where;
        return $this->db->query($sql)->result_array();
    }

    public function getIntroduces($catId)
    {
        $sql = " select category.id as catId, 
                 news.id as newsId,
                 category.en_name as enCatName,
                 category.vi_name as viCatName, 
                 news.en_content as enNewsContent, 
                 news.vi_content as viNewsContent, 
                 category.created_date as catCreatedDate, 
                 category.updated_date as catUpdatedDate 
                 from news INNER JOIN category ON news.category_id=category.id 
                 where news.category_id in (select id from category where category.parent_id = $catId) 
                 order by category.id asc;";
        return $this->db->query($sql)->result_array();
    }

    public function getCurrentIntroduce($catId)
    {
        $sql = " select category.id as catId, 
                 news.id as newsId,
                 category.en_name as enCatName,
                 category.vi_name as viCatName, 
                 news.en_content as enNewsContent, 
                 news.vi_content as viNewsContent, 
                 category.created_date as catCreatedDate, 
                 category.updated_date as catUpdatedDate 
                 from news INNER JOIN category ON news.category_id=category.id 
                 where news.category_id = $catId 
                 order by category.id desc;";
        return $this->db->query($sql)->result_array();
    }

    public function insert($catId, $vi_content)
    {
        $data = array(
            'category_id' => $catId,
            'vi_content' => $vi_content
        );

        $this->db->insert('news', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function insert_full($catId, $img_src, $slug, $title_header, $description_header, $keyword_header, $vi_title, $vi_content, $vi_summary)
    {
        $data = array(
            'category_id' => $catId,
            'img_src' => $img_src,
            'slug' => $slug,
            'title_header' => $title_header,
            'description_header' => $description_header,
            'keyword_header' => $keyword_header,
            'vi_title' => $vi_title,
            'vi_content' => $vi_content,
            'vi_summary' => $vi_summary
        );

        $this->db->insert('news', $data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function update($catId, $vi_content)
    {
        $data = array(
            'vi_content' => $vi_content
        );
        $this->db->where('category_id', $catId);
        $this->db->update('news', $data);
    }

    public function update_full($newsId, $catId, $img_src, $slug, $title_header, $description_header, $keyword_header, $vi_title, $vi_content, $vi_summary)
    {
        $data = array(
            'category_id' => $catId,
            'img_src' => $img_src,
            'slug' => $slug,
            'title_header' => $title_header,
            'description_header' => $description_header,
            'keyword_header' => $keyword_header,
            'vi_title' => $vi_title,
            'vi_content' => $vi_content,
            'vi_summary' => $vi_summary
        );
        $this->db->where('id', $newsId);
        $this->db->update('news', $data);
    }
    
    public function updateImage($newsId) {
        $data = array(
            'img_src' => ''
        );
        $this->db->where('id', $newsId);
        $this->db->update('news', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }
}

