<?php

namespace app\models;
use app\models\User;
use Yii;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $authKey;
    const KESISWAAN = 0;
    const OSIS = 1;
    const PRAMUKA = 2;
    const IKHBAT = 3;
    const PMR = 4;
    const TEATER = 5;
    const BASKET = 6;
    const ANIMASI = 7;
    const MOTION = 8;
    const BADMINTON = 9;
    const FUTSAL = 10;
    const PADUAN_SUARA = 11;
    const LINTAS_SUNDA = 12;
    const ANGKLUNG = 13;
    const TARI = 14;
    const SILAT = 15;
    const JAPANESE = 16;
    const KIRR = 17;
    const KARATE = 18;
    const TAEKWONDO = 19;
    const ENGLISH = 20;
    const PASKIBRA = 21;
    const BOX = 22;
    const PKS = 23;
    const VOLLEY = 24;

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
        return $this->hasOne(Eskul::className(), ['role' => 'id_role']);
    }

    public static function isKesiswaan()
    {
        if (Yii::$app->user->identity->id_role == self::KESISWAAN) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPembina()
    {
        if (Yii::$app->user->identity->id_role == self::PEMBINA) {
            return true;
        }else{
            return false;
        }
    }

    public static function isOsis()
    {
        if (Yii::$app->user->identity->id_role == self::OSIS) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPramuka()
    {
        if (Yii::$app->user->identity->id_role == self::PRAMUKA) {
            return true;
        }else{
            return false;
        }
    }

    public static function isIkhbat()
    {
        if (Yii::$app->user->identity->id_role == self::IKHBAT) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPmr()
    {
        if (Yii::$app->user->identity->id_role == self::PMR) {
            return true;
        }else{
            return false;
        }
    }

    public static function isTeater()
    {
        if (Yii::$app->user->identity->id_role == self::TEATER) {
            return true;
        }else{
            return false;
        }
    }

    public static function isBasket()
    {
        if (Yii::$app->user->identity->id_role == self::BASKET) {
            return true;
        }else{
            return false;
        }
    }

    public static function isAnimasi()
    {
        if (Yii::$app->user->identity->id_role == self::ANIMASI) {
            return true;
        }else{
            return false;
        }
    }

    public static function isMotion()
    {
        if (Yii::$app->user->identity->id_role == self::MOTION) {
            return true;
        }else{
            return false;
        }
    }

    public static function isBadminton()
    {
        if (Yii::$app->user->identity->id_role == self::BADMINTON) {
            return true;
        }else{
            return false;
        }
    }

    public static function isFutsal()
    {
        if (Yii::$app->user->identity->id_role == self::FUTSAL) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPaduanSuara()
    {
        if (Yii::$app->user->identity->id_role == self::PADUAN_SUARA) {
            return true;
        }else{
            return false;
        }
    }

    public static function isLintasSunda()
    {
        if (Yii::$app->user->identity->id_role == self::LINTAS_SUNDA) {
            return true;
        }else{
            return false;
        }
    }

    public static function isAngklung()
    {
        if (Yii::$app->user->identity->id_role == self::ANGKLUNG) {
            return true;
        }else{
            return false;
        }
    }

    public static function isTari()
    {
        if (Yii::$app->user->identity->id_role == self::TARI) {
            return true;
        }else{
            return false;
        }
    }

    public static function isSilat()
    {
        if (Yii::$app->user->identity->id_role == self::SILAT) {
            return true;
        }else{
            return false;
        }
    }

    public static function isJapanese()
    {
        if (Yii::$app->user->identity->id_role == self::JAPANESE) {
            return true;
        }else{
            return false;
        }
    }

    public static function isKirr()
    {
        if (Yii::$app->user->identity->id_role == self::KIRR) {
            return true;
        }else{
            return false;
        }
    }

    public static function isKarate()
    {
        if (Yii::$app->user->identity->id_role == self::KARATE) {
            return true;
        }else{
            return false;
        }
    }

    public static function isTaekwondo()
    {
        if (Yii::$app->user->identity->id_role == self::TAEKWONDO) {
            return true;
        }else{
            return false;
        }
    }

    public static function isEnglish()
    {
        if (Yii::$app->user->identity->id_role == self::ENGLISH) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPaskibra()
    {
        if (Yii::$app->user->identity->id_role == self::PASKIBRA) {
            return true;
        }else{
            return false;
        }
    }

    public static function isBox()
    {
        if (Yii::$app->user->identity->id_role == self::BOX) {
            return true;
        }else{
            return false;
        }
    }

    public static function isPks()
    {
        if (Yii::$app->user->identity->id_role == self::PKS) {
            return true;
        }else{
            return false;
        }
    }

    public static function isVolley()
    {
        if (Yii::$app->user->identity->id_role == self::VOLLEY) {
            return true;
        }else{
            return false;
        }
    }

}
