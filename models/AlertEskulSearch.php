<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AlertEskul;

/**
 * AlertEskulSearch represents the model behind the search form of `app\models\AlertEskul`.
 */
class AlertEskulSearch extends AlertEskul
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_eskul'], 'integer'],
            [['perihal', 'text', 'tanggal'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = AlertEskul::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_eskul' => $this->id_eskul,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'perihal', $this->perihal])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
