<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- 把项目的logo放置在www目录下 -->

        <!-- <link rel="stylesheet" href="css/normalize.css"> 这个样式已经包含在main.css中-->
        <link rel="stylesheet" href="assets/css/agency.min.css"> 
        <link rel="stylesheet" href="assets/css/__main.css">
        <!-- Modernizr -->
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- Respond.js for IE 8 or less only -->
        <!--[if (lt IE 9) & (!IEMobile)]>
            <script src="js/vendor/respond.min.js"></script>
        <![endif]-->
        <!-- 以下引入fullpage需要的文件 -->
        <meta name="viewport" content="width=device-width,initial=scale=1,user-scalable=no"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.8.2/jquery.fullPage.min.css">
    </head>
    <?php $this->beginBody() ?>
    <body>
        <!--[if lte IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <?= $content ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.8.2/jquery.fullPage.min.js" type="text/javascript"></script>
    <script>
        $(function(){
            $('#fullPage').fullpage({
                verticalCentered:false,
                slidesNavigation: true,
                autoScrolling:true,
                sectionsColor:['#e7f2fd','pink','pink','pink'],
                slidesNavPosition: 'bottom',
                anchors:['firstPage', 'secondPage', 'thirdPage','fourthPage'],
                menu: '#myMenu',
                paddingTop: '64px',
                onLeave:function (index, nextIndex, direction) {
                    $('#fullPage').find('.page').eq(index-1).trigger('onLeave');
                },
                afterLoad:function( anchorLink, index) {
                    $('#fullPage').find('.page').eq(index-1).trigger('onLoad');
                }
            });

            $('.page').on('onLeave',function(){
                console.log($(this).attr('id'), '===>>', 'onLeave');
                $(this).find('.component').triggerHandler('onLeave');
            })

            $('.page').on('onLoad',function(){
                console.log($(this).attr('id'), '===>>', 'onLoad');
                $(this).find('.component').triggerHandler('onLoad');
            })

            $('.component').on('onLeave',function(){
                $(this).fadeOut();
            })

            $('.component').on('onLoad',function(){
                $(this).fadeIn();
            })

        });
    </script>
    </body>
    </html>
    <?php $this->endPage() ?>
