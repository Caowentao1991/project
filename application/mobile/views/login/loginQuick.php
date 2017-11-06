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
    <meta name="format-detection" content="telephone=no, email=no" />
    <!--清除缓存 微信浏览器缓存严重又无刷新-->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="keywords" content="速贷之家,极速贷款,快速贷款、快速分期一站式智能搜索比价平台,帮助借款人选择最适合他的借款方案" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>速贷之家-登录</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/login.css"> </head>
<style>
    input::-webkit-input-placeholder {
        color: #999;
    }

    #hack {
        width: .2rem;
        height: .32rem;
        background: url("/static/Main/img/headBack.png") no-repeat;
        background-size: 100% 100%
    }

    .yfs p {
        text-align: center;
    }

    .yfs p:nth-of-type(1) {
        font-size: .28rem;
        color: #757575;
        padding-top: .2rem;
        line-height: .6rem;
    }

    .yfs p:nth-of-type(2) {
        font-size: .48rem;
        color: #333;
        line-height: .8rem;
        margin-bottom: .2rem;
    }

    .input_ma {
        width: 100%;
        height: .9rem;
        background: white;
        position: relative;
    }

    input {
        height: .9rem;
        font-size: .3rem;
        padding-left: .3rem;
        font-size: .3rem;
        float: left;
    }

    .input_ma span {
        position: absolute;
        right: 0;
        height: .9rem;
        line-height: .9rem;
        padding-right: .3rem;
        color: #999;
        font-size: .3rem;
    }

</style>

<body>
<div class="container">
    <!--头部-->
    <header><span onclick="javasceipt:history.back(-1);" id="hack"> </span>登录</header>
    <!--主体-->
    <section>
        <!--tab切换-->
        <div class="top_tab"> <a class="show">快捷登录</a> <a href="/mobile/index.php/login">账号登录</a> </div>
        <div class="yfs">
            <p>已获取验证码短信到</p>
            <p>+86 <b></b></p>
        </div>
        <div class="input_ma">
            <input type="text" class="" placeholder="请输入验证码" onfocus="this.placeholder=''" onblur="if(this.placeholder=='') this.placeholder='请输入验证码' "> <span>重新发送（<b class="daojishi">60</b>）</span> </div> <span class="btn">提交</span> </section>
    <!--底部-->
    <footer> 极速贷款，上速贷之家 </footer>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/loginQuick.js"></script>
<script src="<?=base_url();?>static/Main/js/statistics.js"></script>
</body>

</html>
