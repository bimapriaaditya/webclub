<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanKegiatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-kegiatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_eskul')->textInput() ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->fileInput() ?>

    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(),
		['name' => 'anniversary',
		'value' => '',
	    'readonly' => true,
	    'pluginOptions' => [
	        'autoclose'=>true,
	        'format' => 'yyyy-m-dd'
	    ]
	]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
