<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\HistorialMedico */

$this->title = 'Create Historial Medico';
$this->params['breadcrumbs'][] = ['label' => 'Historial Medicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historial-medico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
