<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kalender".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $data
 * @property string|null $img
 */
class Kalender extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kalender';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama', 'data', 'img'], 'string', 'max' => 255],
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
            'data' => 'Data',
            'img' => 'Img',
        ];
    }
}
