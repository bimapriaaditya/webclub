<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kalender */

$this->title = 'Edit Kalender: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kalender', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit Data';
?>
<div class="kalender-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
