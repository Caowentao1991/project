
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
        渠道引流
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
                  <label>合作商</label>
                  <input type="text" name="audit_month" id="audit_month" maxlength="15" style="width: 140px" value="">
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
                  <th style='text-align:center'>序号</th>
                  <th style='text-align:center'>合作商名称</th>
                  <th style='text-align:center'>上传LOGO图片</th>
                  <th style='text-align:center'>最小额度</th>
                  <th style='text-align:center'>最大额度</th>
                  <th style='text-align:center'>利率</th>
                  <th style='text-align:center'>利率类型(月/日)</th>
                  <th style='text-align:center'>申请用户数</th>
             
                  <th style='text-align:center'>推荐链接</th>
                </tr>
                </thead>
                <tbody>
             
                  <form action="<?php echo site_url('/drainage/drainage_add')?>" method="post" enctype="multipart/form-data">

                  <tr>
                    <td style='text-align:center'><input type="text" name="weight"></input> </td>
                    <td style='text-align:center'><input type="text" name="name"></input></td>
                    <td style='text-align:center'><input type="file" name="logo"></input></td>
                    <td style='text-align:center'><input type="text" name="min_amount"></input></td>
                    <td style='text-align:center'><input type="text" name="max_amount"></input></td>

                    <td style='text-align:center'><input type="text" name="rate"></input></td>

                    <td style='text-align:center'>
                        <select name="rate_type">
                          <option ></option>
                        <option value ="1">月</option>
                        <option value ="2">日</option>
                        </select>
                        </td>
                    <td style='text-align:center'><input type="text" name="users"></input></td>
                  
                        <td style='text-align:center'><input type="text" name="service_url"></input></td>
                            
                  </tr>
                  <td><input type="submit"></td>
                </form>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <span>
             
              </span>
              <ul class="pagination pagination-sm no-margin pull-right">
  
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