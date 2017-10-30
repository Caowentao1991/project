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
    $('#audit_time').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      startView:1
    });
    $('#passed_time').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      startView:1
    });
    $('#apply_time').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      startView:1
    });
  });
  
  function search(){
    var real_name = $('#real_name').val();
    var mobile = $('#mobile').val();
    var apply_amount= $('#apply_amount').val();
    var apply_month = $('#apply_month').val();
    var audit_time = $('#audit_time').val();
    var audit_apply_id = $('#audit_apply_id').val();
    var audit_amount= $('#audit_amount').val();
    var audit_month = $('#audit_month').val();
    var audit_result = $('#audit_result').val();
    var passed_time = $('#passed_time').val();
    var is_effect= $('#is_effect').val();
    var apply_time = $('#apply_time').val();

    window.location.href = "/admin/index.php/loanm/index?real_name="+real_name+"&mobile="+mobile+"&apply_amount="+apply_amount+"&apply_month="+apply_month+"&audit_time="+audit_time+"&audit_apply_id="+audit_apply_id+"&audit_amount="+audit_amount+"&audit_month="+audit_month+"&audit_result="+audit_result+"&passed_time="+passed_time+"&is_effect="+is_effect+"&apply_time="+apply_time;
  }
</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	渠道对账
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
                  <label>申请金额</label>
                  <input type="text" name="apply_amount" id="apply_amount" maxlength="10" style="width: 100px" value="<?=empty($_GET['apply_amount'])?'':$_GET['apply_amount']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>申请期限</label>
                  <input type="text" name="apply_month" id="apply_month" maxlength="10" style="width: 100px" value="<?=empty($_GET['apply_month'])?'':$_GET['apply_month']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>信审日期</label>
                  <input type="text" name="audit_time" id="audit_time" maxlength="255" style="width: 140px" value="<?=empty($_GET['audit_time'])?'':$_GET['audit_time']?>">
                </span>
                <span style="float: left;margin-top: 10px;">
                  <label>信审贷款申请ID</label>
                  <input type="text" name="audit_apply_id" id="audit_apply_id" maxlength="25" style="width: 140px" value="<?=empty($_GET['audit_apply_id'])?'':$_GET['audit_apply_id']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>信审金额</label>
                  <input type="text" name="audit_amount" id="audit_amount" maxlength="10" style="width: 140px" value="<?=empty($_GET['audit_amount'])?'':$_GET['audit_amount']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>信审期限</label>
                  <input type="text" name="audit_month" id="audit_month" maxlength="15" style="width: 140px" value="<?=empty($_GET['audit_month'])?'':$_GET['audit_month']?>">
                </span>

                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>信审结果</label>
                    <select name="audit_result" id="audit_result" style="width: 100px">
                      <option value="-1" <?php if(!empty($_GET['audit_result']) || isset($_GET['audit_result'])){echo $_GET['audit_result']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="1" <?php if(!empty($_GET['audit_result']) || isset($_GET['audit_result'])){echo $_GET['audit_result']=="1"?'selected = "selected"':'';}?>>未审核</option>
                      <option value="2" <?php if(!empty($_GET['audit_result']) || isset($_GET['audit_result'])){echo $_GET['audit_result']=="2"?'selected = "selected"':'';}?>>审核中</option>
                      <option value="3" <?php if(!empty($_GET['audit_result']) || isset($_GET['audit_result'])){echo $_GET['audit_result']=="3"?'selected = "selected"':'';}?>>已通过</option>
                      <option value="4" <?php if(!empty($_GET['audit_result']) || isset($_GET['audit_result'])){echo $_GET['audit_result']=="4"?'selected = "selected"':'';}?>>审核失败</option>
                    </select>
                </span>
                <span style="float: left; margin-top: 10px;">
                  <label>信审通过时间</label>
                  <input type="text" name="passed_time" id="passed_time" maxlength="255" style="width: 140px" value="<?=empty($_GET['passed_time'])?'':$_GET['passed_time']?>">
                </span>
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>申请状态</label>
                    <select name="is_effect" id="is_effect" style="width: 100px">
                      <option value="-1" <?php if(!empty($_GET['is_effect']) || isset($_GET['is_effect'])){echo $_GET['is_effect']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="1" <?php if(!empty($_GET['is_effect']) || isset($_GET['is_effect'])){echo $_GET['is_effect']=="1"?'selected = "selected"':'';}?>>有效</option>
                      <option value="2" <?php if(!empty($_GET['is_effect']) || isset($_GET['is_effect'])){echo $_GET['is_effect']=="2"?'selected = "selected"':'';}?>>无效</option>
                    </select>
                </span>
                <span style="float:left;margin-top: 10px;">
                  <label>申请日期</label>
                    <input type="text" name="apply_time" id="apply_time" maxlength="255" style="width:100px" value="<?=empty($_GET['apply_time'])?'':$_GET['apply_time']?>">
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
                  <th>注册时间</th>
                  <th>手机号码</th>
                  <th>是否完成申请</th>
                  <th>是否审核成功</th>
                  <th>是否放款</th>
                  <th>放款金额</th>
                  <th>放款时间</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)){foreach ($data as $k=>$v)  {


                  ?>


                	<tr>
                		<td><?php echo $v['id'];?></td>
                		<td><?php echo $v['register_time'];?></td>
                		<td><?php echo $v['mobile'];?></td>
                		<td><?php echo $v['audit_result']==1?'已完成申请':'未完成申请'?></td>
                		<td><?php echo $v['into_account_result']==3?'审核成功':'审核失败';?></td>
                		<td><?php echo $v['into_account_result']==1||3||4?'已放款':'未放款';?></td>
                		<td><?php echo $v['actual_amount'];?></td>
                		<td><?php echo $v['into_account_date'];?></td>
              
                	</tr>
                <?php }}?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <span>
                共计：<?php echo $num;?>记录,<?php echo $total_pages; ?>页
              </span>
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