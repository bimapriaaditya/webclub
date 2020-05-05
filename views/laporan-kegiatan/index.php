<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanKegiatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Kegiatan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-kegiatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Laporan Kegiatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_eskul',
            'nama',
            'data',
            'tanggal',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
