
        <!-- 这里是页面头部，主要放置导航条 -->
        <header role="banner" style="z-index:100;">      
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php"><img src="logo.png" alt="My BJUT" width="120"></a>
                  <?php
                    echo 
                    Yii::$app->user->isGuest ?'<a data-toggle="modal" data-target="#myModal" class="pull-right navbar-icon visible-xs-* hidden-sm hidden-md hidden-lg"><span class="icon-user icon-2x"></span></a>':'<a href="index.php?r=admin/default/home" class="pull-right navbar-icon visible-xs-* hidden-sm hidden-md hidden-lg"><span class="icon-user icon-2x"></span></a>'?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">首页 <span class="sr-only">(current)</span></a></li>
                    <li><a href="#"><span class="icon-camera-retro"></span>  快照</a></li>
                    <li><a href="index.php?r=admin/default/home"><span class="icon-user"></span>  个人主页</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">更多功能<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?r=site/about">关于我们</a></li>
                        <li><a href="index.php?r=site/contact">联系我们</a></li>
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


    <div id="fullPage">
        <div class="section page" id="page1">
            <div class="slide">
                <div class="component">
                    <!-- 巨幕，站点简介 -->                
                    <div class="jumbotron" style="background-image:url(assets/img/bg0.png); background-repeat:repeat;">
                        <div class="container">
                            <h1>Welcome To Our Studio!</h1>
                            <h2>It's Nice To Meet You</h2>
                        </div>
                    </div>

                    <hr align="center" width="35%" style="margin-top:8px;margin-bottom:-7px;border:1px solid #1E90FF;">
                </div>
            </div>
            <div class="slide">
                <div class="component">page1 slide2</div>
            </div>
            <div class="slide">
                <div class="component">page1 slide3</div>
            </div>
            <div class="slide">
                <div class="component">page1 slide4</div>
            </div>
        </div>
        <div class="section page" id="page2">
            <div class="component">page2</div>
        </div>
        <div class="section page" id="page3">
            <div class="component">page3</div>
        </div>
        <div class="section page" id="page4">
            <div class="component">
                <footer role="contentinfo">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4 col-md-2">
                                <h3>Categories</h3>
                                <ul>
                                    <li>
                                        <a href="#">Shoes</a>
                                    </li>
                                    <li>
                                        <a href="#">Clothing</a>
                                    </li>
                                    <li>
                                        <a href="#">Accessories</a>
                                    </li>
                                    <li>
                                        <a href="#">Men</a>
                                    </li>
                                    <li>
                                        <a href="#">Women</a>
                                    </li>
                                    <li>
                                        <a href="#">Kids</a>
                                    </li>
                                    <li>
                                        <a href="#">Pets</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-md-2">
                                <h3>Styles</h3>
                                <ul>
                                    <li>
                                        <a href="#">Athletic</a>
                                    </li>
                                    <li>
                                        <a href="#">Casual</a>
                                    </li>
                                    <li>
                                        <a href="#">Dress</a>
                                    </li>
                                    <li>
                                        <a href="#">Everyday</a>
                                    </li>
                                    <li>
                                        <a href="#">Other Days</a>
                                    </li>
                                    <li>
                                        <a href="#">Alternative</a>
                                    </li>
                                    <li>
                                        <a href="#">Otherwise</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4 col-md-2">
                                <h3>Other</h3>
                                <ul>
                                    <li>
                                        <a href="#">Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Another link</a>
                                    </li>
                                    <li>
                                        <a href="#">Link again</a>
                                    </li>
                                    <li>
                                        <a href="#">Try this</a>
                                    </li>
                                    <li>
                                        <a href="#">Don't you dare</a>
                                    </li>
                                    <li>
                                        <a href="#">Oh go ahead</a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Add the extra clearfix for only the required viewport -->        
                            <div class="clearfix visible-sm"></div>

                            <div class="about col-sm-12 col-md-6">
                                <h3>About Us</h3>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse euismod congue bibendum. Aliquam erat volutpat. Phasellus eget justo lacus. Vivamus pharetra ullamcorper massa, nec ultricies metus gravida egestas. Duis congue viverra arcu, ac aliquet turpis rutrum a. Donec semper vestibulum dapibus. Integer et sollicitudin metus. Vivamus at nisi turpis. Phasellus vel tellus id felis cursus hendrerit.
                                </p>
                                <p>
                                    <a class="btn btn-default btn-xs pull-right" href="#">
                                        Learn more
                                        <span class="fa fa-arrow-circle-right"></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <!-- /.row -->        
                        <ul class="social">
                            <li>
                                <a href="#" title="WeChat">
                                    <span class="icon icon-comments"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="LinkedIn Profile">
                                    <span class="icon icon-linkedin"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" title="GitHub Profile">
                                    <span class="icon icon-github"></span>
                                </a>
                            </li>
                        </ul>
                        <p class="footer-brand">
                            <a href="index.php" title="My Websit">
                                <img src="assets/img/logo.png" width="80" alt="My BJUT"></a>
                        </p>
                    </div>
                    <!-- /.container --> 
                </footer>

            </div>
        </div>
    </div>