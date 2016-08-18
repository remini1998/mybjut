<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'article_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article_summary')->textInput(['maxlength' => true]) ?>


    <div class="form-group field-article-article_content required">
        <label class="control-label" for="article-article_content">文章内容</label>
        <textarea id="article-article_content" class="form-control summernote" name="Article[article_content]" rows="10"><?php echo $model->article_content; ?></textarea>
        <div class="help-block"></div>
    </div>

    <p class="bg-danger">注意：在文本中用链接方式插入图片后如果按钮不可用，请在链接后追加一个空格即可</p>

    <?= $form->field($model, 'article_image')->textInput(['maxlength' => true]) ?>
    <p class="bg-danger">链接被填充时，封面优先使用链接图片。链接为空时，请上传本地图片。本地上传封面图片大小不可超过2M</p>

    <?= $form->field($filemodel, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
