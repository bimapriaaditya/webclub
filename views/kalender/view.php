<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Kalender;

/* @var $this yii\web\View */
/* @var $model app\models\Kalender */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Kalender', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kalender-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit Data', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus Data', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <img src="<?= Yii::getAlias('@kalenderImgUrl') . '/' . $model->img ?>" width="50%" height="50%">
    <div>&nbsp;</div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            'data',
            'img',
        ],
    ]) ?>
    <?php 
    if($model->data == TRUE){ ?>
        <div style="text-align: right;">
            <a href="<?= Yii::getAlias('@kalenderDataUrl') . '/' . $model->data ?>" class="btn btn-danger"> Download File <span class="fa fa-download"></span> </a>
        </div>
    <?php }?>
</div>
