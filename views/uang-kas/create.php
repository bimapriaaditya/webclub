<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UangKas */

$this->title = 'Create Uang Kas';
$this->params['breadcrumbs'][] = ['label' => 'Uang Kas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uang-kas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
