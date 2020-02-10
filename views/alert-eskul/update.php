<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlertEskul */

$this->title = 'Update Alert Eskul: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Alert Eskuls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alert-eskul-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
