<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UangKeluarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Uang Keluars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uang-keluar-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Uang Keluar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_eskul',
            'total',
            'tanggal',
            'keterangan:ntext',
            //'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
