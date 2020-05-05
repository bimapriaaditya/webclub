<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan_kegiatan".
 *
 * @property int $id
 * @property int $id_eskul
 * @property string $nama
 * @property string $data
 * @property string $tanggal
 *
 * @property Eskul $eskul
 */
class LaporanKegiatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan_kegiatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eskul', 'nama', 'data', 'tanggal'], 'required'],
            [['id_eskul'], 'integer'],
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
            'nama' => 'Nama',
            'data' => 'Data',
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

    public function setNamaEskul()
    {
        return $this->getEskul()->nama;
    }

    public function deleteFile()
    {
        $path = Yii::getAlias('@laporan_kegiatanDataPath').'/'.$this->data;
        return unlink($path);
    }
}
