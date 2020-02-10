<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kalender_data".
 *
 * @property int $id
 * @property string $nama
 * @property string $tanggal
 * @property string $estimasi_waktu_kegiatan
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
            [['nama', 'tanggal', 'estimasi_waktu_kegiatan', 'id_eskul', 'status'], 'required'],
            [['tanggal'], 'safe'],
            [['id_eskul', 'status'], 'integer'],
            [['nama', 'estimasi_waktu_kegiatan'], 'string', 'max' => 255],
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
            'tanggal' => 'Tanggal',
            'estimasi_waktu_kegiatan' => 'Estimasi Waktu Kegiatan',
            'id_eskul' => 'Id Eskul',
            'status' => 'Status',
        ];
    }
}
