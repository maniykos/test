<?php
namespace controller;

use model\ConvertTextDB;
use components\View;
use components\ConvertText;

class PageViewerController{
	
	public function __construct(){}

	public function actionPage(){

        $model['text'] = 'Выберите файл для отображения';
        $model['title'] = '';

		if(isset($_POST['file_name'])&&!empty($_POST['file_name']))
		{
		    $file_name = trim($_POST['file_name']);
            $file_path = ROOT . '/pages/' . $file_name;

            $convertTextDB = new ConvertTextDB();

            if(file_exists($file_path))
            {
                $text =  file_get_contents($file_path);

                $textConvert = new ConvertText();
                $text = $textConvert->allHtml($text);

                $model['text'] = $text;
            }elseif($text = $convertTextDB->getDbText($file_name)) {
                $model['text'] = $text;
            }else{
                $model['text'] = 'Файл не найден';
            }

            $view = new View('index.php');
            $view->assign('model', $model);

		}
		else {
            $view = new View('index.php');
            $view->assign('model', $model);
		}
	}
}
?>