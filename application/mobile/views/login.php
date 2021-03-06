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
    <meta name="format-detection" content="telephone=no, email=no" />
    <!--清除缓存 微信浏览器缓存严重又无刷新-->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="keywords" content="链客,极速贷款,快速贷款、快速分期一站式智能搜索比价平台,帮助借款人选择最适合他的借款方案" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>链客-登录</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/login.css">
</head>
<style>
    input::-webkit-input-placeholder {
        color: #999;
    }

    .phone,
    .login_zhang_p1 input,
    .login_zhang_p2 input {
        height: .9rem;
        line-height: .4rem;
        font-size: .3rem;
        padding-left: .3rem;
    }

    .phone {
        width: 100%;
        margin-top: .4rem;
    }

    .login_zhang_p1,
    .login_zhang_p2 {
        width: 100%;
        height: .9rem;
        background: white;
        position: relative;
        font-size: 0;
    }

    .login_zhang_p1 input,
    .login_zhang_p2 input {
        width: 5.9rem;
        line-height: .4rem;
        color: #4d4d4d;
    }

    .phone_x {
        width: .8rem;
        height: .9rem;
        position: absolute;
        top: 0;
        right: .8rem;
        background: url('/static/Main/img/qingchu@3x.png') no-repeat center;
        background-size: .4rem .4rem;
        cursor: pointer;
        display: none;
    }

    .login_zhang_p1 {
        border-bottom: 1px solid #e6e6e6;
        margin-top: .4rem;
    }

    .login_zhang_p2 .phone_x {
        right: .8rem;
    }

    .pwd_yan {
        position: absolute;
        right: 0;
        top: 0;
        width: .8rem;
        height: .9rem;
        background: url("/static/Main/img/bukejian@3x.png") no-repeat center .26rem;
        background-size: .36rem;
        cursor: pointer
    }

    .pwd_yan.kan {
        background: url("/static/Main/img/kejian@3x.png") no-repeat center .28rem;
        background-size: .36rem;
    }

    .href_p {
        color: #4d4d4d;
        font-size: .28rem;
        text-align: center;
        padding-top: .4rem;
    }

</style>

<body>
<div class="container">
    <!--头部-->
    <header><span class="login_back_btn"> </span>登录</header>
    <!--主体-->
    <section>
        <!--tab切换-->
        <div class="top_tab"> <a class="show">快捷登录</a> <a>账号登录</a> </div>
        <div>
            <div class="tab_one tabBox" style="display:block">
                <input type="number" class="phone" placeholder="输入手机号" onfocus="this.placeholder=''" onblur="if(this.placeholder=='') this.placeholder='请输入手机号' " style="background: white;" oninput="if(value.length>11)value=value.slice(0,11)"> <span class="btn btn_one">获取手机验证码</span> </div>
            <div class="tab_two tabBox">
                <p class="login_zhang_p1 login_zhang">
                    <input type="number" id="phone_zhang" class="input" placeholder="输入手机号" onfocus="this.placeholder=''" onblur="if(this.placeholder=='') this.placeholder='请输入手机号' " oninput="if(value.length>11)value=value.slice(0,11)"><span class="phone_x"></span> </p>
                <p class="login_zhang_p2 login_zhang">
                    <input type="password" id="password" class="input" placeholder="6-20位密码" onfocus="this.placeholder=''" onblur="if(this.placeholder=='') this.placeholder='6-20位密码' "><span class="phone_x"></span><span class="pwd_yan" style="cursor:pointer;"></span></p> <span class="btn btn_two" id="btn">登录</span>
                <p class="href_p"><a href="/mobile/index.php/login">免注册登录</a> &nbsp;|&nbsp; <a href="forgetPhone.html" class="forget" style="color:#0064ff">忘记密码</a></p>
            </div>
        </div>
    </section>
    <!--底部-->
    <footer> 极速贷款，上链客 </footer>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/geetest.min.js"></script>
<script src="<?=base_url();?>static/Main/js/jquery.md5.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/login.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/statistics.js"></script>
</body>

</html>
