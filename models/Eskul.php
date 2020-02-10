<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eskul".
 *
 * @property int $id
 * @property string $nama
 * @property string $img
 *
 * @property AlertEskul[] $alertEskuls
 * @property EskulSiswa[] $eskulSiswas
 * @property LaporanBulanan[] $laporanBulanans
 * @property LaporanKegiatan[] $laporanKegiatans
 * @property Pengajuan[] $pengajuans
 * @property UangKas[] $uangKas
 * @property UangKeluar[] $uangKeluars
 * @property UangMasuk[] $uangMasuks
 */
class Eskul extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eskul';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'img'], 'required'],
            [['nama', 'img'], 'string', 'max' => 255],
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
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[AlertEskuls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlertEskuls()
    {
        return $this->hasMany(AlertEskul::className(), ['id_eskul' => 'id']);
    }

    /**
     * Gets query for [[EskulSiswas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEskulSiswas()
    {
        return $this->hasMany(EskulSiswa::className(), ['id_eskul' => 'id']);
    }

    /**
     * Gets query for [[LaporanBulanans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporanBulanans()
    {
        return $this->hasMany(LaporanBulanan::className(), ['id_eskul' => 'id']);
    }

    /**
     * Gets query for [[LaporanKegiatans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLaporanKegiatans()
    {
        return $this->hasMany(LaporanKegiatan::className(), ['id_eskul' => 'id']);
    }

    /**
     * Gets query for [[Pengajuans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengajuans()
    {
        return $this->hasMany(Pengajuan::className(), ['id_eskul' => 'id']);
    }

    /**
     * Gets query for [[UangKas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUangKas()
    {
        return $this->hasMany(UangKas::className(), ['id_eskul' => 'id']);
    }

    /**
     * Gets query for [[UangKeluars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUangKeluars()
    {
        return $this->hasMany(UangKeluar::className(), ['id_eskul' => 'id']);
    }

    /**
     * Gets query for [[UangMasuks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUangMasuks()
    {
        return $this->hasMany(UangMasuk::className(), ['id_eskul' => 'id']);
    }
}
