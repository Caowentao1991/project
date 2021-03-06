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
    <title>链客-设置</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/mine_personal.css"> </head>

<body>
<div class="container">
    <header id="header"><a href="/mobile/index.php/mine"><span class="backBtn"></span></a>设置</header>
    <div class="mine_personal_main">
        <div class="aboutour">关于我们<span class="jiantou"></span></div>
        <div class="cooperation">商务合作 <span class="jiantou"></span></div>
        <div class="changemima">修改密码 <span class="jiantou"></span></div>
        <div id="back" style="display:none">退出登录<span class="jiantou"></span></div>
    </div>
    <footer>当前版本 v2.8.3 <br>极速贷款，上链客 </footer>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>

<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/mine_personal_setup.js"></script>
<!--<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>-->
<!--<script src="--><?//=base_url();?><!--static/Main/js/wx_sdk.min.js"></script>-->
<!--<script src="--><?//=base_url();?><!--static/Main/js/statistics.js"></script>-->
</body>

</html>
