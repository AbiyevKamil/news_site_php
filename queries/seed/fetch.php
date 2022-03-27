<?php
// include "../../libs/simple_html_dom.php";
include "/AppServ/www/sdf/news_site_php/libs/simple_html_dom.php";
function fetchData()
{
  $data = array();
  $base_url = "https://report.az/";
  $html = file_get_html($base_url);
  foreach ($html->find("div.rest-news<div.news-block") as $news_block) {
    $title = $news_block->find("div.info>a")[0]->plaintext;
    // $date = $news_block->find("div.news-date>span")[0]->plaintext . " " . $news_block->find("div.news-date>span")[1]->plaintext;
    $img = $news_block->find("div.image>a>img")[0]->attr['data-src'];
    $details_link = "https://report.az" . $news_block->find("div.image>a")[0]->attr['href'];
    $details_html = file_get_html($details_link);
    $details = "";
    foreach ($details_html->find("div.editor-body<p") as $element) {
      $details = $details . $element->plaintext;
    }
    $details;
    $single = array(
      "title" => $title,
      // "date" => $date,
      "img" => "default_blog.jpeg",
      "details" => $details,
      // "author" => $base_url,
    );
    if (count($data) == 15)
      break;
    array_push($data, $single);
  }
  return $data;
}
fetchData();