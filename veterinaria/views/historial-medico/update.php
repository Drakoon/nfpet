<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\HistorialMedico */

$this->title = 'Update Historial Medico: ' . $model->id_Historial;
$this->params['breadcrumbs'][] = ['label' => 'Historial Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Historial, 'url' => ['view', 'id' => $model->id_Historial]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="historial-medico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
