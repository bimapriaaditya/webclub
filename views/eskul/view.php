<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use rmrevin\yii\fontawesome\FAS;
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

    <div>
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
        <div class="box box-danger">
            <div class="box-header with-border">
                <h2 class="box-title"> - LAPORAN KEGIATAN - </h2>
            </div>
            <div class="box-body">
                <table class="table table-borderd table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Laporan</th>
                            <th>Action</th>
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
                <div class="col-sm-4">
                    <div class="box-body">
                        <div class="box box-primary" style="padding: 2%;">
                            <h4 class="box-title"> - UANG MASUK - </h4>
                            <?= Html::img('http://localhost/webclub/images/inti_img/uang1.png',['width' => '100%','height' => '100%']); ?>
                            <div>&nbsp;</div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim 
                            </p>
                            <div class="box-footer">
                                <div class="col-md-12">
                                    <?= Html::a('Data Uang Masuk',['/uang-masuk/create'], ['class' => 'btn btn-primary btn-block']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box-body">
                        <div class="box box-primary" style="padding: 2%;">
                            <h4 class="box-title"> - UANG KELUAR - </h4>
                            <?= Html::img('http://localhost/webclub/images/inti_img/uang3.png',['width' => '100%','height' => '100%']); ?>
                            <div>&nbsp;</div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                            </p>
                            <div class="box-footer">
                                <div class="col-md-12">
                                    <?= Html::a('Data Uang Keluar',['/uang-keluar/create'], ['class' => 'btn btn-primary btn-block']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box-body">
                        <div class="box box-primary" style="padding: 2%;">
                            <h4 class="box-title"> - UANG KAS - </h4>
                            <?= Html::img('http://localhost/webclub/images/inti_img/uang4.png',['width' => '100%','height' => '100%']); ?>
                            <div>&nbsp;</div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                            </p>
                            <div class="box-footer">
                                <div class="col-md-12">
                                    <?= Html::a('Data Uang Kas',['/uang-kas/create'], ['class' => 'btn btn-primary btn-block']) ?>
                                </div>
                            </div>
                        </div>
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
                                    <td><?= $UangMasuk->tanggal ?></td>
                                    <td><?= $UangMasuk->tanggal ?></td>
                                    <td><?= $UangMasuk->total ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <center>
                        <h4> <u class="fa fa-angle-double-down"> 
                                Uang Keluar  <i class="fa fa-angle-double-down"></i> 
                            </u> 
                        </h4>
                    </center>
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
                                    <td><?= $UangMasuk->tanggal ?></td>
                                    <td><?= $UangMasuk->tanggal ?></td>
                                    <td><?= $UangMasuk->total ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <center>
                        <h4> <u class="fa fa-angle-double-down"> 
                                Uang KAS  <i class="fa fa-angle-double-down"></i> 
                            </u> 
                        </h4>
                    </center>
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
                                    <td><?= $UangMasuk->tanggal ?></td>
                                    <td><?= $UangMasuk->tanggal ?></td>
                                    <td><?= $UangMasuk->total ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
</div>
