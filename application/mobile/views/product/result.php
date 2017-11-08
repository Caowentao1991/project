<!DOCTYPE html>
<html>

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
    <title>链客-产品详情</title>
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>

    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css" />
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/swiper.min.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/pubStyle.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/styleSpan.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/product_result.css">
    <style>
        .scroller-pullUp {
            width: 100%;
            height: .8rem;
            text-align: center;
            font-size: .26rem;
            line-height: .8rem;
        }

        .scroller-pullUp img {
            width: .35rem;
            height: .35rem;
            position: relative;
            top: .08rem;
            margin-right: .1rem;
        }

        .iScrollIndicator {
            color: #44b7f7;
            opacity: .3;
        }

    </style>
</head>

<body>
<div class="container">
    <!--头部-->
    <header class="product_result_head"> <span class="back"></span>
        <a href="/mobile"><img src="<?=base_url();?>static/Main/img/homeWhite.png" alt=""></a>
        <p class="head_title"></p> <span class="product_result_shoucang"></span> </header>
    <!--主体-->
    <div id="wrapper">
        <div class="scroll">
            <div class="details">
                <div class="details_top gradient">
                    <div class="details_dl">
                        <dl class="rate"> <dt>参考日利率</dt>
                            <dd>--</dd>
                        </dl>
                        <dl class="Interest"> <dt>每期利息(元)</dt>
                            <dd>--</dd>
                        </dl>
                        <dl class="quota"> <dt>平均额度</dt>
                            <dd>--</dd>
                        </dl>
                    </div>
                    <div class="details_select">
                        <label class="select_money">
                            <select name="" id="select_money">
                                <option value="" selected disabled>元</option>
                            </select><b>金额</b><img src="<?=base_url();?>static/Main/img/xiasaNJIAO@3x.png" alt=""> </label>
                        <label class="select_time">
                            <select name="" id="select_time">
                                <option value="" selected disabled>期限</option>
                            </select><b>期限</b><img src="<?=base_url();?>static/Main/img/xiasaNJIAO@3x.png" alt=""> </label>
                    </div>
                </div>

            </div>
            <ul class="center_nav" id="center_nav">
                <li class="navOnClick"><span>产品详情</span></li>
<!--                <li><span>用户评论 <b class="evaluateNum"></b></span></li>-->
            </ul>

            <div>
                <!--详情-->
               <div class="details_btm"></div>
            </div>
<!--            <div>-->
<!--                <!--详情-->
<!--                <div class="details_btm"></div>-->
<!--                <!--评论-->
<!--                <div class="evaluate" style="display:none">-->
<!--                    <div class="evaluate_three">-->
<!--                        <div class="evaluate_num">-->
<!--                            <div class="evaluate_apartNumbox"> </div>-->
<!--                        </div>-->
<!--                        <!--最热评论-->
<!--                        <h3 class="hot-comment-title">-->
<!--                            最热评论-->
<!--                        </h3>-->
<!--                        <!--最热评论列表-->
<!--                        <div class="hot-comment-list">-->
<!---->
<!--                        </div>-->
<!--                        <!--最新评论-->
<!--                        <h3 class="new-comment-title">-->
<!--                            最新评论-->
<!--                        </h3>-->
<!--                        <!--最新评论列表-->
<!--                        <div class="new-comment-list"></div>-->
<!--                        <div id="PullUp" class="scroller-pullUp"><img src="--><?//=base_url();?><!--static/Main/img/rolling.svg" alt="">努力加载中</div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>
    </div>
    <!--底部-->
    <div class="product_result_btm">
<!--        <dl class="pr_kf"> <dt></dt>-->
<!--            <dd>客服</dd>-->
<!--        </dl>-->
<!--        <dl class="pr_gl"> <dt></dt>-->
<!--            <dd>攻略</dd>-->
<!--        </dl> -->
        <span class="jiekuan gradient">立即申请</span> </div>
    <!--悬浮切换按钮-->
    <ul class="fixed_tab">
        <li class="navOnClick fixed_li"><span>产品详情</span></li>
<!--        <li class="fixed_li"><span>用户评论 <b class="evaluateNum"></b></span></li>-->
    </ul>
<!--    <div class="addcommentIcon"></div>-->
    <!--回复输入区-->
    <div class="replyBox">
        <textarea placeholder="" id="reply" class="reply"></textarea>
        <!--            <input type="textarea" placeholder="回复楼主" id="reply" class="reply" maxlength="140">-->
        <button id="send">发送</button>
        <span class="numLen"></span>
    </div>
    <!--回复弹窗-->
    <div class="replyCover">
        <div class="replyPopup"></div>
    </div>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js"></script>
<script src="<?=base_url();?>static/Main/js/iscroll/iscroll-probe.min.js"></script>
<script src="<?=base_url();?>static/Main/js/swipe/swiper.min.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js"></script>
<script src="<?=base_url();?>static/Main/js/controler/product_result.js"></script>
<script src="<?=base_url();?>static/Main/js/statistics.js"></script>
</body>

</html>
