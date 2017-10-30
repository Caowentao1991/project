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
    $('#create_date').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      startView:1
    });
  });
  
  function search(){
    var user_name = $('#user_name').val();
    var money = $('#money').val();
    var business_type= $('#business_type').val();
    var transfer_id = $('#transfer_id').val();
    var pay_status = $('#pay_status').val();
    var create_date = $('#create_date').val();
    

    window.location.href = "/admin/index.php/user/user_log?user_name="+user_name+"&money="+money+"&business_type="+business_type+"&transfer_id="+transfer_id+"&pay_status="+pay_status+"&create_date="+create_date;
  }
</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	 用户日志
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
                  <label>用户名</label>
                  <input type="text" name="user_name" id="user_name" maxlength="15" style="width: 100px" value="<?=empty($_GET['user_name'])?'':$_GET['user_name']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>金额</label>
                  <input type="text" name="money" id="money" maxlength="15" style="width: 100px" value="<?=empty($_GET['money'])?'':$_GET['money']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>业务类型</label>
                    <select name="business_type" id="business_type" style="width: 100px">
                      <option value="-1" <?php if(!empty($_GET['business_type']) || isset($_GET['business_type'])){echo $_GET['business_type']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="1" <?php if(!empty($_GET['business_type']) || isset($_GET['business_type'])){echo $_GET['business_type']=="1"?'selected = "selected"':'';}?>>借款</option>
                      <option value="2" <?php if(!empty($_GET['business_type']) || isset($_GET['business_type'])){echo $_GET['business_type']=="2"?'selected = "selected"':'';}?>>还款</option>
                    </select>
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>打款编号</label>
                  <input type="text" name="transfer_id" id="transfer_id" maxlength="18" style="width: 140px" value="<?=empty($_GET['transfer_id'])?'':$_GET['transfer_id']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>日志状态</label>
                    <select name="pay_status" id="pay_status" style="width:50px">
                      <option value="-1" <?php if(!empty($_GET['pay_status']) || isset($_GET['pay_status'])){echo $_GET['pay_status']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="0" <?php if(!empty($_GET['pay_status']) || isset($_GET['pay_status'])){echo $_GET['pay_status']=="1"?'selected = "selected"':'';}?>>未处理</option>
                      <option value="1" <?php if(!empty($_GET['pay_status']) || isset($_GET['pay_status'])){echo $_GET['pay_status']=="1"?'selected = "selected"':'';}?>>处理成功</option>
                    </select>
                </span>
                
                <span style="float:left;margin-top: 10px;margin-left: 8px;">
                  <label>创建时间</label>
                    <input type="text" name="create_date" id="create_date" maxlength="255" style="width:100px" value="<?=empty($_GET['create_date'])?'':$_GET['create_date']?>">
                </span>
  
                <span style="float: left;margin-left: 8px;margin-top: 10px;">
                  <button type="submit" onclick="search()">搜索</button>
                </span>
              </h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="width:1160px;overflow-x:scroll;">
              <table class="table table-bordered" style="max-width:2000px;width:2000px">
                <thead>
                <tr>
                  <th>用户ID</th>
                  <th style="width: 75px;">用户名</th>
                  <th>金额</th>
                  <th>业务类型</th>
                  <th>本金</th>
                  <th>利息</th>
                  <th>服务费</th>
                  <th>优惠金额</th>
                  <th>罚息</th>
                  <th>还款计划编号</th>
                  <th>打款编号</th>
                  <th>日志来源</th>
                  <th>日志状态</th>
                  <th>创建时间</th>
                  <th>更新时间</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)){foreach ($data as $k=>$v){?>
                	<tr>
                		<td><?php echo $v['user_id'];?></td>
                		<td><?php echo $v['user_name'];?></td>
                		<td><?php echo $v['money'];?></td>
                		<td><?php echo $v['business_type'];?></td>
                		<td><?php echo $v['capital'];?></td>
                		<td><?php echo $v['interest'];?></td>
                		<td><?php echo $v['service_amount'];?></td>
                		<td><?php echo $v['coupons_amount'];?></td>
                		<td><?php echo $v['faxi'];?></td>
                		<td><?php echo $v['repay_id'];?></td>
                		<td><?php echo $v['transfer_id'];?></td>
                		<td><?php echo $v['orgin'];?></td>
                		<td><?php echo $v['pay_status'];?></td>
                		<td><?php echo $v['create_date'];?></td>
                    <td><?php echo $v['update_time'];?></td>
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