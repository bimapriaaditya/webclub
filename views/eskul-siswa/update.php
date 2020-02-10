<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EskulSiswa */

$this->title = 'Update Eskul Siswa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Eskul Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eskul-siswa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
