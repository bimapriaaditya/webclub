<?php

namespace app\models;
use app\models\User;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $authKey;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['nama', 'email', 'password', 'id_role', 'no_telepon', 'alamat', 'img'], 'required'],
            [['id_role'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'email', 'password', 'no_telepon', 'img'], 'string', 'max' => 255],
        ];
    }

    public static function findIdentity($id)
    {
        $user = User::findOne($id);
        if($user !== null){
            return new static($user);
        }
        return null;    
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where(['accessToken'=>$token])->one();
        if(count($user))
        {
            return new static($user);
        }

        return null;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'Email',
            'password' => 'Password',
            'id_role' => 'Id Role',
            'no_telepon' => 'No Telepon',
            'alamat' => 'Alamat',
            'img' => 'Img',
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findByUsername($username)
    {
        $user = User::find()->where(['email'=>$username])->one();
        
        if($user !== null)
        {
            return new static($user);
        }

        return null;
    }


    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'id_role']);
    }
}
