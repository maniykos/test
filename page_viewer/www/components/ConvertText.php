<?php

namespace components;

class ConvertText
{
    
    public function allHtml($text){

        // change url
        $regexUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if(preg_match($regexUrl, $text, $url)) {
            $text = preg_replace($regexUrl, '<a href="'.$url[0].'">'.$url[0].'</a>', $text);
        }

        // change email
        $regexEmail="/([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})/";
        if(preg_match($regexEmail, $text, $email)) {
            $text = preg_replace($regexEmail, '<a href="mailto:'.$email[0].'">'.$email[0].'</a>', $text);
        }

        return $text;
    }

}