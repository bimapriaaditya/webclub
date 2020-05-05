<?php

use app\models\AlertEskul;
use app\models\EskulSiswa;
use app\models\EskulSiswaSearch;
use app\models\Kalender;
use app\models\KalenderData;
use app\models\LaporanBulanan;
use app\models\LaporanKegiatan;
use app\models\LaporanKegiatanSearch;
use app\models\Pengajuan;
use app\models\UangKas;
use app\models\UangKeluar;
use app\models\UangMasuk;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\fontawesome\FAS;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Eskul */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Data Ektrakulikuler', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="eskul-view">

    <div>&nbsp;</div>

    <div class="row">
        <div class="col-sm-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title"> Logo </h2>
                </div>

                <div class="box-body" style="height: 300px">
                    <?= Html::img('@eskulImgUrl/' .$model->img,['width' => '100%','height' => '100%']); ?>
                </div>
            </div>
            
        </div>
        <div class="col-sm-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title"> <?= $this->title; ?></h2>
                </div>

                <div class="box-body" style="height: 235px">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'nama',
                            'img',
                        ],
                    ]) ?>
                </div>

                <div class="box-footer">
                    <p>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Edit Data', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
                                
                            </div>
                            <div class="col-sm-4">
                                <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Hapus Data', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger btn-block',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            </div>
                            <div class="col-sm-4">
                                <?= Html::a('<i class="glyphicon glyphicon-warning-sign"></i> Alert', ['/alert-eskul/create/'], ['class' => 'btn btn-warning btn-block']) ?>
                                
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?= Html::a('Tambah Siswa', ['/eskul-siswa/create', 'id_eskul' => $model->id], ['class' => 'btn btn-success']) ?>

    <div>&nbsp;</div>
    <div class="row">
        <div class="col col-sm-12">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h2 class="box-title"> - DATA SISWA - </h2>
                </div>
                <div class="box-body">
                    <?php
                    $searchModel = new EskulSiswaSearch();
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nama',
                            'kelas',
                            'alamat:ntext',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=eskul-siswa/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=eskul-siswa/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=eskul-siswa/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <?= Html::a('Tambah Laporan Kegiatan', ['/laporan-kegiatan/create'], ['class' => 'btn btn-success']) ?>
    <div>&nbsp;</div>   
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h2 class="box-title"> - LAPORAN KEGIATAN - </h2>
                </div>
                <div class="box-body">
                    <?php
                    $dataProvider = $dataProvider = new ActiveDataProvider([
                        'query' => LaporanKegiatan::find()->andWhere(['id_eskul' => $model->id]),
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nama',
                            'data',
                            'tanggal',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=laporan-kegiatan/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=laporan-kegiatan/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=laporan-kegiatan/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>  
        </div>
    </div>
    <!-- LAPORAN BULANAN -->
    <?= Html::a('Tambah Laporan Bulanan', ['/laporan-bulanan/create'], ['class' => 'btn btn-success']) ?>
    <div>&nbsp;</div>   
    <div class="box box-danger">
        <div class="box-header with-border">
            <h2 class="box-title"> - LAPORAN BULANAN - </h2>
        </div>
        <div class="box-body">
            <?php
            $dataProvider = $dataProvider = new ActiveDataProvider([
                'query' => LaporanBulanan::find()->andWhere(['id_eskul' => $model->id]),
            ]);
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'tanggal',
                    'data',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            'view' => function ($url, $model) {
                            $url ='index.php?r=laporan-bulanan/view&id='.$model->id;
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                        'title' => Yii::t('app', 'view'),
                            ]);
                        },

                        'update' => function ($url, $model) {
                            $url ='index.php?r=laporan-bulanan/update&id='.$model->id;
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                        'title' => Yii::t('app', 'update'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            $url ='index.php?r=laporan-bulanan/delete&id='.$model->id;
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                        'title' => Yii::t('app', 'delete'),
                            ]);
                        }
                      ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
    <!-- END OF LAPORAN BULANAN -->
    <!-- SELECT LAPORAN KEUANGAN -->
    <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box Uang Masuk -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h4><b>Uang Keluar</b></h4>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <?= Html::a('Tambah Data <i class="fa fa-arrow-circle-right"></i>',['/uang-keluar/create'], ['class' => 'small-box-footer']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
        <!-- small box Uang Keluar -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h4><b>Uang Masuk</b></h4>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <div class="icon">
                    <i class="glyphicon glyphicon-download-alt" style="font-size: 90%;"></i>
                </div>
                 <?= Html::a('Tambah Data <i class="fa fa-arrow-circle-right"></i>',['/uang-masuk/create'], ['class' => 'small-box-footer']) ?>
            </div>
        </div>
        <div class="col-lg-4 col-xs-6">
        <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h4><b>Uang KAS</b></h4>
                    <p>Lorem ipsum dolor sit amet</p>
                </div>
                <div class="icon">
                    <i class="glyphicon glyphicon-list-alt" style="font-size: 90%;"></i>
                </div>
                 <?= Html::a('Tambah Data <i class="fa fa-arrow-circle-right"></i>',['/uang-kas/create'], ['class' => 'small-box-footer']) ?>
            </div>
        </div>
    </div>
    <!-- END OF SELECTION -->
    <!-- DATA LAPORAN KEUANGAN -->
    <div class="box box-success">
        <div class="box-header with-border">
            <h2 class="box-title"> - LAPORAN KEUANGAN - </h2>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <center>
                    <h4> <u class="fa fa-angle-double-down"> 
                            Uang Masuk  <i class="fa fa-angle-double-down"></i> 
                        </u> 
                    </h4>
                </center>
                <!-- Table Uang Masuk -->
                <?php
                    $dataProvider = $dataProvider = new ActiveDataProvider([
                        'query' => UangMasuk::find()->andWhere(['id_eskul' => $model->id]),
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'total',
                            'tanggal',
                            'keterangan',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=uang-masuk/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=uang-masuk/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=uang-masuk/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                <!-- End Of Table Uang Masuk -->
            </div>
            <div class="col-sm-6">
                <center>
                    <h4> <u class="fa fa-angle-double-down"> 
                            Uang KAS  <i class="fa fa-angle-double-down"></i> 
                        </u> 
                    </h4>
                </center>
                <!-- Table Uang KAS -->
                <?php
                    $dataProvider = $dataProvider = new ActiveDataProvider([
                        'query' => UangKas::find()->andWhere(['id_eskul' => $model->id]),
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'id_eskul',
                            'nama',
                            'tanggal',
                            'total',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=uang-kas/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=uang-kas/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=uang-kas/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                <!-- End of Table KAS -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <center>
                    <h4> <u class="fa fa-angle-double-down"> 
                            Uang Keluar  <i class="fa fa-angle-double-down"></i> 
                        </u> 
                    </h4>
                </center>
                <!-- Table Uang Keluar -->
                <?php
                    $dataProvider = $dataProvider = new ActiveDataProvider([
                        'query' => UangKeluar::find()->andWhere(['id_eskul' => $model->id]),
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'keterangan',
                            'tanggal',
                            'total',
                            'img',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=uang-keluar/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=uang-keluar/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=uang-keluar/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                <!-- End of Uang Keluar -->
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="row">
        <!-- Total Uang Keluar -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-minus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Uang Keluar</span>
                    <span class="info-box-number">Rp. 00.000.000,-</span>
                </div>
             </div>
        </div>
        <!-- Total Uang Masuk -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-plus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Uang Masuk</span>
                    <span class="info-box-number">Rp. 00.000.000,-</span>
                </div>
             </div>
        </div>
        <!-- Total Uang Kas -->
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-th-list"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Uang KAS</span>
                    <span class="info-box-number">Rp. 00.000.000,-</span>
                </div>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-orange"><i class="glyphicon glyphicon-tags"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Uang Eskul Saat Ini</span>
                    <span class="info-box-number">Rp. 00.000.000,-</span>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Date</h3>
                    <p>Lihat Tanggal Pendidikan <br> SMKN 2 Bandung.</p>
                </div>
                <div class="icon">
                    <i class="glyphicon glyphicon-calendar" style="font-size: 90%;"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <?= Html::a('Lihat Tanggal <i class="fa fa-arrow-circle-right"></i>',['/kalender/index/'], ['class' => 'small-box-footer']) ?>
                </a>
            </div>
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Booking</h3>
                    <p><i>Booking</i> Tanggal Kegiatan Acara<br> Biar Gak Bentrok Sama Eskul Lain</p>
                </div>
                <div class="icon">
                    <i class="glyphicon glyphicon-pushpin" style="font-size: 90%;"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <?= Html::a('Ajukan Tanggal <i class="fa fa-arrow-circle-right"></i>',['/kalender-data/create/'], ['class' => 'small-box-footer']) ?>
                </a>
            </div>
            <div class="small-box bg-red">
                    <div class="inner">
                        <h2><b>Booking List</b></h2>
                        <p>Lihat Daftar Booking yang Telah <br> Dibuat oleh Eskul Lain Juga</p>
                    </div>
                    <div class="icon">
                        <i class="glyphicon glyphicon-eye-open" style="font-size: 90%;"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        <?= Html::a('Lihat Tanggal <i class="fa fa-arrow-circle-right"></i>',['/kalender-data/index/'],['class' => 'small-box-footer'])  ?>
                    </a>
                </div>
        </div>
        <div class="col-lg-8">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h2 class="box-title"> - <b>BOOKINGAN </b> <?= $this->title; ?> - </h2>
                </div>
                <div class="box-body">
                     <?= Html::a('Booking Tanggal',['/uang-kas/create'],['class' => 'btn btn-success']) ?>
                     <?php
                    $dataProvider = $dataProvider = new ActiveDataProvider([
                        'query' => KalenderData::find()->andWhere(['id_eskul' => $model->id]),
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nama',
                            'tempat',
                            'tanggal_mulai',
                            'tanggal_selesai',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=kalender-data/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=kalender-data/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=kalender-data/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-ok"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Diterima</span>
                    <span class="info-box-number" style="font-size: 150%;">20%</span>
                    <span class="info-box-number">2</span>
                </div>
             </div>
        </div>
        <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="glyphicon glyphicon-remove"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Ditolak</span>
                    <span class="info-box-number" style="font-size: 150%">80%</span>
                    <span class="info-box-number">10</span>
                </div>
             </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h2 class="box-title">- LIST PENGAJUAN -</h2>
                </div>
                <div class="box-body">
                    <?= Html::a('Buat Pengajuan',['/pengajuan/create/'],['class' => 'btn btn-success']) ?>
                    <div>&nbsp;</div>
                    <?php
                    $dataProvider = $dataProvider = new ActiveDataProvider([
                        'query' => Pengajuan::find()->andWhere(['id_eskul' => $model->id]),
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nama',
                            'type',
                            'tanggal',
                            'status',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=pengajuan/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=pengajuan/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=pengajuan/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Pengajuan</h3>
                    <p>Ajukan yang Anda Inginkan <br> ke Sekolah</p>
                </div>
                <div class="icon">
                    <i class="glyphicon glyphicon-stats" style="font-size: 90%;"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <?= Html::a('Ajukan Data <i class="fa fa-arrow-circle-right"></i>',['/pengajuan/create/'], ['class' => 'small-box-footer']) ?>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h2 class="box-title">PERINGATAN !!!</h2>
                </div>
                <div class="box-body">
                    <?php
                    $dataProvider = $dataProvider = new ActiveDataProvider([
                        'query' => AlertEskul::find()->andWhere(['id_eskul' => $model->id]),
                    ]);
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'perihal',
                            'text',
                            'tanggal',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                    $url ='index.php?r=alert/view&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                                'title' => Yii::t('app', 'view'),
                                    ]);
                                },

                                'update' => function ($url, $model) {
                                    $url ='index.php?r=alert/update&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                                'title' => Yii::t('app', 'update'),
                                    ]);
                                },
                                'delete' => function ($url, $model) {
                                    $url ='index.php?r=alert/delete&id='.$model->id;
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                                'title' => Yii::t('app', 'delete'),
                                    ]);
                                }
                              ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>