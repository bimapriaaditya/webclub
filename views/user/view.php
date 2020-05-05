<?php

use app\models\User;
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

    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <img src="<?= Yii::getAlias('@userImgUrl') . '/' .$model->img ?>" class="profile-user-img img-responsive img-circle">

                        <h3 class="profile-username text-center"><?= $model->nama ?></h3>

                        <p class="text-muted text-center"><?= $model->role->nama ?></p>

                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <div class="box-body">
                        <strong><i class="fa fa-map-pin margin-r-5"></i> Alamat</strong>

                        <p class="text-muted">
                            <?= $model->alamat ?>
                        </p>

                        <hr>

                        <strong><i class="glyphicon glyphicon-envelope margin-r-5"></i> Email </strong>

                        <p>
                            <?= $model->email ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-phone-square margin-r-5"></i> No. Telepon</strong>

                        <p>
                            <?= $model->no_telepon ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#profile" data-toggle="tab">Informasi Profile</a></li>
                        <li><a href="#aduanku" data-toggle="tab">Aduan Ku</a></li>
                    </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="profile">
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
                            ],
                        ]) ?>
                    </div>
                    <div class="tab-pane" id="aduanku">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </div>
                </div>
            </div>
            <?php if (User::isKesiswaan()): ?>
                <?= Html::a('List Eskul', ['eskul/index'], ['class' => 'btn btn-primary']); ?>
            <?php endif ?>
            <?= Html::a('Eskul Ku', ['eskul/view', 'id' => Yii::$app->user->identity->id_role], ['class' => 'btn btn-primary']); ?>
        </div>
    </section>
</div>
