<?php

$doc = new DOMDocument();
$doc->load('messages.xml');

$massages = $doc->getElementsByTagName("message");
$comments = array();

foreach ($massages as $key => $massage) {
    $comments[$key]['id'] = $massage->getAttribute('id');
    $comments[$key]['parent_id'] = $massage->getAttribute('parent_id');
    $comments[$key]['name'] = $massage->getAttribute('name');
    $comments[$key]['ava_url'] = $massage->getAttribute('ava_url');
    $comments[$key]['date'] = $massage->getAttribute('date');
    $comments[$key]['text'] = $massage->nodeValue;
}
echo json_encode($comments);