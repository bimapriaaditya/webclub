<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlertEskul */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alert-eskul-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_eskul')->textInput() ?>

    <?= $form->field($model, 'perihal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
