<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eskul */

$this->title = 'Update Eskul: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Ektrakulikuler', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit Data';
?>
<div class="eskul-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
