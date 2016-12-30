<?php
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Card;
use common\models\RefApp;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cards';
$this->params['breadcrumbs'][] = $this->title;
$refapp_arr =ArrayHelper::map(RefApp::find()->all(), 'id', 'appname') ;
?>
<div class="card-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Card', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'sn',
//            'refapp',
            [
//                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'attribute'=>'refapp',
                'filter'=>$refapp_arr,
                'value' => function ($data) {
                    $refapp_arr =   ArrayHelper::map(RefApp::find()->all(), 'id', 'appname') ;
//                    return ($data->refapp); // $data['name'] for array data, e.g. using SqlDataProvider.
                    return ArrayHelper::getValue($refapp_arr, $data->refapp);
                },
            ],
//            'status',
            [
//                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'attribute'=>'status',
                'filter'=>Card::ref_status_lebels(),
                'value' => function ($data) {
                    return Card::ref_status_lebels($data->status); // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
//            'period',
            [
//                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'attribute'=>'period',
                'filter'=>Card::ref_period_lebels(),
                'value' => function ($data) {
                    return Card::ref_period_lebels($data->period); // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],
            // 'price',
            // 'created_at',
            // 'updated_at',
            // 'bind_at',
            // 'bind_uid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
