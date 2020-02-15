<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h4 style="color:orange;">
        <strong><?= $model->role->nama ?></strong>
    </h4>

    <img src="<?= Yii::getAlias('@userImgUrl') . '/' .$model->img ?>" height="25%" width="25%">

    <div>&nbsp;</div>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama',
            'email:email',
            'password',
            [
                'label' => 'Status',
                'value' => $model->role->nama
            ],
            'no_telepon',
            'alamat:ntext',
            'img',
        ],
    ]) ?>

</div>
