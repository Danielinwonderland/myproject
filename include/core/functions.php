<?php

$arNews = [];

function getNews($source, $limit) : array{
    $xml = $source;
    $strXML = file_get_contents($xml);
    $objXML = simplexml_load_string($strXML, 'SimpleXMLElement', LIBXML_NOCDATA);
    $jsonXml = json_encode($objXML);
    $arXml = json_decode($jsonXml, true);
  
    foreach($arXml['channel']['item'] as $item){
      $arNews[] =     [
        'title' => $item['title'],
        'id' => $item['guid'],
        'url' => 'detail.php?id=' . $item['guid'],
        'datetime' => date('H:m', strtotime($item['pubDate'])),
      ];
    }

    $arNews = array_slice($arNews, 0, $limit);

    return $arNews;
}

function getLastNews($limit=20){
    return getNews('http://k.img.com.ua/rss/ru/all_news2.0.xml', $limit);
}

function getPopularNews($limit=10){
    return getNews('http://k.img.com.ua/rss/ru/all_news2.0.xml', $limit);
}