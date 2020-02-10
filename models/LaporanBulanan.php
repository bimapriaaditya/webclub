<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan_bulanan".
 *
 * @property int $id
 * @property int $id_eskul
 * @property string $tanggal
 * @property string $data
 *
 * @property Eskul $eskul
 */
class LaporanBulanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'laporan_bulanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eskul', 'tanggal', 'data'], 'required'],
            [['id_eskul'], 'integer'],
            [['tanggal'], 'safe'],
            [['data'], 'string', 'max' => 255],
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
            'tanggal' => 'Tanggal',
            'data' => 'Data',
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
