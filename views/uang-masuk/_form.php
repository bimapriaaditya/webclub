<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\UangMasuk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uang-masuk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_eskul')->textInput() ?>

    <?= $form->field($model, 'total')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'tanggal')->widget(DatePicker::classname(),
		['name' => 'anniversary',
		'value' => '',
	    'readonly' => true,
	    'pluginOptions' => [
	        'autoclose'=>true,
	        'format' => 'yyyy/m/dd'
	    ]
	]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
