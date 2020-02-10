<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanBulananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Bulanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-bulanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Laporan Bulanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_eskul',
            'tanggal',
            'data',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
