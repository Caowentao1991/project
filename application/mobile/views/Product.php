<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- 添加到主屏后的标题（iOS 6 新增） -->
    <meta name="apple-mobile-web-app-title" content="速贷之家">
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
    <meta name="keywords" content="速贷之家,极速贷款,快速贷款、快速分期一站式智能搜索比价平台,帮助借款人选择最适合他的借款方案" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>速贷之家-速贷大全</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/swiper.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css" />
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/pubStyle.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/styleSpan.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/products.css">
</head>

<body>
<div class="container">
    <!--头部-->
    <header class="product_head">
        <div class="product_head_top">
<!--            <a href="cityList.html" class="cityLocation"></a>速贷大全-->
            速贷大全
<!--            <a href="accurte_no.html" class="accurate"></a>-->
        </div>
        <div class="product_head_btm">
            <span class="money"><em>金额不限</em><i></i></span> <span class="loanType"><em>个性选择</em><i></i></span> </div>
    </header>
    <!--主体-->
    <div class="product_main" id="wrapper" style="overflow:hidden">
        <div class="warpper">
            <div id="PullDown" class="scroller-pullDown"><img src="<?=base_url();?>static/Main/img/rolling.svg" /><span id="pullDown-msg" class="pull-down-msg">下拉刷新</span></div>
            <!--产品列表-->
            <div class="scroll">
                <p class="productsTopIcon"><img src="<?=base_url();?>static/Main/img/productsTopIcon.png" alt=""><b>申请３款以上产品成功率更高</b></p>
                <div id="productList"></div>
            </div>
            <div id="PullUp" class="scroller-pullUp"><img src="<?=base_url();?>static/Main/img/rolling.svg" alt="">努力加载中</div>
        </div>
    </div>
    <!--底部-->
    <footer class="product_foot fixed_nav">
        <dl>
            <a href="/mobile" name="navtab"> <dt></dt>
                <dd>首页</dd>
            </a>
        </dl>
        <dl>
            <a href="#"> <dt></dt>
                <dd>速贷大全</dd>
            </a>
        </dl>
<!--        <dl>-->
<!--            <a href="forum.html" name="navtab"> <dt></dt>-->
<!--                <dd>社区</dd>-->
<!--            </a>-->
<!--        </dl>-->
        <dl>
            <a href="index.php/Mine" name="navtab"> <dt></dt>
                <dd>我的</dd>
            </a>
        </dl>
    </footer>
    <!--选项弹出层top-->
    <div class="cover_top">

        <div class="moneyCover" id="wrapper2">
            <ul>
                <li>金额不限</li>
                <li>500元</li>
                <li>1000元</li>
                <li>1500元</li>
                <li>2000元</li>
                <li>3000元</li>
                <li>4000元</li>
                <li>5000元</li>
                <li>6000元</li>
                <li>7000元</li>
                <li>8000元</li>
                <li>9000元</li>
                <li>10000元</li>
                <li>15000元</li>
                <li>20000元</li>
                <li>30000元</li>
                <li>50000元</li>
                <li>10万元</li>
                <li>20万元</li>
            </ul>
        </div>
        <div class="loanTypeCover">

            <div class="loanTypeCoverContent">
                <h3>我是</h3>
                <div class="indentBox">
                    <span id="indent0" data-id="0" style="display:none">身份不限</span><span id="indent2" data-id="2">上班族</span><span id="indent1" data-id="1">学生党</span> <span id="indent3" data-id="3">生意人</span> <span id="indent4" data-id="4">自由职业</span> </div>
                <h3>我有</h3>
                <div class="have"></div>
                <h3>我要</h3>
                <div class="need"></div>
            </div>
            <div class="button">
                <button class="resetBtn">重置</button>
                <button class="sureBtn">确认</button>
            </div>
        </div>
    </div>
    <!--选项弹出层btm-->
    <div class="cover_btm">
        <ul class="cover_btm_box">
            <li data-value="1" id="sort1">默认综合排名<i></i></li>
            <li data-value="2" id="sort2">成功率<i></i></li>
            <li data-value="3" id="sort3">最新产品<i></i></li>
            <li data-value="4" id="sort4">速度<i></i></li>
            <li data-value="5" id="sort5">利率<em></em></li>
            <li data-value="6" id="sort6">额度<i></i></li>
        </ul>
    </div>
    <!--排序按钮-->
    <div class="sortBrn"></div>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/iscroll/iscroll-probe.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/product.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/statistics.js"></script>
</body>

</html>
