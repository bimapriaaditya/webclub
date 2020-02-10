<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengajuan".
 *
 * @property int $id
 * @property int $id_eskul
 * @property string $type
 * @property string $nama
 * @property string $tujuan
 * @property string $data
 * @property float $total_biaya
 * @property int $status
 * @property string $tanggal
 *
 * @property Eskul $eskul
 */
class Pengajuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengajuan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eskul', 'type', 'nama', 'tujuan', 'data', 'total_biaya', 'status', 'tanggal'], 'required'],
            [['id_eskul', 'status'], 'integer'],
            [['type', 'tujuan'], 'string'],
            [['total_biaya'], 'number'],
            [['tanggal'], 'safe'],
            [['nama', 'data'], 'string', 'max' => 255],
            [['id_eskul'], 'exist', 'skipOnError' => true, 'targetClass' => Eskul::className(), 'targetAttribute' => ['id_eskul' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_eskul' => 'Id Eskul',
            'type' => 'Type',
            'nama' => 'Nama',
            'tujuan' => 'Tujuan',
            'data' => 'Data',
            'total_biaya' => 'Total Biaya',
            'status' => 'Status',
            'tanggal' => 'Tanggal',
        ];
    }

    /**
     * Gets query for [[Eskul]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEskul()
    {
        return $this->hasOne(Eskul::className(), ['id' => 'id_eskul']);
    }
}
