<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '联系我们';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="site-contact">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                谢谢您宝贵的意见，我们会对此及时进行处理！
            </div>

            <p>
                如果您想更近一步了解我们，请移步<a href="index.php?r=site/about">关于我们</a>
            </p>

        <?php else: ?>

            <p>
                网站仍在建设中，如果您发现网站有什么不足之处和值得改进的地方，或者有合作需求，<br>请您在这里留言，并留下可以接收得到信息的邮箱。我们会及时回复您，谢谢！
            </p>

            <div class="row">
                <div class="col-lg-5">

                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                        <?= $form->field($model, 'name') ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'subject') ?>

                        <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-1"></div><div class="col-lg-3">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('发送', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        <?php endif; ?>
    </div>
</div>