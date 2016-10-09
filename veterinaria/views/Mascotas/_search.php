<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\MascotasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mascotas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_Mascotas') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'edad') ?>

    <?= $form->field($model, 'propietario') ?>

    <?= $form->field($model, 'tipo_De_Mascota') ?>

    <?php // echo $form->field($model, 'Ciudad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
