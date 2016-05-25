<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------

if ( ! function_exists('getThumbnailFromYoutubeLink'))
{

    function getThumbnailFromYoutubeLink($youtube_link){
        if(strpos($youtube_link,'embed')!==false){
            //embed link.
            $video_id = substr(str_replace('embed/','',$youtube_link),strripos($youtube_link,'embed/'));
        }else{
            $video_id = substr(str_replace('watch?v=','',$youtube_link),strripos($youtube_link,'watch?v='));
        }
        return "http://img.youtube.com/vi/$video_id/0.jpg";
    }

    //$save_path = 'assets/upload/images/news/';
    function saveImgAndUpdateContent($save_path,$content){
        try{
            $doc = new DOMDocument();
            //$doc->loadHTML($content);
            $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
            $img_tags = $doc->getElementsByTagName('img');

            foreach ($img_tags as $item )
            {
                $src =  $item->getAttribute('src');
                if(strpos($src,'base64')!==false){
                    $arr = explode(',',$src);
                    $decoded = base64_decode($arr[1]);//decode base64

                    //save file after decoded
                    $data_filename = $item->getAttribute('data-filename');
                    $file_path = './' . $save_path . $data_filename;
                    $absolute_path = base_url() . '/' . $save_path . $data_filename;
                    file_put_contents($file_path,$decoded);

                    $item->setAttribute('src',$absolute_path);
                }else{
                    saveImgFromUrl($save_path,$src);
                    $data_filename = basename($src);
                    $absolute_path = base_url() . '/' . $save_path . $data_filename;
                    $item->setAttribute('src',$absolute_path);
                }
            }
            $content = $doc->saveHTML();
            return $content;

        }catch(Exception $e){
            return '';
        }
    }

    //$save_path = 'assets/upload/images/news/';
    function saveImgFromUrl($save_path,$url){
        // maximum execution time in seconds
        set_time_limit (24 * 60 * 60);

        $destination_folder = './' . $save_path;

        $newfname = $destination_folder . basename($url);

        $file = fopen ($url, "rb");
        if ($file) {
            $newf = fopen ($newfname, "wb");

            if ($newf)
                while(!feof($file)) {
                    fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
                }
        }

        if ($file) {
            fclose($file);
        }

        if ($newf) {
            fclose($newf);
        }
    }

}
