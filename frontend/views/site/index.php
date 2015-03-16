<?php
/* @var $this yii\web\View */
/* @var $contents common\models\Content[] */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-xs-12">
                <?= \yii\grid\GridView::widget([
                    'dataProvider' => $contents,
                    'columns' => [
                        ['attribute' => 'id'],
                        ['attribute' => 'tenant_id'],
                        ['attribute' => 'text'],
                    ]
                ]) ?>
            </div>
        </div>

    </div>
</div>
