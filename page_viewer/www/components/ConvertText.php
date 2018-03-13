<?php

namespace components;

class ConvertText
{
    
    public function allHtml($text){

        //replace links
        $text=  preg_replace('/(https*:\/\/[^\s]*)/', "<a href='\$1'>\$1</a>", $text);

        //replace emails
        $text=  preg_replace('/([\w\d\_]+@[\w\d\_]+\.[\w\d]{2,6})/', "<a href='mailto:\$1'>\$1</a>", $text);

        return $text;
    }

}