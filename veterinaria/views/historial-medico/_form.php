<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\veterinaria\models\Mascotas;
/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\HistorialMedico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historial-medico-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'mascota')->dropDownList(
        ArrayHelper::map(Mascotas::find()->all(),'id_Mascotas','nombre'),
        [
'prompt'=>'Select Mascota'
        ]

    ); ?>

    <?= $form->field($model, 'problema')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fecha_Consulta')->textInput() ?>

    <?= $form->field($model, 'receta')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
