<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Url Shorteners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-shortener-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Url Shortener', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'long_url:url',
            [
                'attribute' => 'short_url',
                'content' => function ($data) {
                    $short_url = Url::toRoute(['url-shortener/redirect', 'short' => $data->short_url], true);
                    return Html::a($short_url, $short_url);
                }
            ],
            [
                'attribute' => 'publish_date',
                'format' => ['date', 'php:d-m-Y']
            ],
            'count_activations',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
