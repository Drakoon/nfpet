<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\Mascotas */

$this->title = 'Update Mascotas: ' . $model->id_Mascotas;
$this->params['breadcrumbs'][] = ['label' => 'Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Mascotas, 'url' => ['view', 'id' => $model->id_Mascotas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mascotas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
