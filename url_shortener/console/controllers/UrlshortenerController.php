<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\Url;
use frontend\models\UrlShortener;

/**
 * Console commands for [[Url Shortener]] module
 *
 * @author Lezhnev
 * @since 1.0.0
 *
 * php yii urlshortener/clean
 */
class UrlshortenerController extends Controller
{

    /**
     * remove origin-short url pair from DB on the 15th day after
     */
    public function actionClean()
    {
        try {
            echo 'Deleted: ' . UrlShortener::deleteOldUrl();
        } catch (ErrorException $e) {
            Yii::error(
                "Error: " . $e->getMessage(), 'Url Shortener'
            );
        }

    }


}