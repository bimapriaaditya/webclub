<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EskulSiswa;

/**
 * EskulSiswaSearch represents the model behind the search form of `app\models\EskulSiswa`.
 */
class EskulSiswaSearch extends EskulSiswa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_eskul'], 'integer'],
            [['nama', 'kelas', 'alamat', 'no_telepon_siswa', 'no_telepon_orrtu', 'email'], 'safe'],
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
        $query = EskulSiswa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => EskulSiswa::find()->andWhere(['id_eskul' => $params]),
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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'kelas', $this->kelas])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_telepon_siswa', $this->no_telepon_siswa])
            ->andFilterWhere(['like', 'no_telepon_orrtu', $this->no_telepon_orrtu])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
