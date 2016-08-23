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
        <meta name="viewport" content="width=device-width"/>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- 把项目的logo放置在www目录下 -->

        <!-- <link rel="stylesheet" href="css/normalize.css"> 这个样式已经包含在main.css中-->
        <link rel="stylesheet" href="assets/css/agency.min.css"> 
        <link rel="stylesheet" href="assets/css/__main.css">
        <link rel="stylesheet" type="text/css" href="assets/css/unslider.css">
        <link rel="stylesheet" type="text/css" href="assets/css/unslider-dots.css">

        <!-- Modernizr -->
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <style type="text/css">
        </style>
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
        <header role="banner">
            <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php"><img src="logo.png" alt="My BJUT" width="120"></a>
                </div>
                <div class="navbar-collapse collapse">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php">首页</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">学校设施<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">近期活动<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">学生会社团 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                          <li class="divider"></li>
                          <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php?r=admin/default/home"><span class="icon-user"> 个人中心 </span></a></li>
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

                  </ul>
                </div><!--/.nav-collapse -->
              </div><!--/.container -->
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
                    <form id="login-form" class="form-horizontal" action="index.php?r=site%2Flogin" method="post">
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
                    <a href="index.php?r=site/clause" class="btn btn-info" role="button">服务条款</a>
                    <a href="index.php?r=site/signup" class="btn btn-primary" role="button">注册</a>
                  </div>
                </div>
              </div>
            </div>



            <!-- 网站主要内容 -->
                  <?= Breadcrumbs::widget([
                      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                  ]) ?>
                  <?= $content ?>



        <footer role="contentinfo">

          <div class="container">
            <div class="row">

                <div class="col-sm-4 col-md-2">
                  <h3>北工大校园链接</h3>
                  <ul>
                    <li><a href="http://www.bjut.edu.cn/">北京工业大学主页</a></li>
                    <li><a href="http://eol.bjut.edu.cn/?columnID=278">教育在线</a></li>
                    <li><a href="http://gdjwgl.bjut.edu.cn/default2.aspx">教务管理系统</a></li>
                    <li><a href="http://lib.bjut.edu.cn/default.html">工大图书馆</a></li>
                    <li><a href="http://172.25.79.231/iplat/indexm?nextpage=bp/index">FIF学习云平台</a></li>
                  </ul>
                </div>
                <div class="col-sm-4 col-md-2">
                  <h3>学习网站</h3>
                  <ul>
                    <li><a href="http://www.imooc.com/">慕课网</a>  </li>
                    <li><a href="http://open.163.com/">网易公开课</a></li>
                    <li><a href="http://www.mooc.cn/">慕课中国</a></li>
                    <li><a href="http://mooc.guokr.com/">慕课学院</a></li>
                    <li><a href="http://study.163.com/">网易云课堂</a></li>
                  </ul>
                </div>
                <div class="col-sm-4 col-md-2">
                  <h3>资讯中心</h3>
                  <ul>
                    <li><a href="http://www.ftchinese.com/">FT中文网全球财经</a></li>
                    <li><a href="http://www.yicai.com/data/">第一财经数据</a></li>
                    <li><a href="http://gold.xitu.io/">掘金</a></li>
                    <li><a href="https://xueqiu.com/">雪球</a></li>
                    <li><a href="http://www.oschina.net/">开源中国</a></li>
                  </ul>
                </div>

              <!-- Add the extra clearfix for only the required viewport -->
              <div class="clearfix visible-sm"></div>

              <div class="about col-sm-12 col-md-6">
                <h3>关于站长</h3>
                <p>2015年起就读于北京工业大学软件学院，受助于学校星火基金项目，于2016年年初开始着手准备该项目---基于Web校园资讯平台。作为该项目负责人，在大一下学期开始学习相关的知识。历时半年多，独自学习了建站相关的知识。该站点的前端的界面由Boostrap框架构建，简洁灵活快捷，并自适应于不同尺寸的屏幕。后端使用PHP语言，并采用了Yii2作为项目后台框架，安全稳定。
                该项目旨在为大一新生提供优质的校园信息服务，并希望能作为学生会同学生线上连接的一个枢纽。</p>
                <p><a class="btn btn-default btn-xs pull-right" href="index.php?r=site/about">Learn more <span class="icon-circle-arrow-right"></span></a></p>
              </div>
            </div><!-- /.row -->

            <ul class="social">
              <li><a href="#" title="WeChat"><span class="icon icon-comments"></span></a></li>
              <li><a href="#" title="LinkedIn Profile"><span class="icon icon-linkedin"></span></a></li>
              <li><a href="#" title="GitHub Profile"><span class="icon icon-github"></span></a></li>
            </ul>

            <p class="footer-brand">
              <a href="index.php" title="My Websit"><img src="assets/img/logo.png" width="80" alt="My BJUT"></a>                
            </p>
            <p class="footer-brand">
              <h3><a href="http://www.miitbeian.gov.cn" title="备案信息">京ICP备16040166号</a>    </h3>            
            </p>




          </div><!-- /.container -->
        </footer>

        <script src="assets/js/vendor/jquery-3.0.js"></script>
        <!-- <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-3.0.js"><\/script>')</script> --><!-- 
        <script src="assets/js/agency.min.js"></script> -->
        <script src="./assets/js/unslider-min.js"></script> <!-- but with the right path! -->
        <!-- 增加滑块的流畅度 -->
        <script src="assets/js/vendor/velocity.min.js"></script> 
        <script>
              var myslider = $('.my-slider').unslider({
                autoplay: true,
                arrows: true,
                nav: true,
                dots: true,
                speed: 550,
                delay: 2200,
                arrows: false,
                // arrows: {
                //     //  Unslider default behaviour
                //     prev: '<a class="unslider-arrow prev"><i class="icon-circle-arrow-left  icon-3x"></i></a>',
                //     next: '<a class="unslider-arrow next"><i class="icon-circle-arrow-right  icon-3x"></i></a>',
                // }
              });
              
              var scripts = [
                './assets/js/vendor/jquery.event.move.js',
                './assets/js/vendor/jquery.event.swipe.js',
                './assets/js/plugins.js',          
              ];

              $.getScript(scripts[0]);
              $.getScript(scripts[1], function() {
                myslider.unslider('initSwipe');
              });
              $(document).ready(function () {
                $.getScript(scripts[2]);       
              });

        </script>
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