<?php

namespace frontend\modules\veterinaria\models;

use Yii;

/**
 * This is the model class for table "historial_medico".
 *
 * @property string $id_Historial
 * @property string $mascota
 * @property string $problema
 * @property string $fecha_Consulta
 * @property string $receta
 *
 * @property Mascotas $mascota0
 */
class HistorialMedico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historial_medico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mascota', 'problema', 'receta'], 'required'],
            [['mascota'], 'integer'],
            [['problema', 'receta'], 'string'],
            [['fecha_Consulta'], 'safe'],
            [['mascota'], 'exist', 'skipOnError' => true, 'targetClass' => Mascotas::className(), 'targetAttribute' => ['mascota' => 'id_Mascotas']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Historial' => 'Id  Historial',
            'mascota' => 'Mascota',
            'problema' => 'Problema',
            'fecha_Consulta' => 'Fecha  Consulta',
            'receta' => 'Receta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMascota0()
    {
        return $this->hasOne(Mascotas::className(), ['id_Mascotas' => 'mascota']);
    }
}
