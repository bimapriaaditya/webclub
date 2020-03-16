<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kalender_data".
 *
 * @property int $id
 * @property string $nama
 * @property string $tempat
 * @property string $tanggal_mulai
 * @property string $estimasi_waktu_kegiatan
 * @property string $tanggal_selesai
 * @property int $id_eskul
 * @property int $status
 */
class KalenderData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kalender_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'tempat', 'tanggal_mulai', 'estimasi_waktu_kegiatan', 'tanggal_selesai', 'id_eskul', 'status'], 'required'],
            [['tanggal_mulai', 'tanggal_selesai'], 'safe'],
            [['id_eskul', 'status'], 'integer'],
            [['nama', 'tempat', 'estimasi_waktu_kegiatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tempat' => 'Tempat',
            'tanggal_mulai' => 'Tanggal Mulai',
            'estimasi_waktu_kegiatan' => 'Estimasi Waktu Kegiatan',
            'tanggal_selesai' => 'Tanggal Selesai',
            'id_eskul' => 'Id Eskul',
            'status' => 'Status',
        ];
    }
}
