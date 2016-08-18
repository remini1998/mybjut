<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = '编辑文章';
$this->params['breadcrumbs'][] = ['label' => '博客', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">

    <div class="row">
        <div class="col-md-3 col-sm-3"></div>
        <div class="col-md-6 col-sm-6">
            <div class="article-create">

                <h1><?= Html::encode($this->title) ?></h1>

                <?= $this->render('_form', [
                    'model' => $model,
                    'filemodel' => $filemodel,
                ]) ?>

            </div>            
        </div>
        <div class="col-md-3 col-sm-3"></div>
    </div>


</div>