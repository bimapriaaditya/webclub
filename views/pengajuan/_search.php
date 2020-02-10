<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PengajuanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajuan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_eskul') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tujuan') ?>

    <?php // echo $form->field($model, 'data') ?>

    <?php // echo $form->field($model, 'total_biaya') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'tanggal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
