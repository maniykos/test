<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ManagersCall */

$this->title = 'Create Managers Call';
$this->params['breadcrumbs'][] = ['label' => 'Managers Calls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managers-call-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
