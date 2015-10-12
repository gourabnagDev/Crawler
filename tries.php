<?php
include("vendor/autoload.php");
use PHPHtmlParser\Dom;



$dom = new Dom();
$html = file_get_contents("http://www.washingtonpost.com");
$dom->load($html);
$links = $dom->find("a");
foreach ($links as $link) {
    $pointer = $link->getAttribute("href");
    if($pointer{0} != "h")
    {
        $pointer = "http://www.washingtonpost.com" . $pointer;
    }
    getDoc($pointer);
}

function getDoc($url){
    echo "<h1>{$url}</h1>";
    $contents = file_get_contents($url);
    $dom = new Dom();
    $dom->load($contents);
    $article = $dom->find("article");
    echo "<pre>" . $article->text() . "</pre>";
}

