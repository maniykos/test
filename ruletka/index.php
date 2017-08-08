<?php

/**
 * Created by PhpStorm.
 * User: lezhnev oleg
 * Email: lezhnevoleg@gmail.ru
 * Date: 06.08.2017
 * Time: 11:45
 */
class ruletka
{
    private static $_instance;
    public $arr_Variants;
//    public $arrFieldsCount = 0;

    // защищает класс от new
    public function __construct()
    {

        if (isset($_POST['fieldsCount']) && isset($_POST['chipCount'])) {
            $chipCount = intval($_POST['chipCount']) ? intval($_POST['chipCount']) : 0;
            $fieldsCount = intval($_POST['fieldsCount']) ? intval($_POST['fieldsCount']) : 0;

            if ($chipCount < $fieldsCount) {
                $this->arr_Variants = array_unique($this->getArr_variants($chipCount, $fieldsCount));
                //Запись в файл
                try {
                    $filename = 'result_version.txt';
                    if (count($this->arr_Variants) < 10) {
                        $text = "менее 10 вариантов \n";
                    } else {
                        $text = count($this->arr_Variants) . " вариантов\n";
                    }

                    $text .= implode("\n", $this->arr_Variants);
                    $handler = fopen($filename, "w");
                    fwrite($handler, $text);
                    echo json_encode(['success' => true, 'error' => '', 'item' => 'записан в файл ' . $filename]);
                    exit();
                } catch (Exception $ex) {
                    //Выводим сообщение об исключении.
                    echo json_encode(['success' => false, 'error' => $ex->getMessage(), 'item' => '']);
                    exit();
                }
            } else {
                echo json_encode(['success' => false, 'error' => 'Не правильно заполнены поля', 'item' => '']);
                exit();
            }

        } else {
            include "form.html"; //подключаем html-код
        }


    }

    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Возвращает массив комбинаций, учитывая количество фишек
     *
     * @param int $chipCount - количество фишек
     * @param int $fieldsCount - количество ячеек
     *
     * @return array
     */
    function getArr_variants($chipCount = 2, $fieldsCount = 4, $oldString = array())
    {
        static $R = array();
        $position = 0;
        $arrString = array();

        if ($chipCount < 1) {
            $R[] = implode("", $oldString);
            return false;
        }

        for ($position; $position <= $fieldsCount - 1; $position++) {
            if (count($oldString) > 0) {
                $arrString = $oldString;
            } else {
                $arrString = array();
                for ($j = 0; $j <= $fieldsCount - 1; $j++) {
                    $arrString[$j] = '0';
                }
            }

            if ($arrString[$position] != 1) {
                $arrString[$position] = 1;
                $arrR = $arrString;
                $this->getArr_variants($chipCount - 1, $fieldsCount, $arrString);
            }

        }

        return $R;
    }
}

$pp = ruletka::getInstance();



