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
  $(function () {
    $('#into_account_date').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      startView:1
    });
  });
  
  function search(){
    var trans_no            = $('#trans_no').val();
    var user_name           = $('#user_name').val();
    var audit_amount        = $('#audit_amount').val();
    var actual_amount       = $('#actual_amount').val();
    var into_account_date   = $('#into_account_date').val();
    var into_account_result = $('#into_account_result').val();


    window.location.href = "/admin/index.php/loanm/transfer?trans_no="+trans_no+"&user_name="+user_name+"&audit_amount="+audit_amount+"&actual_amount="+actual_amount+"&into_account_date="+into_account_date+"&into_account_result="+into_account_result;
  }
</script>	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       	放款记录
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
                  <label>编号</label>
                  <input type="text" name="trans_no" id="trans_no" maxlength="15" style="width: 100px" value="<?=empty($_GET['trans_no'])?'':$_GET['trans_no']?>">
                </span>

                <span style="float: left;margin-top: 10px;">
                  <label>用户名</label>
                  <input type="text" name="user_name" id="user_name" maxlength="15" style="width: 100px" value="<?=empty($_GET['user_name'])?'':$_GET['user_name']?>">
                </span>
                
                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>信审额度</label>
                  <input type="text" name="audit_amount" id="audit_amount" maxlength="25" style="width: 140px" value="<?=empty($_GET['audit_amount'])?'':$_GET['audit_amount']?>">
                </span>

                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>实际款放金额</label>
                  <input type="text" name="actual_amount" id="actual_amount" maxlength="25" style="width: 140px" value="<?=empty($_GET['actual_amount'])?'':$_GET['actual_amount']?>">
                </span>

                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>到账时间</label>
                  <input type="text" name="into_account_date" id="into_account_date" maxlength="255" style="width: 140px" value="<?=empty($_GET['into_account_date'])?'':$_GET['into_account_date']?>">
                </span>

                <span style="float: left; margin-left: 8px;margin-top: 10px;">
                  <label>到账结果</label>
                    <select name="into_account_result" id="into_account_result" style="width: 100px">
                      <option value="-1" <?php if(!empty($_GET['into_account_result']) || isset($_GET['into_account_result'])){echo $_GET['into_account_result']=="-1"?'selected = "selected"':'';}?>></option>
                      <option value="0" <?php if(!empty($_GET['into_account_result']) || isset($_GET['into_account_result'])){echo $_GET['into_account_result']=="0"?'selected = "selected"':'';}?>>未处理</option>
                      <option value="1" <?php if(!empty($_GET['into_account_result']) || isset($_GET['into_account_result'])){echo $_GET['into_account_result']=="1"?'selected = "selected"':'';}?>>未到账</option>
                      <option value="2" <?php if(!empty($_GET['into_account_result']) || isset($_GET['into_account_result'])){echo $_GET['into_account_result']=="2"?'selected = "selected"':'';}?>>放款成功，已到账</option>
                      <option value="3" <?php if(!empty($_GET['into_account_result']) || isset($_GET['into_account_result'])){echo $_GET['into_account_result']=="3"?'selected = "selected"':'';}?>>放款失败</option>
                      <option value="4" <?php if(!empty($_GET['into_account_result']) || isset($_GET['into_account_result'])){echo $_GET['into_account_result']=="4"?'selected = "selected"':'';}?>>已还完</option>
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
                  <th>编号</th>
                  <th>用户名</th>
                  <th>申请信审id</th>
                  <th>实际款放金额</th>
                  <th>实际款放期限</th>
                  <th>信审额度</th>
                  <th>审信最大期限</th>
                  <th>贷款申请ID</th>
                  <th>到账时间</th>
                  <th>到账结果</th>
                  <th>创建时间</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($data)){foreach ($data as $k=>$v){?>
                	<tr>
                		<td><?php echo $v['id'];?></td>
                		<td><?php echo $v['trans_no'];?></td>
                		<td><?php echo $v['user_name'];?></td>
                		<td><?php echo $v['apply_id'];?></td>
                		<td><?php echo $v['actual_amount'];?></td>
                		<td><?php echo $v['actual_month'];?></td>
                		<td><?php echo $v['audit_amount'];?></td>
                		<td><?php echo $v['audit_month'];?></td>
                		<td><?php echo $v['application_id'];?></td>
                		<td><?php echo $v['into_account_date'];?></td>
                		<td><?php echo $v['into_account'];?></td>
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