<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uang_kas".
 *
 * @property int $id
 * @property int $id_eskul
 * @property string $nama
 * @property string $tanggal
 * @property float $total
 *
 * @property Eskul $eskul
 */
class UangKas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uang_kas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eskul', 'nama', 'tanggal', 'total'], 'required'],
            [['id_eskul'], 'integer'],
            [['tanggal'], 'safe'],
            [['total'], 'number'],
            [['nama'], 'string', 'max' => 255],
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
            'tanggal' => 'Tanggal',
            'total' => 'Total',
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
