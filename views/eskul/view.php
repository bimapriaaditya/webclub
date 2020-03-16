<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\fontawesome\FAS;
use app\models\EskulSiswa;
use app\models\LaporanKegiatan;
use app\models\LaporanBulanan;
use app\models\AlertEskul;
use app\models\Pengajuan;
use app\models\UangKas;
use app\models\UangMasuk;
use app\models\UangKeluar;
use app\models\KalenderData;
use app\models\Kalender;
use app\models\User;
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
                            <div class="col-sm-6">
                                <?= Html::a('<i class="glyphicon glyphicon-pencil"></i> Edit Data', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-block']) ?>
                                
                            </div>
                            <div class="col-sm-6">
                                <?= Html::a('<i class="glyphicon glyphicon-trash"></i> Hapus Data', ['delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger btn-block',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
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
                    <table class="table table-borderd table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Alamat</th>
                                <th>No.Telepon Pribadi</th>
                                <th>No.Telepon Orang Tua</th>
                                <th>Alamat Email</th>
                                <th>&nbsp;</th>
                            </tr>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach (EskulSiswa::find()
                                ->andWhere(['id_eskul' => $model->id])
                                ->all() as $EskulSiswa):?>

                                <tr>
                                   <td> <?= $no++ ?> </td> 

                                   <td> <?= $EskulSiswa->nama;?></td>

                                   <td> <?= $EskulSiswa->kelas;?></td>

                                   <td> <?= $EskulSiswa->alamat;?></td>

                                   <td> <?= $EskulSiswa->no_telepon_siswa;?></td>

                                   <td> <?= $EskulSiswa->no_telepon_orrtu;?></td>

                                   <td> <?= $EskulSiswa->email;?></td>

                                   <td>
                                       <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/eskul-siswa/update', 'id' => $EskulSiswa->id]); ?>
                                       <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/eskul-siswa/delete','id' => $EskulSiswa->id],[
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                ]
                                            ]); 
                                        ?>
                                   </td>
                                </tr>

                            <?php endforeach ?>
                        </tbody>
                        </thead>
                    </table>
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
                    <table class="table table-borderd table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th style="text-align: center;">Nama Kegiatan</th>
                                <th style="text-align: center;">Tanggal Kegiatan</th>
                                <th style="text-align: center;">Laporan</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach (LaporanKegiatan::find()
                                ->andWhere(['id_eskul' => $model->id])
                                ->all() as $LaporanKegiatan):?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $LaporanKegiatan->nama ?></td>
                                    <td><?= $LaporanKegiatan->tanggal ?></td>
                                    <td><?= $LaporanKegiatan->data ?></td>
                                    <td>
                                        <?= Html::a('<i class="fas fa-download" style="color:green;"></i> ', [Yii::getAlias('@laporan_kegiatanDataUrl' . '/' . $LaporanKegiatan->data)]); ?>
                                        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/laporan-kegiatan/update', 'id' => $LaporanKegiatan->id]); ?>
                                       <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/laporan-kegiatan/delete','id' => $LaporanKegiatan->id],[
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                ]
                                            ]); 
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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
            <table class="table table-borderd table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bulan</th>
                        <th>Tanggal Kirim</th>
                        <th>Data</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach (LaporanBulanan::find()
                        ->andWhere(['id_eskul' => $model->id])
                        ->all() as $LaporanBulanan):?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $LaporanBulanan->tanggal ?></td>
                            <td><?= $LaporanBulanan->tanggal ?></td>
                            <td><?= $LaporanBulanan->data ?></td>
                            <td>
                                <?= Html::a('<i class="fas fa-download" style="color:green;"></i> '); ?>
                                <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/laporan-bulanan/update', 'id' => $LaporanBulanan->id]); ?>
                               <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/laporan-bulanan/delete','id' => $LaporanBulanan->id],[
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ]
                                    ]); 
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
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
                <table class="table table-borderd table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach (UangMasuk::find()
                            ->andWhere(['id_eskul' => $model->id])
                            ->all() as $UangMasuk):?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $UangMasuk->keterangan ?></td>
                                <td><?= $UangMasuk->tanggal ?></td>
                                <td><?= $UangMasuk->total ?></td>
                                <td>
                                    <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/uang-masuk/update', 'id' => $UangMasuk->id]); ?>
                                    <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/uang-masuk/delete','id' => $UangMasuk->id],[
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ]
                                        ]); 
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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
                <table class="table table-borderd table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach (UangKas::find()
                            ->andWhere(['id_eskul' => $model->id])
                            ->all() as $UangKas):?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $UangKas->nama ?></td>
                                <td><?= $UangKas->tanggal ?></td>
                                <td><?= $UangKas->total ?></td>
                                <td>
                                    <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/uang-kas/update', 'id' => $UangKas->id]); ?>
                                    <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/uang-kas/delete','id' => $UangKas->id],[
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ]
                                        ]); 
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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
                <table class="table table-borderd table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Img</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            foreach (UangKeluar::find()
                            ->andWhere(['id_eskul' => $model->id])
                            ->all() as $UangKeluar):?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $UangKeluar->keterangan ?></td>
                                <td><?= $UangKeluar->tanggal ?></td>
                                <td><?= $UangKeluar->total ?></td>
                                <td><?= $UangKeluar->img ?></td>
                                <td>
                                    <?= Html::a('<i class="fas fa-download" style="color:green;"></i> '); ?>
                                    <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/uang-keluar/update', 'id' => $UangKeluar->id]); ?>
                                    <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/uang-keluar/delete','id' => $UangKeluar->id],[
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ]
                                        ]); 
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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
                     <table class="table table-borderd table-hover">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Nama</th>
                                 <th>Tempat</th>
                                 <th>Tanggal Mulai</th>
                                 <th>Estimasi Waktu</th>
                                 <th>Tanggal Selesai</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             $no = 1;
                             foreach (KalenderData::find()
                                ->andWhere(['id_eskul' => $model->id])
                                ->all() as $KalenderData):?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $KalenderData->nama ?></td>
                                <td><?= $KalenderData->tempat ?></td>
                                <td><?= $KalenderData->tanggal_mulai ?></td>
                                <td><?= $KalenderData->estimasi_waktu_kegiatan ?></td>
                                <td><?= $KalenderData->tanggal_selesai ?></td>
                                <td><?= $KalenderData->status ?></td>
                                <td>
                                    <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/kalender-data/update', 'id' => $KalenderData->id]); ?>
                                    <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/kalender-data/delete','id' => $KalenderData->id],[
                                            'data' => [
                                                'confirm' => 'Are you sure you want to delete this item?',
                                                'method' => 'post',
                                            ]
                                        ]); 
                                    ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                         </tbody>
                     </table>
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
                    <table class="table table-borderd table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Dibuat Pada</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach(Pengajuan::find()
                                ->andWhere(['id_eskul' => $model->id])
                                ->all() as $Pengajuan):?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $Pengajuan->nama ?></td>
                                    <td><?= $Pengajuan->type ?></td>
                                    <td><?= $Pengajuan->tanggal ?></td>
                                    <td><?= $Pengajuan->status ?></td>
                                    <td>
                                        <?= Html::a('<i class="glyphicon glyphicon-edit"></i> ', ['/kalender/update', 'id' => $Pengajuan->id]); ?>
                                        <?= Html::a('<i class="glyphicon glyphicon-trash" style="color:red;"></i>',['/kalender/delete','id' => $Pengajuan->id],[
                                                'data' => [
                                                    'confirm' => 'Are you sure you want to delete this item?',
                                                    'method' => 'post',
                                                ]
                                            ]); 
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
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
</div>