<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kalender-data-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tempat') ?>

    <?= $form->field($model, 'tanggal_mulai') ?>

    <?= $form->field($model, 'estimasi_waktu_kegiatan') ?>

    <?php // echo $form->field($model, 'tanggal_selesai') ?>

    <?php // echo $form->field($model, 'id_eskul') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
