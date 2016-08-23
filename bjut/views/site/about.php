<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '关于我们';
$this->params['breadcrumbs'][] = $this->title;
?>

<header class="intro-header" style="background-image: url('./assets/img/about-bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="page-heading">
                    <h1>About me...</h1>
                    <hr class="small">
                    <span class="subheading">This is what I do.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="site-about" style="line-height:1.8;">
        <!--code here-->
        <!-- Page Header -->
        <!-- Set your background image for this header on the line below. -->

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2>关于站点的技术实践</h2>
                    <h3 style="line-height:1.4;text-transform: capitalize;">&nbsp; &nbsp;受助于学校星火基金项目，于今年(2016年)年初开始着手准备该项目---基于Web校园资讯平台。该站点的前端的界面由Boostrap框架构建，简洁灵活快捷，并自适应于不同尺寸的屏幕。后端使用PHP语言，并采用了Yii2作为项目后台框架，安全稳定。 该项目旨在为大一新生提供优质的校园信息服务，并希望能作为学生会同学生线上连接的一个枢纽。</h3>

                <hr>

                <h2>关于站长</h2>
                    <h3 style="line-height:1.4;text-transform: capitalize;">&nbsp; &nbsp;15年年秋季从福建赴北京求学，现就读于北京工业大学，现在是北工大软件学院大二学生。就读专业为软件工程，对计算机技术应用十分感兴趣。在大一上学年，我跟随学院课程安排，学习了C语言，并利用课余时间自学Python。大一上学期期末，申报学校星火基金项目，立项“基于Web校园资讯平台”，开始了建站相关知识的学习。</h3>
                    <h3 style="line-height:1.4;text-transform: capitalize;" class="bg-success">&nbsp; &nbsp;在此，特别感谢 <b><a href="http://www.imooc.com/">慕课网</a></b>提供的学习平台，我的<a href="http://www.imooc.com/u/2154172">慕课网主页</a></h3>
                    <h3 style="line-height:1.4;text-transform: capitalize;">&nbsp; &nbsp;由于这个项目基本我在负责，在过去的个月里，我自学了一些前端和后端的编程知识，粗略的学习了HTML5、CSS3、JavaScript、PHP以及MySQL。前端主要使用HTML5和CSS，以及一点点Javascript的基础知识，并且用Bootstrap3为框架，构建了一个可以适配与移动端、PC端的WebAPP。网站的后台采用PHP编写，借以Yii2快速构建出安全稳定的网站后台。在后续的学习中，也接触了其它有趣的知识，在研究Bootstrap的底层实现时，我学习了如何使用Less编写编译出CSS样式文件(后面接触到更强大的Sass :) )，也学习了如何使用Github这样的版本控制系统来使项目的开发更加得心应手。在学习使用Yii2框架的时候，接触到MVC框架思想以及PHP的几种设计模式。</h3>
                    <h3 style="line-height:1.4;text-transform: capitalize;">&nbsp; &nbsp;在做项目的过程中，我学习到的不仅仅是编程知识，所得更多的是那些学习之外的经验与能力，在此便不加赘述。不断的学习、思考与实践，才能更快成长，也正是因为的不停的追求和探索未知，愈发觉得世界之大、知识之浩，愈发觉得自己的无知。学无止境，求索不息。</h3>
                <hr>

                <h2>对网站的希冀</h2>
                    <h3 style="line-height:1.4">&nbsp; &nbsp;萌生做这个项目的想法是因为我自己大一时的迷茫。作为一名刚踏入大学校园的新生，丰富多彩校园生活扑面而来，应接不暇，有时候会觉得招架不住。所以，我希望有一个平台可以给新生提供帮助，可以为他们提供有用的信息，更好的度过那段匆忙的时期。</h3>
                    <h3 style="line-height:1.4">&nbsp; &nbsp;当然，学校老师、学生会同学，在那段时间里给予了新生很大帮助。我印象较深的就是学生会举行了几次迎新活动，在活动中也为新生的提供了许多有价值的校园讯息。向老师、学长们询问确实是解决困惑最快最好最有效的方式。但是通过向高年级学生询问也有不足的地方，因为有些琐事问的话太麻烦别人了，并且有些问题很少人知道（比如我想知道今天北澡堂有没有开、开到几点、放假时期的调整），这类时效性强的信息我希望能够让学生容易获取到。</h3>
                    <h3 style="line-height:1.4">&nbsp; &nbsp;在这里，我想三个方面讲讲关于学校信息服务的不足：
                    <p></p>
                    <ul>
                        <li>学校通知入口难找</li>
                        <h4>学校后勤事务的通知总是很不到位，学生获取学校的后勤信息(如食堂、澡堂、体育馆、教室和实验室等使用情况)大多依靠老师、班长提供。信息的流动慢，并且这样的通知是很被动的，对于真正需要这些信息的同学来说，他们还是需要到处去找这些信息。</h4>
                        <li>优秀活动推广路径单一</li>
                        <h4>校内的活动主要有名师讲座或者公开课、期末串讲以及学生会举办的公众活动等，而校外的一些公益活动、线下活动和各类学科竞赛等等。这些活动大多数依靠学生工作负责人向各班长通知，没有一个集中发布信息的平台，对想参与的学生来说，找到一个心悦的活动困难。</h4>
                        <li>微信公众号太多</li>
                        <h4>有许多给学生提供校园讯息的公众号，这些大多由学生会部门运作。它们大多功能重叠，但是各自提供的信息又常常有空缺，没办法每条资讯都及时发布。学生疲于在不同公众号之间查找自己想要的信息，这样效率十分低下。</h4>
                        <li>信息的流失</li>
                        <h4>无论是学校的通知、学生会活动宣传、微信公众号的文章，有些信息资源的有价值的。比如今年新图书馆的翻建，这是校史上值得纪念的一件事；又或者说一个成功上位学生会的活动举办流程细节，这对于下一届学生会是有借鉴意义的。而优秀的校园公众号推文，例如上学期学院公众号的“创客”专栏，我想应该有个平台将它们都搜集整理。</h4>
                    </ul>
                    </h3>
                    <h3 style="line-height:1.4">&nbsp; &nbsp;而这些，仅仅是网站一小部分夙愿。我更希望它成为一个平台，一个让学生分享自我、促进共同成长的校园站点。所以在构建网站的时候，加入了注册功能，并且嵌入Summernote富文本编辑器，为网站提供文章编辑功能。
                    </h3>
            </div>
        </div>
    </div>
</div>
