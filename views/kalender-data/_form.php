<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kalender-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_mulai')->textInput() ?>

    <?= $form->field($model, 'estimasi_waktu_kegiatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_selesai')->textInput() ?>

    <?= $form->field($model, 'id_eskul')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
