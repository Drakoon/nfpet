<?php

namespace frontend\modules\veterinaria\models;

use Yii;

/**
 * This is the model class for table "mascotas".
 *
 * @property string $id_Mascotas
 * @property string $nombre
 * @property integer $edad
 * @property integer $propietario
 * @property string $tipo_De_Mascota
 * @property string $Ciudad
 *
 * @property HistorialMedico[] $historialMedicos
 * @property User $propietario0
 * @property Vacunas[] $vacunas
 */
class Mascotas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mascotas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edad', 'propietario'], 'integer'],
            [['nombre', 'tipo_De_Mascota', 'Ciudad'], 'string', 'max' => 50],
            [['propietario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['propietario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Mascotas' => 'Id  Mascotas',
            'nombre' => 'Nombre',
            'edad' => 'Edad',
            'propietario' => 'Propietario',
            'tipo_De_Mascota' => 'Tipo  De  Mascota',
            'Ciudad' => 'Ciudad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistorialMedicos()
    {
        return $this->hasMany(HistorialMedico::className(), ['mascota' => 'id_Mascotas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropietario0()
    {
        return $this->hasOne(User::className(), ['id' => 'propietario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacunas()
    {
        return $this->hasMany(Vacunas::className(), ['mascota' => 'id_Mascotas']);
    }
}
