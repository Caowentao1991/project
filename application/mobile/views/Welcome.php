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
    <!--便于搜索引擎搜索-->
    <!--地址栏图标-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <script src="<?=base_url();?>static/Main/js/htmlrem.min.js"></script>
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/reset.css" />
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/swiper.min.css" />
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/index.css">
    <link rel="stylesheet" href="<?=base_url();?>static/Main/css/styleSpan.css">
    <title>极速贷款,上速贷之家</title>
</head>

<body>
<div class="container">
    <!--头部-->
    <div class="head_top gradient">
<!--        <div> <span class="message"></span>-->
            <div>
            <div class="select_money">
                <div class="opbg"></div>
                <select name="" id="select_money">
                    <option value="" disabled selected>金额不限</option>
                    <option value="">500元</option>
                    <option value="">1000元</option>
                    <option value="">1500元</option>
                    <option value="">2000元</option>
                    <option value="">3000元</option>
                    <option value="">4000元</option>
                    <option value="">5000元</option>
                    <option value="">6000元</option>
                    <option value="">7000元</option>
                    <option value="">8000元</option>
                    <option value="">9000元</option>
                    <option value="">10000元</option>
                    <option value="">15000元</option>
                    <option value="">20000元</option>
                    <option value="">30000元</option>
                    <option value="">50000元</option>
                    <option value="">10万元</option>
                    <option value="">20万元</option>
                </select><b>您想借多少</b><i></i> </div>
        </div>
    </div>
    <!--主体-->
    <div class="index_main scroller" id="wrapper">
        <div id="thelist">
            <div id="PullDown" class="scroller-pullDown"><img src="<?=base_url();?>static/Main/img/rolling.svg" />&nbsp;&nbsp;<span id="pullDown-msg" class="pull-down-msg">下拉刷新</span></div>
            <!--下方图文导航-->
            <div class="btnImg">
                <div>
                    <a href="/mobile/index.php/product"><img src="<?=base_url();?>static/Main/img/btnImg1.png" alt=""></a>
                    <a href="/mobile/index.php/product"><img src="<?=base_url();?>static/Main/img/btnImg3.png" alt=""></a>
                    <a href="javascript:;" onclick="alert('敬请期待')"><img src="<?=base_url();?>static/Main/img/btnImg2.png" alt=""></a>
                    <a href="javascript:;" onclick="alert('敬请期待')"><img src="<?=base_url();?>static/Main/img/btnImg4.png" alt=""></a>
                </div>
            </div>
            <!--推荐产品-->
            <div class="recommend" style="margin: 0 auto .1rem">
                <h3 class="themes_h3">推荐产品<img src="<?=base_url();?>static/Main/img/!@3x.png" class="promptBtn" id="recommend_Btn"><span class="nextBatch">下一批</span></h3>
                <div id="recommend_list" style="max-height:5.6rem;min-height:2.8rem;overflow: hidden;">

                </div>
            </div>
            <!--速贷专题推荐-->
<!--            <div class="touchImg">-->
<!--                <div class="swiper-container" id="newSelected">-->
<!--                    <div class="swiper-wrapper newSelected">-->
<!--                    </div>-->
<!--                    <!-- Add Scrollbar -->
<!--                    <div class="swiper-scrollbar" style=""></div>-->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--            <!--分类专题-->
<!--            <div class="themes_box">-->
<!--                <div class="themes_imgbox"></div>-->
<!--            </div>-->
            <!--速贷攻略-->
<!--            <div class="strategyBanner">-->
<!--                <a href="http://m.sudaizhijia.com/html/strategy.html"><img src="--><?//=base_url();?><!--static/Main/img/banner@3x.png" alt=""></a>-->
<!--            </div>-->
            <!--新品入驻-->
            <div class="new_terrace">
                <h3 class="themes_h3">新品入驻<img src="<?=base_url();?>static/Main/img/!@3x.png" class="promptBtn" id="new_Btn"></h3>
                <div id="new_terrace"></div>
            </div>

<!--            <div id="PullUp" class="scroller-pullUp">-->
<!--                <p>上拉发现全部产品</p>-->
<!--                <div class="pullUpImg"><img src="--><?//=base_url();?><!--static/Main/img/sudaigeImg1.png" class="pullUpImgOpen" /><img src="--><?//=base_url();?><!--static/Main/img/sudaigeImg2.png" alt="" class="pullUpImgClose"></div>-->
<!--            </div>-->
        </div>
    </div>
    <!--底部-->
    <footer class="index_foot fixed_nav">
        <dl>
            <a href="#"> <dt></dt>
                <dd>首页</dd>
            </a>
        </dl>
        <dl>
            <a href="index.php/Product" name="navtab"> <dt></dt>
                <dd>速贷大全</dd>
            </a>
        </dl>
<!--        <dl>-->
<!--            <a href="http://m.sudaizhijia.com/html/forum.html" name="navtab"> <dt></dt>-->
<!--                <dd>论坛</dd>-->
<!--            </a>-->
<!--        </dl>-->
        <dl class="mine">
            <a href="index.php/Mine" name="navtab"> <dt></dt>
                <dd>我的</dd>
            </a>
        </dl>
    </footer>
</div>
<script src="<?=base_url();?>static/Main/js/jquery.min.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/jquery.cookie-1.4.1.min.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/swipe/swiper.min.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/iscroll/iscroll-probe.min.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/convertor.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/controler/global.js?<?=time();?>"></script>
<script src="<?=base_url();?>static/Main/js/controler/index.js?<?=time();?>" defer></script>
<script src="<?=base_url();?>static/Main/js/statistics.js?<?=time();?>"></script>
<!--<script src="//res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>-->
<!--<script src="http://m.sudaizhijia.com/js/wx_sdk.min.js"></script>-->
<!--<script src="http://webapi.amap.com/maps?v=1.3"></script>-->
<!--<script src="http://api.map.baidu.com/api?v=1.3"></script>-->
</body>

</html>
