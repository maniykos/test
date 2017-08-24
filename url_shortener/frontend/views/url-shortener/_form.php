<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UrlShortener */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="url-shortener-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'long_url')->textInput(['maxlength' => true]) ->hint('Введите любой текст') ?>

    <div class="form-group field-urlshortener-short_url required <?= $model->errors['short_url'] ? 'has-error' : ''?>">
        <?= Html::activeLabel($model, 'short_url') ?>
        <div class="field"><?= Html::activeTextInput($model, 'short_url', ['class' => 'form-control', 'maxlength' =>Yii::$app->params['urlShortener']['max_length']]) ?></div>
        <?= Html::error($model, 'short_url', ['class' => 'help-block']) ?>
        <div class="hint-block">Allowed characters: '<?= Yii::$app->params['urlShortener']['allowed_chars'] ?>' . Allowed length: <?= Yii::$app->params['urlShortener']['max_length'] ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
