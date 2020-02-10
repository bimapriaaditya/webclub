<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eskul */

$this->title = 'Tambah Data Ekstrakulikuler';
$this->params['breadcrumbs'][] = ['label' => 'Data Ekstrakulikuler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eskul-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
