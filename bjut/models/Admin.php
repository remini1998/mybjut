<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $admin_id
 * @property string $admin_email
 * @property string $admin_password
 * @property string $admin_name
 * @property integer $admin_type
 * @property integer $admin_phone
 * @property string $admin_fname
 * @property string $admin_lname
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Article[] $articles
 */
class Admin extends \yii\db\ActiveRecord
{

    public $verifyCode;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_email', 'admin_password', 'admin_name'], 'required'],
            [['admin_type', 'admin_phone'], 'integer'],
            [['admin_email'], 'string', 'max' => 32],
            [['admin_email'],'email'],
            [['admin_password'], 'string', 'max' => 24],
            [['admin_name'], 'string', 'max' => 12],
            [['admin_fname'], 'string', 'max' => 3],
            [['admin_lname'], 'string', 'max' => 5],
            [['authKey', 'accessToken'], 'string', 'max' => 100],
            [['admin_email'], 'unique'],
            [['admin_phone'], 'unique'],
            ['verifyCode', 'captcha'],
        ];
    }

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
            'verifyCode' => '验证码',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['article_author_id' => 'admin_id']);
    }

    /**
     * @inheritdoc
     * @return AdminQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdminQuery(get_called_class());
    }
}
