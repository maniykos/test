<?php

$json = file_get_contents('php://input');
$data = json_decode($json, JSON_BIGINT_AS_STRING);

if(!empty($data)){
    $doc = new DOMDocument();
    $doc->load('messages.xml');

    //Создаем новый элемент
    $root = $doc->getElementsByTagName("messages")->item(0);

    $newMessage = $doc->createElement('message');
    $newMessage->setAttribute("id", $doc->getElementsByTagName("message")->length + 1 );
    $newMessage->setAttribute("parent_id", intval( $data['parent_id']));
    $newMessage->setAttribute("name", trim($data['name']));
    $newMessage->setAttribute("ava_url", trim($data['ava_url']));
    $newMessage->setAttribute("date", date('d-m-y G:i:s'));

    $newMessageText = $doc->createTextNode(trim($data['text']));
    $newMessage->appendChild($newMessageText);
    $root->appendChild($newMessage);

    $doc->save('messages.xml');

    echo json_encode(array('success' => true));
}else{
    echo json_encode(array('success' => false));
}