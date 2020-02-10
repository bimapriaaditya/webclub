<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uang_keluar".
 *
 * @property int $id
 * @property int $id_eskul
 * @property float $total
 * @property string $tanggal
 * @property string $keterangan
 * @property string $img
 *
 * @property Eskul $eskul
 */
class UangKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uang_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eskul', 'total', 'tanggal', 'keterangan', 'img'], 'required'],
            [['id_eskul'], 'integer'],
            [['total'], 'number'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['img'], 'string', 'max' => 255],
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
            'total' => 'Total',
            'tanggal' => 'Tanggal',
            'keterangan' => 'Keterangan',
            'img' => 'Img',
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
