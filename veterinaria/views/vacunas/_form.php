<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\veterinaria\models\Mascotas;

/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\Vacunas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacunas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'veterinario')->textInput() ?>

    <?= $form->field($model, 'mascota')->dropDownList(
        ArrayHelper::map(Mascotas::find()->all(),'id_Mascotas','nombre'),
        [
'prompt'=>'Select Mascota'
        ]

    ); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
