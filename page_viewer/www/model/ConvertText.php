<?php

namespace model;

class ConvertTextDB
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if(mysqli_connect_errno()){
            die('Ошибка соединения: '.mysqli_connect_error());
        }

        $this->mysqli->query("SET lc_time_names = 'ru_RU'");
        $this->mysqli->query("SET NAMES 'utf8'");

    }

    public  function getDbText($name){
        $res = \mysqli_query($this->mysqli,"SELECT `page`.text FROM `page` INNER JOIN `link` ON `link`.page_id = `page`.id WHERE `link`.link='".$name."'");

        if($res) {
            $row = \mysqli_fetch_row($res);
            $result = $row[0];
            mysqli_free_result($res); //очищаем занятую память - она уже не нужна
        }else{
            $result = false;
        }
        mysqli_close($this->mysqli);

        return $result;

    }

}