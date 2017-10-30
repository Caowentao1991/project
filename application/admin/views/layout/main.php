<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url().'static/Admin/public'.'favicon.ico'?>">
    <link rel="stylesheet" href="<?=base_url().'static/Admin/public'.'/css/vendor/bootstrap/dist/bootstrap.css'?>">
    <link rel="stylesheet" href="<?=base_url().'static/Admin/public'.'/css/vendor/Animate.css'?>">
    <link rel="stylesheet" href="<?=base_url().'static/Admin/public'.'/css/basic.css'?>">
    <link rel="stylesheet" href="<?=base_url().'static/Admin/public'.'/css/vendor/font_awesome/css/font-awesome.css'?>">
    <link rel="stylesheet" href="<?=base_url().'static/Admin/public'.'/js/vendor/uploadify/mydemo/uploadify-demo.css'?>">
    <!--[if lt IE 9]>
    <script src="<?=base_url().'static/Admin/public';?>/js/vendor/html5shiv.min.js"></script>
    <script src="<?=base_url().'static/Admin/public';?>/js/vendor/respond.min.js"></script>

    <![endif]-->
    <script>
        window.common_conf = {
            defaultHash: 'Action/index',
            baseURL: '/admin/index.php/',
            navJSON: '<?=base_url().'static/Admin/server/'.'nav.json'?>'
        };
    </script>
</head>

<body>
<header id="page_header">
    <div class="logow animated fadeInLeft"><a href="#"><img src="<?=GLOBAL_URL.'logo.png'?>" width="56"></a></div>
    <div class="right_side">
        <!--<span class="fullScreen_btn"><i class="fa fa-arrows-alt"></i></span>-->
        <span class="logout_btn J_confirm_modal" data-target="/admin/index.php/action/logout" data-tip="确认退出吗？"><i class="fa fa-sign-out"></i></span>
        <span class="toggleMenu_btn"><i class="fa fa-bars"></i></span>
    </div>
</header>
<aside id="left_panel">
    <div class="login_info">
            <span>
                <div>
                    <a href="#" data-toggle="dropdown">
                        <i class="fa fa-user"></i><span class="name"><?=$username;?></span><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" class="J_ajax_content_modal" data-href="/admin/index.php/admin/editUser?id=<?=$id;?>">设置</a></li>
                        <li><a tabindex="-1" href="#" class="J_confirm_modal" data-target="/admin/index.php/action/logout" data-tip="确认退出吗？">退出</a></li>
                    </ul>
                </div>
            </span>
    </div>
    <script id="nav_tpl" type="text/html">
        <ul>
            {{foreach nav as bigMenu i}}
            <li><a href="#{{bigMenu.url}}"><i class="fa fa-lg fa-fw {{bigMenu.class}}"></i><span>{{bigMenu.t}}</span>{{if bigMenu.child && bigMenu.child.length >= 1}}<b><i class="fa fa-plus-square-o"></i></b>{{/if}}</a>
                {{if bigMenu.child && bigMenu.child.length >= 1}}
                <ul>
                    {{foreach bigMenu.child as medMenu j}}
                    <li><a href="#{{medMenu.url}}"><i class="fa fa-fw fa-file"></i><span>{{medMenu.t}}</span>{{if medMenu.child && medMenu.child.length >= 1}}<b><i class="fa fa-plus-square-o"></i></b>{{/if}}</a>
                        {{if medMenu.child && medMenu.child.length >= 1}}
                        <ul>
                            {{foreach medMenu.child as minMenu k}}
                            <li><a href="#{{minMenu.url}}"><i class="fa fa-fw fa-file"></i><span>{{minMenu.t}}</span></a></li>
                            {{/foreach}}
                        </ul>
                        {{/if}}
                    </li>
                    {{/foreach}}
                </ul>
                {{/if}}
            </li>
            {{/foreach}}
        </ul>
    </script>
    <nav></nav>
    <span class="minifyBtn"><i class="fa fa-arrow-circle-left"></i></span>
</aside>
<div id="main">
    <div id="ribbon"><ol class="breadcrumb"></ol></div>
    <div id="content">

    </div>
</div>
<footer id="page_footer">
</footer>
<!--Common Modal -->
<div class="modal fade" id="modal_ajax_content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"><div class="modal-content"></div></div>
</div>
<div class="modal fade" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body"></div>
            <div class="modal-footer" style="text-align:center;">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-danger J_confirm_btn"><i class="fa fa-refresh fa-spin"></i> 确定</button>
            </div>
        </div>
    </div>
</div>
<?php include_once ADMIN_PATH.'views/inc/footer.php'; ?>
</body>
</html>