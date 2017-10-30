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
	$this->load->view('inc/sidebar.php');
?>

<script type="text/javascript">
  
  function search(){
    var user_id         = $('#user_id').val();
    var user_name       = $('#user_name').val();
    var real_name       = $('#real_name').val();
    var idno            = $('#idno').val();
    var mobile          = $('#mobile').val();
    var sign_no         = $('#sign_no').val();


    window.location.href = "/admin/index.php/message/card?user_id="+user_id+"&user_name="+user_name+"&real_name="+real_name+"&idno="+idno+"&mobile="+mobile+"&sign_no="+sign_no;
  }
</script>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	银行卡信息
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>用户ID</label>
                  <input type="text" name="user_id" id="user_id" maxlength="15" style="width: 100px" value="<?=empty($_GET['user_id'])?'':$_GET['user_id']?>">
                </span>

                <span style="float: left;margin-top: 10px;">
                  <label>用户名</label>
                  <input type="text" name="user_name" id="user_name" maxlength="15" style="width: 100px" value="<?=empty($_GET['user_name'])?'':$_GET['user_name']?>">
                </span>
                
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>真实姓名</label>
                  <input type="text" name="real_name" id="real_name" maxlength="25" style="width: 100px" value="<?=empty($_GET['real_name'])?'':$_GET['real_name']?>">
                </span>

                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>身份证号</label>
                  <input type="text" name="idno" id="idno" maxlength="25" style="width: 160px" value="<?=empty($_GET['idno'])?'':$_GET['idno']?>">
                </span>

                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>手机号</label>
                  <input type="text" name="mobile" id="mobile" maxlength="25" style="width: 140px" value="<?=empty($_GET['mobile'])?'':$_GET['mobile']?>">
                </span>

                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>绑卡标示</label>
                  <input type="text" name="sign_no" id="sign_no" maxlength="25" style="width: 150px" value="<?=empty($_GET['sign_no'])?'':$_GET['sign_no']?>">
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
                  <th>序号</th>
                  <th>用户ID</th>
                  <th>用户名</th>
                  <!--<th>用户标示</th>-->
                  <th>真实姓名</th>
                  <th>身份证号</th>
                  <th>手机号</th>
                  <th>绑卡标示</th>
                  <th>银行卡号</th>
                  <th>银行名称</th>
                  <th>该卡是否有效</th>
                  <th>开户银行地址</th>
                  <th>创建时间</th> 
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)){foreach ($data as $k=>$v){?>
                	<tr>
                		<td><?php echo $v['id'];?></td>
                		<td><?php echo $v['user_id'];?></td>
                		<td><?php echo $v['user_name'];?></td>
                		<!--<td><?php //echo $v['cust_no'];?></td>-->
                		<td><?php echo $v['real_name'];?></td>
                		<td><?php echo $v['idno'];?></td>
                    <td><?php echo $v['mobile'];?></td>
                    <td><?php echo $v['sign_no'];?></td>
                    <td><?php echo $v['bank_card'];?></td>
                    <td><?php echo $v['bank'];?></td>
                    <td><?php echo $v['is_effect'];?></td>
                    <td><?php echo $v['bank_address'];?></td>
                    <td><?php echo $v['create_time'];?></td>
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