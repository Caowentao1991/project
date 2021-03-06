<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- 添加到主屏后的标题（iOS 6 新增） -->
    <meta name="apple-mobile-web-app-title" content="链客">
    <!-- 是否启用 WebApp 全屏模式，删除苹果默认的工具栏和菜单栏 -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- 设置苹果工具栏颜色 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="blue" />
    <!-- 忽略页面中的数字识别为电话，忽略email识别 -->
    <meta name="format-detection" content="telephone=no, email=no,date=no,address=no" />
    <!--清除缓存 微信浏览器缓存严重又无刷新-->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="keywords" content="链客,极速贷款,快速贷款、快速分期一站式智能搜索比价平台,帮助借款人选择最适合他的借款方案" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>链客-我的</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css" />
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/mine.css"> </head>

<body>
<div class="container" style="color:white">
    <!--头部-->
    <div class="mine_main_top">
        <dl id="mine">
            <dt>
            <div>
                <div><img src="" id="hide_img"></div>
            </div>
            <i id="show_img"></i>
            </dt>
            <dd>
                <p><span><b class="mine_username"><a class='pleaseLogin'></a></b></span></p>
            </dd>
        </dl>
        <span class="message"></span> </div>
    <ul class="nav">
        <li class="jifen"><b class="mimnejifen"></b><br>我的积分</li>
        <li class="cash"><b class="mineCash"></b><br>我的现金</li>
        <li class="sign"><span></span><i>签到得积分</i></li>
    </ul>
    <!--主体-->

    <div class="mine_main">
        <div class="mmbl_invite"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu1.gif">邀友得现金</div>
        <div class="mmbl_xinxi"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu2.png" alt="">信用资料</div>
        <div class="mmbl_pipei"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu3.png">智能匹配</div>
        <div class="mmbl_shenqing"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu4.png">我的申请</div>
        <div class="mmbl_jifen"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu5.png">积分商城</div>
        <div class="mmbl_shoucang"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu6.png">我的关注</div>
        <div class="mmbl_bangzhu"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu7.png">帮助中心</div>
        <div class="mmbl_weixin"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu8.png">关注公众号</div>
        <div class="mmbl_shezhi"><img src="<?=base_url();?>static/Main/img/mine_Icon_menu9.png">设置</div>
    </div>
    <!--底部-->
    <footer class="mine_foot fixed_nav">
        <dl>
            <a href="/mobile/index.php" name="navtab"> <dt></dt>
                <dd>首页</dd>
            </a>
        </dl>
        <dl>
            <a href="/mobile/index.php/product" name="navtab"> <dt></dt>
                <dd>速贷大全</dd>
            </a>
        </dl>
<!--        <dl>-->
<!--            <a href="forum.html" name="navtab"> <dt></dt>-->
<!--                <dd>社区</dd>-->
<!--            </a>-->
<!--        </dl>-->
        <dl> <a href="#"><dt></dt>
                <dd>我的</dd></a> </dl>
    </footer>
    <!--关注弹窗-->
    <div class="follow_cover">
        <div class="fc_div">
            <p> 长按图片识别二维码，就能关注
                <br>链客官微啦～ </p> <img src="<?=base_url();?>static/Main/img/erweima.png" alt=""> </div> <img src="<?=base_url();?>static/Main/img/guanzhucha.png" class="fc_btn"> </div>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/mine.js"></script>
<!--<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>-->
<!--<script src="../js/wx_sdk.min.js"></script>-->
<!--<script src="--><?//=base_url();?><!--static/Main/js/statistics.js"></script>-->
</body>

</html>
