<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>现金贷后台管理系统</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url().'assets/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url().'assets/admin/css/ionicons.min.css'?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url().'assets/dist/css/AdminLTE.min.css'?>">

  <link rel="stylesheet" href="<?=base_url().'assets/dist/css/skins/_all-skins.min.css'?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url().'plugins/iCheck/flat/blue.css'?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url().'plugins/morris/morris.css'?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url().'plugins/jvectormap/jquery-jvectormap-1.2.2.css'?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url().'plugins/datepicker/datepicker3.css'?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url().'plugins/daterangepicker/daterangepicker.css'?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url().'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url().'plugins/datatables/dataTables.bootstrap.css'?>">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php 
  if($this->load->session->userdata['admin_data']['role_id']!=1){
$this->load->view('inc/qd.php');
  }else{
    $this->load->view('inc/sidebar.php');
  }
  	


  ?>
  <script type="text/javascript">
    $(function () {
      $('#register_time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii:ss',
      });
    });
    
    function search(){
      var real_name = $('#real_name').val();
      var mobile = $('#mobile').val();
      var idno= $('#idno').val();
      var cardpassed = $('#cardpassed').val();
      var mobilepassed = $('#mobilepassed').val();
      var register_time = $('#register_time').val();
      var login_origin = $('#login_origin').val();
      

      window.location.href = "/admin/index.php/user/index?real_name="+real_name+"&mobile="+mobile+"&idno="+idno+"&cardpassed="+cardpassed+"&mobilepassed="+mobilepassed+"&register_time="+register_time+"&login_origin="+login_origin;
    }
  </script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	用户基础信息列表
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <span style="float: left;margin-top: 10px;">
                  <label>姓名</label>
                  <input type="text" name="real_name" id="real_name" maxlength="10" style="width: 100px" value="<?=empty($_GET['real_name'])?'':$_GET['real_name']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>手机号码</label>
                  <input type="text" name="mobile" id="mobile" maxlength="15" style="width: 100px" value="<?=empty($_GET['mobile'])?'':$_GET['mobile']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>身份证号码</label>
                  <input type="text" name="idno" id="idno" maxlength="18" style="width: 140px" value="<?=empty($_GET['idno'])?'':$_GET['idno']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>银行卡认证状态</label>
                    <select name="cardpassed" id="cardpassed" style="width: 100px">
                      <option value="-1" <?php if(!empty($_GET['cardpassed']) || isset($_GET['cardpassed'])){echo $_GET['cardpassed']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="1" <?php if(!empty($_GET['cardpassed']) || isset($_GET['cardpassed'])){echo $_GET['cardpassed']=="1"?'selected = "selected"':'';}?>>未证认</option>
                      <option value="2" <?php if(!empty($_GET['cardpassed']) || isset($_GET['cardpassed'])){echo $_GET['cardpassed']=="2"?'selected = "selected"':'';}?>>认证中</option>
                      <option value="3" <?php if(!empty($_GET['cardpassed']) || isset($_GET['cardpassed'])){echo $_GET['cardpassed']=="3"?'selected = "selected"':'';}?>>认证成功</option>
                      <option value="4" <?php if(!empty($_GET['cardpassed']) || isset($_GET['cardpassed'])){echo $_GET['cardpassed']=="4"?'selected = "selected"':'';}?>>认证失败</option>
                    </select>
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>运营商认证状态</label>
                    <select name="mobilepassed" id="mobilepassed" style="width: 100px">
                      <option value="-1" <?php if(!empty($_GET['mobilepassed']) || isset($_GET['mobilepassed'])){echo $_GET['mobilepassed']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="1" <?php if(!empty($_GET['mobilepassed']) || isset($_GET['mobilepassed'])){echo $_GET['mobilepassed']=="1"?'selected = "selected"':'';}?>>未证认</option>
                      <option value="2" <?php if(!empty($_GET['mobilepassed']) || isset($_GET['mobilepassed'])){echo $_GET['mobilepassed']=="2"?'selected = "selected"':'';}?>>认证中</option>
                      <option value="3" <?php if(!empty($_GET['mobilepassed']) || isset($_GET['mobilepassed'])){echo $_GET['mobilepassed']=="3"?'selected = "selected"':'';}?>>认证成功</option>
                      <option value="4" <?php if(!empty($_GET['mobilepassed']) || isset($_GET['mobilepassed'])){echo $_GET['mobilepassed']=="4"?'selected = "selected"':'';}?>>认证失败</option>
                    </select>
                </span>
                <span style="float:left;margin-top: 10px;">
                  <label>注册时间</label>
                    <input type="text" name="register_time" id="register_time" maxlength="255" style="width:100px" value="<?=empty($_GET['register_time'])?'':$_GET['register_time']?>">
                </span>
                <span style="float:left;margin-left:8px;margin-top: 10px;">
                  <label>注册来源</label>
                    <select name="login_origin" id="login_origin" style="width: 100px;">
                      <option value="-1" <?php if(!empty($_GET['login_origin']) || isset($_GET['login_origin'])){echo $_GET['login_origin']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="1" <?php if(!empty($_GET['login_origin']) || isset($_GET['login_origin'])){echo $_GET['login_origin']=="1"?'selected = "selected"':'';}?>>H5</option>
                      <option value="2" <?php if(!empty($_GET['login_origin']) || isset($_GET['login_origin'])){echo $_GET['login_origin']=="2"?'selected = "selected"':'';}?>>IOS</option>
                      <option value="3" <?php if(!empty($_GET['login_origin']) || isset($_GET['login_origin'])){echo $_GET['login_origin']=="3"?'selected = "selected"':'';}?>>安卓</option>
                    </select>
                </span>

                <span style="float: left;margin-left: 8px;margin-top: 10px;">
                  <button type="submit" onclick="search()">搜索</button>
                </span>
              </h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>手机号码</th>
                  <th>真实姓名</th>
                  <th>身份证号码</th>
                  <th>居住地区</th>
                  <th>银行卡认证状态</th>
                  <th>运营商认证状态</th>
                  <th>注册时间</th>
                  <th>最近登录时间</th>
                  <th>推广来源</th>
                  <th>注册来源</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)){foreach ($data as $k=>$v){?>
                	<tr>
                		<td><?php echo $v['id'];?></td>
                		<td><?php echo $v['mobile'];?></td>
                		<td><?php echo $v['real_name'];?></td>
                		<td><?php echo $v['idno'];?></td>
                		<td><?php echo $v['area'];?></td>
                		<td><?php echo $v['cardpassed_status'];?></td>
                		<td><?php echo $v['mobilepassed_status'];?></td>
                		<td><?php echo $v['register_time'];?></td>
                		<td><?php echo $v['login_time'];?></td>
                		<td><?php echo $v['tg_location'];?></td>
                		<td><?php echo $v['origin'];?></td>
                	</tr>
                <?php }}?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <span>共计：<?php echo $num;?>记录,<?php echo $total_pages; ?>页</span>
              <ul class="pagination pagination-sm no-margin pull-right">
                <?php echo $page;?>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  	$this->load->view('inc/footer.php');
  ?>  
</div>
<!-- jQuery 2.2.3 -->
<script src="<?=base_url().'plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url().'assets/admin/js/libs/jquery-ui.min.js'?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url().'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<!-- Morris.js charts -->
<script src="<?=base_url().'assets/admin/js/mods/raphael-min.js'?>"></script>
<script src="<?=base_url().'plugins/morris/morris.min.js'?>"></script>
<!-- Sparkline -->
<script src="<?=base_url().'plugins/sparkline/jquery.sparkline.min.js'?>"></script>
<!-- jvectormap -->
<script src="<?=base_url().'plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'?>"></script>
<script src="<?=base_url().'plugins/jvectormap/jquery-jvectormap-world-mill-en.js'?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url().'plugins/knob/jquery.knob.js'?>"></script>
<!-- daterangepicker -->
<script src="<?=base_url().'assets/admin/js/mods/moment.min.js'?>"></script>
<script src="<?=base_url().'plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- datepicker -->
<script src="<?=base_url().'plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url().'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'?>"></script>
<!-- DataTables -->
<script src="<?=base_url().'plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?=base_url().'plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- Slimscroll -->
<script src="<?=base_url().'plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- FastClick -->
<script src="<?=base_url().'plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url().'assets/dist/js/app.min.js'?>"></script>
</body>
</html>