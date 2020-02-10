<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alert_eskul".
 *
 * @property int $id
 * @property int $id_eskul
 * @property string $perihal
 * @property string $text
 * @property string $tanggal
 *
 * @property Eskul $eskul
 */
class AlertEskul extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alert_eskul';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eskul', 'perihal', 'text', 'tanggal'], 'required'],
            [['id_eskul'], 'integer'],
            [['text'], 'string'],
            [['tanggal'], 'safe'],
            [['perihal'], 'string', 'max' => 255],
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
            'perihal' => 'Perihal',
            'text' => 'Text',
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
