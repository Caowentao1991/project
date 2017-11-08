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
    <title>链客-链客</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/resets.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/mine_aboutourH5.css"> </head>
<style>


</style>

<body>
<div class="container">
    <header id="header">
        <a href="/mobile/index.php/mine/mine_personal_setup"><span class="backBtn"></span></a>
        <a href="/mobile/index.php" class="home_icon"><img src="<?=base_url();?>static/Main/img/homeWhite.png" alt=""></a>链客</header>
    <div id="wrapper">
        <img src="<?=base_url();?>static/Main/img/aboutimg1.png" alt="">
        <img src="<?=base_url();?>static/Main/img/aboutimgline.png" alt="" class="lineimg">
        <p>通过链客自行开发的“智借大数据精准匹配”系统可以在极短时间内帮借款用户匹配最合适的借款平台。通过综合分析借款用户的借款需求、信用情况，为其推荐“一站式、个性化”的解决方案，解决用户在急用钱、消费分期、小额资金周转时，借款难、借款贵的问题。</p>
        <ul class="centerIcon">
            <li><img src="<?=base_url();?>static/Main/img/aboutimg21.png" alt=""></li>
            <li><img src="<?=base_url();?>static/Main/img/aboutimg22.png" alt=""></li>
            <li><img src="<?=base_url();?>static/Main/img/aboutimg23.png" alt=""></li>
        </ul>
        <p>截止目前，每天都有百万级用户使用链客，链客自上线以来已累计推荐数以亿计的借款申请。</p>
        <img src="<?=base_url();?>static/Main/img/aboutimgline.png" alt="" class="lineimg" style="margin-top: .1rem">
        <img src="<?=base_url();?>static/Main/img/aboutimg3.png" alt="" style="margin:.3rem 0 .1rem 0">
        <img src="<?=base_url();?>static/Main/img/aboutimgline.png" alt="" class="lineimg">
        <h3>合作伙伴</h3>
        <p style="text-indent:2em">宜信公司、玖富集团、拍拍贷、品钛集团、爱钱进、2345、马上消费金融、捷信消费金融、乐信集团、51信用卡、维信金科、量化派、手机贷、我来贷、用钱宝，捷信、平安银行等。</p>
        <img src="<?=base_url();?>static/Main/img/aboutimg4.png" alt="" class="imgIcon">
        <a href="/mobile/index.php/product"><img src="<?=base_url();?>static/Main/img/aboutimg5.png" alt="" class="btm"></a>
    </div>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script>
    function hide() {
        $('#header').hide();
        $('#wrapper').css({
            "margin-top": "0"
        });
        $('.btm').hide();
    }

</script>
<!--<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>-->
<!--<script src="../js/mine_aboutour_wx.js"></script>-->
<!--<script src="../js/statistics.js"></script>-->

</body>

</html>
