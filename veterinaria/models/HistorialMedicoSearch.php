<?php

namespace frontend\modules\veterinaria\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\veterinaria\models\HistorialMedico;

/**
 * HistorialMedicoSearch represents the model behind the search form about `frontend\modules\veterinaria\models\HistorialMedico`.
 */
class HistorialMedicoSearch extends HistorialMedico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_Historial', 'mascota'], 'integer'],
            [['problema', 'fecha_Consulta', 'receta'], 'safe'],
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
        $query = HistorialMedico::find();

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
            'id_Historial' => $this->id_Historial,
            'mascota' => $this->mascota,
            'fecha_Consulta' => $this->fecha_Consulta,
        ]);

        $query->andFilterWhere(['like', 'problema', $this->problema])
            ->andFilterWhere(['like', 'receta', $this->receta]);

        return $dataProvider;
    }
}
