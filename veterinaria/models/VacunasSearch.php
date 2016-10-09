<?php

namespace frontend\modules\veterinaria\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\veterinaria\models\Vacunas;

/**
 * VacunasSearch represents the model behind the search form about `frontend\modules\veterinaria\models\Vacunas`.
 */
class VacunasSearch extends Vacunas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Vacunas', 'veterinario', 'mascota'], 'integer'],
            [['nombre', 'fecha'], 'safe'],
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
        $query = Vacunas::find();

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
            'id_Vacunas' => $this->id_Vacunas,
            'fecha' => $this->fecha,
            'veterinario' => $this->veterinario,
            'mascota' => $this->mascota,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}