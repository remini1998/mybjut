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
        <link rel="stylesheet" href="assets/css/metisMenu.min.css">
        <link rel="stylesheet" href="assets/css/sb-admin-2.css">
        <!-- Modernizr -->
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- Respond.js for IE 8 or less only -->
        <!--[if (lt IE 9) & (!IEMobile)]>
            <script src="js/vendor/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php $this->beginBody() ?>
    <body>
        <!--[if lte IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <!-- 这里是页面头部，主要放置导航条 -->
        <header role="banner">
            <nav class="navbar navbar-default">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php"><img src="logo.png" alt="Bootstrappin'" width="120"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php">首页 <span class="sr-only">(current)</span></a></li>
                      <li><a href="index.php?r=site/thing"><span class="icon-camera-retro"></span> 近期校园</a></li>
                      <li class="active"><a href="index.php?r=admin/default/home"><span class="icon-user"></span> 个人主页</a></li>
                      <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">工作区<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="index.php?r=admin/article">博客</a></li>
                        <li><a href="#">添加收藏</a></li>
                        <li><a href="#">公共社区</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">其它玩意</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?r=site/contact">意见反馈</a></li>
                      </ul>
                    </li>
                  </ul>
                  <form class="navbar-form navbar-right" role="search" method="post">
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
                    sagittis lacus vel augue laoreet rutrum faucibus.">
                      搜索
                    </button>
                    <!-- <button type="submit" class="btn btn-default">搜索</button> -->                   
                    <?php
                    echo 
                    Yii::$app->user->isGuest ? '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    登录/注册
                    </button>':'<button type="button" class="btn btn-primary" href="index.php?r=site/logout" data-method="post">
                    注销'. Yii::$app->user->identity->admin_name.' 
                    </button>'
                    ?>                    
                  </form>

                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
        </header>

            <!-- 拟态框，按钮触发时显示 -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">登录</h4>
                  </div>
                  <div class="modal-body">

                  <!-- 表单 -->
                    <form id="login-form" class="form-horizontal" action="/bjut/web/index.php?r=site%2Flogin" method="post">
                      <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                      <div class="form-group field-loginform-username required">
                        <label for="loginform-username" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"><span class="icon-envelope"></span></span>
                              <input type="email" class="form-control" id="loginform-username" placeholder="邮箱" aria-describedby="sizing-addon2" name="LoginForm[username]">
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="loginform-password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                              <span class="input-group-addon" id="sizing-addon2"><span class="icon-key"></span></span>
                              <input type="password" class="form-control" placeholder="密码" id="loginform-password" class="form-control" name="LoginForm[password]" aria-describedby="sizing-addon2">
                            </div>
                        </div>
                      </div>
                      <div class="form-group field-loginform-rememberme">
                        <div class="col-lg-offset-1 col-lg-3">
                          <input type="hidden" name="LoginForm[rememberMe]" value="0">
                          <input type="checkbox" id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked>
                          <label for="loginform-rememberme">Remember Me</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-success" name="login-button">登录</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <p class="text-primary">还未注册？加入我们，更多精彩</p>
                    <button type="button" class="btn btn-info" data-dismiss="modal">服务条款</button>
                    <a href="index.php?r=site/signup" class="btn btn-primary" role="button">注册</a>
                  </div>
                </div>
              </div>
            </div>



            <!-- 网站主要内容 -->
            <main role="main">

                  <?= Breadcrumbs::widget([
                      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                  ]) ?>
                  <?= $content ?>

            </main>


        <footer role="contentinfo">
            <div class="container">
                <p><small>Copyright &copy; Company Name</small></p>
            </div>
        </footer>

        <script src="assets/js/vendor/jquery-3.0.js"></script>
        <!-- <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-3.0.js"><\/script>')</script> -->
        <script src="assets/js/plugins__pubu.js"></script>
        <script src="assets/js/main.js"></script>

        <!-- 主题样式的导入 -->
        <script src="assets/js/agency.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/sb-admin-2.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!-- 未解决谷歌无法快速访问时，禁用以下脚本。并寻求更好的站点分析工具。 -->
        <!--         <script>
                    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
                    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                    s.parentNode.insertBefore(g,s)}(document,'script'));
                </script> -->
      <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>