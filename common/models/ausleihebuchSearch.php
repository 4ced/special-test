<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AusleiheBuch;

/**
 * ausleihebuchSearch represents the model behind the search form about `common\models\AusleiheBuch`.
 */
class ausleihebuchSearch extends AusleiheBuch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ausleihebuch_id', 'user_id', 'ausleihen_ausleihen_id', 'buecher_id'], 'integer'],
            [['leihbeginn', 'leihende', 'rückgabe'], 'safe'],
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
        $query = AusleiheBuch::find();

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
            'ausleihebuch_id' => $this->ausleihebuch_id,
            'user_id' => $this->user_id,
            'ausleihen_ausleihen_id' => $this->ausleihen_ausleihen_id,
            'buecher_id' => $this->buecher_id,
            'leihbeginn' => $this->leihbeginn,
            'leihende' => $this->leihende,
            'rückgabe' => $this->rückgabe,
        ]);

        return $dataProvider;
    }
}
