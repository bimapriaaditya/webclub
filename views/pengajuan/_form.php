<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengajuan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pengajuan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_eskul')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList([ 'proposal' => 'Proposal', 'surat_izin' => 'Surat izin', 'pengajuan_data' => 'Pengajuan data', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tujuan')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_biaya')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
