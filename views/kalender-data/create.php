<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KalenderData */

$this->title = 'Create Kalender Data';
$this->params['breadcrumbs'][] = ['label' => 'Kalender Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kalender-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
