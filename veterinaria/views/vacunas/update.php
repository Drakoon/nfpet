<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\veterinaria\models\Vacunas */

$this->title = 'Update Vacunas: ' . $model->id_Vacunas;
$this->params['breadcrumbs'][] = ['label' => 'Vacunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_Vacunas, 'url' => ['view', 'id' => $model->id_Vacunas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vacunas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
