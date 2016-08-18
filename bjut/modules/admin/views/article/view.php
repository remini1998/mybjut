<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->article_title;
$this->params['breadcrumbs'][] = ['label' => '博客', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$imagefile = './uploads/'.$model->article_author_id.'/'.$model->article_id;
?>


    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <?php 
        echo '<header class="intro-header" style="background-image:url(\''.$model->article_image.'\')">';
    ?>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo $model->article_title;?></h1>
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <blockquote>
                        <p><?php echo $model->article_summary;?></p>
                    </blockquote>

                    <p><?php echo $model->article_content;?></p>


                    <!-- <p>Placeholder text by <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p> -->
                </div>
            </div>
        </div>
    </article>

    <hr>




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">

            <div class="article-view">

                <p>

                    <form class="navbar-form navbar-right" role="search" method="post">
                        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />               
                        <?= Html::a('Update', ['update', 'id' => $model->article_id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->article_id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => '你确定要删除这篇文章?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </form>
                    
                </p>

            </div>
            
        </div>
    </div>
    
</div>
