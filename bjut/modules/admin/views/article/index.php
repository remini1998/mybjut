<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AdminArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '博客';
$this->params['breadcrumbs'][] = $this->title;
?>






    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>简明博客</h1>
                        <hr class="small">
                        <span class="subheading">A Clean Blog Theme by Start Bootstrap</span>
                        <hr>
                        <br>
                        <a class="btn btn-info btn-lg" href="index.php?r=admin/article/create" role="button"><strong>写文章 <i class="icon-circle-arrow-right"></i> </strong></a>
                    </div>
                </div>
            </div>
        </div>
    </header>



    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php foreach ($models as $model) {

                // 在这里显示 $model

                    echo '
                    <div class="post-preview">
                        <a href="index.php?r=admin/article/view&id='.$model->article_id.'">
                            <h2 class="post-title">
                                '.$model->article_title.'
                            </h2>
                            <h3 class="post-subtitle">
                                '.$model->article_summary.'
                            </h3>
                        </a>
                        <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
                    </div> 
                <hr>'

                ;}?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="index.php?r=admin/article/create">写文章 &rarr;</a>
                    </li>
                </ul>
                <?php echo LinkPager::widget(['pagination' => $pages,]); ?>
            </div>
        </div>
    </div>

    <hr>


