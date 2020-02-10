<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UangMasuk */

$this->title = 'Create Uang Masuk';
$this->params['breadcrumbs'][] = ['label' => 'Uang Masuks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uang-masuk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
