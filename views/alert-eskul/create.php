<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlertEskul */

$this->title = 'Create Alert Eskul';
$this->params['breadcrumbs'][] = ['label' => 'Alert Eskuls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alert-eskul-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
