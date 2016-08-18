<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $article_id
 * @property integer $article_author_id
 * @property string $article_title
 * @property string $article_summary
 * @property string $article_content
 * @property string $article_image
 *
 * @property Admin $articleAuthor
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_author_id', 'article_title', 'article_summary', 'article_content'], 'required'],
            [['article_author_id'], 'integer'],
            [['article_content'], 'string'],
            [['article_title'], 'string', 'max' => 24],
            [['article_summary'], 'string', 'max' => 50],
            [['article_image'], 'string', 'max' => 81]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => '文章ID',
            'article_author_id' => '作者ID',
            'article_title' => '文章标题',
            'article_summary' => '文章摘要',
            'article_content' => '文章内容',
            'article_image' => '封面链接',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleAuthor()
    {
        return $this->hasOne(Admin::className(), ['admin_id' => 'article_author_id']);
    }

    /**
     * @inheritdoc
     * @return ArticleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticleQuery(get_called_class());
    }
}
