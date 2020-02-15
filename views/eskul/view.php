<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\EskulSiswa;
use app\models\LaporanKegiatan;
use app\models\LaporanBulanan;
use app\models\AlertEskul;
use app\models\Pengajuan;
use app\models\UangKas;
use app\models\UangMasuk;
use app\models\UangKeluar;
use app\models\KalenderData;
use app\models\Kalender;
use app\models\User;
/* @var $this yii\web\View */
/* @var $model app\models\Eskul */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Ektrakulikuler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="eskul-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <img src="<?= Yii::getAlias('@eskulImgUrl') . '/' .$model->img ?>" width="25%" height="25%">

    <div>&nbsp;</div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'img',
        ],
    ]) ?>

</div>
