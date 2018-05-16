<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ManagersBonus */

$this->title = 'Create Managers Bonus';
$this->params['breadcrumbs'][] = ['label' => 'Managers Bonuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="managers-bonus-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
