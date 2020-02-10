<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EskulSiswa */

$this->title = 'Create Eskul Siswa';
$this->params['breadcrumbs'][] = ['label' => 'Eskul Siswas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eskul-siswa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
