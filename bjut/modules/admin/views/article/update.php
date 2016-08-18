<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = '更新: ' . ' ' . $model->article_title;
$this->params['breadcrumbs'][] = ['label' => '博客', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->article_title, 'url' => ['view', 'id' => $model->article_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class="article-update">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                    'filemodel' => $filemodel,
                ]) ?>
            </div>
        </div>
    </div>
</div>