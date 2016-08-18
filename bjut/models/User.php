<?php

namespace app\models;

class User extends /*\yii\base\Object*/ \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName()
    {
        return 'admin';
    }

    public function rules()
    {
        return [
            [['admin_email', 'admin_password', 'admin_name'], 'required'],
            [['admin_type', 'admin_phone'], 'integer'],
            [['admin_email'], 'string','max' => 32],
            [['admin_email'],'email'],
            [['admin_password'], 'string', 'max' => 24],
            [['admin_name'], 'string', 'max' => 12],
            [['admin_fname'], 'string', 'max' => 3],
            [['admin_lname'], 'string', 'max' => 5],
            [['authKey', 'accessToken'], 'string', 'max' => 100],
            [['admin_email'], 'unique'],
            [['admin_phone'], 'unique']
        ];
    }

    //  邮箱作为登录名，注册时不得重复

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => 'ID',
            'admin_email' => '邮箱',
            'admin_password' => '密码',
            'admin_name' => '昵称',
            'admin_type' => '账户类型',
            'admin_phone' => '手机号码',
            'admin_fname' => '姓',
            'admin_lname' => '名',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
        /*foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
          $user = User::find()
            ->where(['admin_email' => $username])
            ->asArray()
            ->one();

            if($user){
            return new static($user);
        }

        return null;
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;*/
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->admin_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->admin_password === $password;
    }

}
