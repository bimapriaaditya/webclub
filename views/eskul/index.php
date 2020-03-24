<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EskulSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DATA EKSTRAKULIKULER';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eskul-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Eskul', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col col-md-5">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nama',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
        <div class="col col-md-7">
            <div class="col-md-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>Date</h3>
                        <p>Index Tanggal Pendidikan <br> SMKN 2 Bandung.</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-calendar" style="font-size: 90%;"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <?= Html::a('Lihat Tanggal <i class="glyphicon glyphicon-ok-circle"></i>',['/kalender/index/'], ['class' => 'small-box-footer']) ?>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Booking</h3>
                        <p>Lihat List Daftar Booking !</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-pushpin" style="font-size: 90%;"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <?= Html::a('Lihat List <i class="glyphicon glyphicon-ok-circle"></i>',['/kalender-data/index/'], ['class' => 'small-box-footer']) ?>
                    </a>
                </div>
                <div class="col-sm-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-pushpin"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Permintaan</span>
                            <span class="info-box-number" style="font-size: 150%;">20</span>
                        </div>
                     </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>User</h3>
                        <p>Lihat Daftar User !</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-user" style="font-size: 90%;"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <?= Html::a('Lihat List <i class="glyphicon glyphicon-ok-circle"></i>',['/user/index/'], ['class' => 'small-box-footer']) ?>
                    </a>
                </div>
                <div class="col-sm-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Pengguna (User)</span>
                            <span class="info-box-number" style="font-size: 150%;">20</span>
                        </div>
                     </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>Pengajuan</h3>
                        <p>Index Pengajuan Siswa <br> SMKN 2 Bandung.</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-bullhorn" style="font-size: 90%;"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <?= Html::a('Lihat Tanggal <i class="glyphicon glyphicon-ok-circle"></i>',['/pengajuan/index/'], ['class' => 'small-box-footer']) ?>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-ok"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Diterima</span>
                        <span class="info-box-number" style="font-size: 150%;">20%</span>
                        <span class="info-box-number">2</span>
                    </div>
                 </div>
            </div>
            <div class="col-sm-6">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-remove"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Ditolak</span>
                        <span class="info-box-number" style="font-size: 150%">80%</span>
                        <span class="info-box-number">10</span>
                    </div>
                 </div>
            </div>
        </div>
    </div>


</div>
