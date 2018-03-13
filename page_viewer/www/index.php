<?php

require_once('config/base.php');
require_once('controller/PageViewerController.php');
require_once('components/View.php');
require_once('components/ConvertText.php');
require_once('model/ConvertText.php');

define('ROOT',realpath(dirname(__FILE__)));

use components\View as View;
use components\ConvertText as ConvertText;
use model\ConvertText as ConvertTextDB;


$PageViewerView = new \controller\PageViewerController();
$PageViewerView->actionPage();

?>