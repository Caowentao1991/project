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
    <title>链客-商务合作</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/resets.css" />
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/cooperation.css">
</head>


<body>
<div class="container">
    <!--头部-->
    <header id="header">
        <a href="/mobile/index.php/mine/mine_personal_setup"><span class="backBtn"></span></a>
        <a href="/mobile/index.php" class="home_icon"><img src="<?=base_url();?>static/Main/img/homeWhite.png" alt=""></a>链客</header>
    </header>
    <!--主体-->
    <div class="main">
        <div class="banner"><img src="<?=base_url();?>static/Main/img/aboutimg1.png" alt=""></div>
        <ul>
            <li onclick="coop.sdEmail('bd@sudaizhijia.com')">
                <a href="mailto:bd@sudaizhijia.com">bd@sudaizhijia.com</a>
            </li>
            <li>
                <a href="http://www.sudaizhijia.com">www.sudaizhijia.com</a>
            </li>
            <li onclick="coop.sdCall('01053346998')">
                <a href="tel:010-53346998">010-53346998</a>
            </li>
            <li>
                北京智借网络科技有限公司
            </li>
            <li>
                北京市海淀区中关村鼎好大厦
            </li>
        </ul>
    </div>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script>
    function hide() {
        $('#header').hide();
        $('.main').css({
            "margin-top": "0"
        });
    }

</script>
<!--<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>-->
<!--<script src="<?=base_url();?>static/Main/js/cooperation_wx.js"></script>-->
<!--<script src="<?=base_url();?>static/Main/js/statistics.js"></script>-->

</body>

</html>
