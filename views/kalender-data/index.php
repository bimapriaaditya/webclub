<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KalenderDataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kalender Datas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalender-data-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Kalender Data', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama',
            'tempat',
            'tanggal_mulai',
            'estimasi_waktu_kegiatan',
            //'tanggal_selesai',
            //'id_eskul',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
