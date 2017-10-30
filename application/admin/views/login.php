<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
	<title>工作台</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?=GLOBAL_URL;?>favicon.ico">
	<link rel="stylesheet" href="<?=base_url();?>static/Admin/public/css/vendor/bootstrap/dist/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url();?>static/Admin/public/css/vendor/Animate.css">
	<link rel="stylesheet" href="<?=base_url();?>static/Admin/public/css/basic.css">
	<link rel="stylesheet" href="<?=base_url();?>static/Admin/public/css/vendor/font_awesome/css/font-awesome.css">
	<!--[if lt IE 9]>
	<script src="<?=base_url();?>static/Admin/public/js/vendor/html5shiv.min.js"></script>
	<script src="<?=base_url();?>static/Admin/public/js/vendor/respond.min.js"></script>
	<![endif]-->

</head>

<body>
<div class="container">
	<form class="form-signin" method="post" action="<?=site_url("action/login");?>">
		<div class="logo animated bounceIn"><img src="<?=GLOBAL_URL;?>logo.png" style="max-width: 70%"/></div>
		<input type="hidden" name="url" class="form-control" value="<?=empty($_GET['url'])?'':$_GET['url']?>">
		<div class="form-group">
			<!--[if lt IE 9]><label>用户名</label><![endif]-->
			<input type="text" name="admin" class="form-control" placeholder="用户名" required="required" autofocus="autofocus">
		</div>
		<div class="form-group">
			<!--[if lt IE 9]><label>密码</label><![endif]-->
			<input type="password" name="password" class="form-control" placeholder="密码" required="required">
		</div>
		<button class="btn btn-lg btn-primary btn-block subBtn" type="submit">登录</button>
	</form>
</div>


<script src="<?=base_url();?>static/Admin/public/js/vendor/jquery.min.js"></script>
<script src="<?=base_url();?>static/Admin/public/js/vendor/bootstrap/dist/bootstrap.js"></script>
<script src="<?=base_url();?>static/Admin/public/js/vendor/ie10-viewport-bug-workaround.js"></script>
</body>
</html>