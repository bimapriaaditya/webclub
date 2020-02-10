<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EskulSiswaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eskul-siswa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_eskul') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'kelas') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'no_telepon_siswa') ?>

    <?php // echo $form->field($model, 'no_telepon_orrtu') ?>

    <?php // echo $form->field($model, 'email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
