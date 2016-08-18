<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Article;

/**
 * AdminArticleSearch represents the model behind the search form about `app\models\Article`.
 */
class AdminArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'article_author_id'], 'integer'],
            [['article_title', 'article_summary', 'article_content', 'article_image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'article_id' => $this->article_id,
            'article_author_id' => $this->article_author_id,
        ]);

        $query->andFilterWhere(['like', 'article_title', $this->article_title])
            ->andFilterWhere(['like', 'article_summary', $this->article_summary])
            ->andFilterWhere(['like', 'article_content', $this->article_content])
            ->andFilterWhere(['like', 'article_image', $this->article_image]);

        return $dataProvider;
    }
}
