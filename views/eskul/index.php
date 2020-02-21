<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EskulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DATA EKSTRAKULIKULER';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eskul-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Eskul', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama',
            'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
