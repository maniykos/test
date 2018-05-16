<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ManagersCallArxive */

$this->title = 'Create Managers Call Arxive';
$this->params['breadcrumbs'][] = ['label' => 'Managers Call Arxives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managers-call-arxive-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
