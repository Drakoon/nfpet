<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\modules\veterinaria\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\Mascotas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mascotas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

     <?= $form->field($model, 'propietario')->dropDownList(
        ArrayHelper::map(User::find()->all(),'id','username'),
        [
'prompt'=>'Select propietario'
        ]
    ); ?>


    <?= $form->field($model, 'tipo_De_Mascota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Ciudad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
