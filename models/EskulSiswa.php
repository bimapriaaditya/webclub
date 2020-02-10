<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eskul_siswa".
 *
 * @property int $id
 * @property int $id_eskul
 * @property string $nama
 * @property string $kelas
 * @property string $alamat
 * @property string $no_telepon_siswa
 * @property string $no_telepon_orrtu
 * @property string $email
 *
 * @property Eskul $eskul
 */
class EskulSiswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eskul_siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eskul', 'nama', 'kelas', 'alamat', 'no_telepon_siswa', 'no_telepon_orrtu', 'email'], 'required'],
            [['id_eskul'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'kelas', 'no_telepon_siswa', 'no_telepon_orrtu', 'email'], 'string', 'max' => 255],
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
            'kelas' => 'Kelas',
            'alamat' => 'Alamat',
            'no_telepon_siswa' => 'No Telepon Siswa',
            'no_telepon_orrtu' => 'No Telepon Orrtu',
            'email' => 'Email',
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
