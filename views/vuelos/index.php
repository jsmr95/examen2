<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VuelosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vuelos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vuelos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'codigo',
            'origen.codigo:text:Origen',
            'destino.codigo:text:Destino',
            'compania.denominacion:text:Compañía',
            'plazas_libres',
            //'salida',
            //'llegada',
            //'plazas',
            //'precio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
