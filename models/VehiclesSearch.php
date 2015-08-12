<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehicles;

/**
 * VehiclesSearch represents the model behind the search form about `app\models\Vehicles`.
 */
class VehiclesSearch extends Vehicles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'line_id', 'user_id', 'vehicle_type_id', 'record_status'], 'integer'],
            [['license_plate', 'image'], 'safe'],
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
        $query = Vehicles::find();

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
            'id' => $this->id,
            'company_id' => $this->company_id,
            'line_id' => $this->line_id,
            'user_id' => $this->user_id,
            'vehicle_type_id' => $this->vehicle_type_id,
            'record_status' => $this->record_status,
        ]);

        $query->andFilterWhere(['like', 'license_plate', $this->license_plate])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
