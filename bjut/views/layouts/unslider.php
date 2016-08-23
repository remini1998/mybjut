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
        <link rel="stylesheet" href="assets/css/__main.css">
        <link rel="stylesheet" type="text/css" href="assets/css/unslider.css">
        <link rel="stylesheet" type="text/css" href="assets/css/unslider-dots.css">
        <!-- Modernizr -->
        <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- Respond.js for IE 8 or less only -->
        <!--[if (lt IE 9) & (!IEMobile)]>
            <script src="js/vendor/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            body {
              background-color: pink;
            }
            .my-slider { 
                position: relative; 
                overflow: auto; 
            }
            .my-slider li {
                 list-style: none; 
            }
            .my-slider ul li {
                 float: left; 
            }           
        </style>
    </head>
    <body>
<!-- The barebones HTML required for Unslider -->
    <?= $content ?>
<!-- And the relevant JavaScript -->
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="./assets/js/unslider-min.js"></script> <!-- but with the right path! -->
<script src="//cdn.jsdelivr.net/velocity/1.2.3/velocity.min.js"></script> <!-- 增加滑块的流畅度 -->
<script>
    var slider = $('.my-slider').unslider({
      autoplay: true,
      arrows: true,
      nav: true,
      dots: true,
      speed: 550,
      delay: 2200,
    });

    var scripts = [
      './assets/js/vendor/jquery.event.move.js',
      './assets/js/vendor/jquery.event.swipe.js',
    ];

    $.getScript(scripts[0]);
    $.getScript(scripts[1], function() {
      slider.unslider('initSwipe');
    });
</script>
</html>