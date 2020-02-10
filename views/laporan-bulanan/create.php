<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LaporanBulanan */

$this->title = 'Create Laporan Bulanan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Bulanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-bulanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
