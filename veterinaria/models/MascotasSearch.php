<?php

namespace frontend\modules\veterinaria\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\veterinaria\models\Mascotas;

/**
 * MascotasSearch represents the model behind the search form about `frontend\modules\veterinaria\models\Mascotas`.
 */
class MascotasSearch extends Mascotas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Mascotas', 'edad', 'propietario'], 'integer'],
            [['nombre', 'tipo_De_Mascota', 'Ciudad'], 'safe'],
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
        $query = Mascotas::find();

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
            'id_Mascotas' => $this->id_Mascotas,
            'edad' => $this->edad,
            'propietario' => $this->propietario,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tipo_De_Mascota', $this->tipo_De_Mascota])
            ->andFilterWhere(['like', 'Ciudad', $this->Ciudad]);

        return $dataProvider;
    }
}
