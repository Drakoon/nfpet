<?php

namespace frontend\modules\veterinaria\models;

use Yii;

/**
 * This is the model class for table "vacunas".
 *
 * @property string $id_Vacunas
 * @property string $nombre
 * @property string $fecha
 * @property integer $veterinario
 * @property string $mascota
 *
 * @property Mascotas $mascota0
 * @property User $veterinario0
 */
class Vacunas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacunas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'veterinario', 'mascota'], 'required'],
            [['fecha'], 'safe'],
            [['veterinario', 'mascota'], 'integer'],
            [['nombre'], 'string', 'max' => 50],
            [['mascota'], 'exist', 'skipOnError' => true, 'targetClass' => Mascotas::className(), 'targetAttribute' => ['mascota' => 'id_Mascotas']],
            [['veterinario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['veterinario' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_Vacunas' => 'Id  Vacunas',
            'nombre' => 'Nombre',
            'fecha' => 'Fecha',
            'veterinario' => 'Veterinario',
            'mascota' => 'Mascota',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMascota0()
    {
        return $this->hasOne(Mascotas::className(), ['id_Mascotas' => 'mascota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVeterinario0()
    {
        return $this->hasOne(User::className(), ['id' => 'veterinario']);
    }
}
