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
    <title>链客-修改密码</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/login.css"> </head>
<style>
    input::-webkit-input-placeholder {
        color: #999;
    }

    #back {
        width: .2rem;
        height: .32rem;
        background: url("/static/Main/img/headBack.png") no-repeat;
        background-size: 100% 100%
    }

    .login_zhang_p2 {
        width: 100%;
        height: .9rem;
        background: white;
        position: relative;
        margin-top: .45rem;
    }

    label {
        color: #4D4D4D;
        padding-left: .3rem;
        font-size: .3rem;
        float: left;
        line-height: .9rem;
    }

    input {
        position: absolute;
        left: 1.9rem;
        top: .24rem;
        line-height: .44rem;
        color: #4d4d4d;
        font-size: .3rem;
    }

    img {
        width: .4rem;
        height: .4rem;
        position: absolute;
        top: .25rem;
        right: 1rem;
    }

    .pwd_yan {
        position: absolute;
        right: .32rem;
        top: 0;
        width: .36rem;
        height: 100%;
        background: url("/static/Main/img/bukejian@3x.png") no-repeat center .23rem;
        background-size: .36rem;
        cursor: pointer;
    }

    .pwd_yan.kan {
        background: url("/static/Main/img/kejian@3x.png") no-repeat center .25rem;
        background-size: .36rem;
    }

    .sm {
        padding-left: .3rem;
        color: #999;
        font-size: .24rem;
        line-height: .7rem;
    }

</style>

<body>
<div class="container">
    <!--头部-->
    <header><span onclick="javasceipt:history.back(-1);" id="back"></span>修改密码</header>
    <!--主体-->
    <section>
        <p class="login_zhang_p2 login_zhang">
            <label for="password">设置密码</label>
            <input type="password" id="password" placeholder="密码"><span class="pwd_yan"></span></p>
        <p class="sm">密码支持6-20位字符，建议数字、字母、符号组合</p> <span class="btn" style="margin:0 auto">确定</span> </section>
    <!--底部-->
    <footer> 极速贷款，上链客 </footer>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/jquery.md5.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/mine_changemima3.min.js"></script>
<!--<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>-->
<!--<script src="--><?//=base_url();?><!--static/Main/js/wx_sdk.min.js"></script>-->
<!--<script src="--><?//=base_url();?><!--static/Main/js/statistics.js"></script>-->
</body>

</html>
