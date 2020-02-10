<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UangMasuk */

$this->title = 'Update Uang Masuk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Uang Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uang-masuk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
