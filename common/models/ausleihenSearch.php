<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ausleihen;

/**
 * ausleihenSearch represents the model behind the search form about `common\models\Ausleihen`.
 */
class ausleihenSearch extends Ausleihen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ausleihen_id', 'user_id', 'ausleiher'], 'integer'],
            [['leihbeginn', 'leihende'], 'safe'],
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
        $query = Ausleihen::find();

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
            'ausleihen_id' => $this->ausleihen_id,
            'user_id' => $this->user_id,
            'ausleiher' => $this->ausleiher,
            'leihbeginn' => $this->leihbeginn,
            'leihende' => $this->leihende,
        ]);

        return $dataProvider;
    }
}
