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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        权限列表
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>


            <span style="float: left;margin-top: 10px;">
                  <label><h5>子渠道查询</h5></label>
                  <input type="text" name="qd_name" id="qd_name">
                </span>
                 <span style="float: left;margin-left: 8px;margin-top: 10px;">
                  <button type="submit" onclick="search()">搜索</button>
                </span>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>渠道代码</th>
                  <th style="width: 110px;">名称</th>
                </tr>
                </thead>
                <form method="post"  enctype"multipart/form-data" name="child_loc" action="<?php echo site_url('Channel/child_loc');?>">
                <tbody>
                 
                  


                <?php if(!empty($data)){foreach ($data as $k=>$v){?>
                  <tr>
                     <td><label><?=$v['id'];?></label> </td>
                      <td><label><?=$v['code'];?></label> </td>
                         <td><label><?=$v['name'];?></label> </td>

                    <td><label for="check"><input name="<?=$v['code'];?>"  id="check"  type="checkbox" value="<?=$v['child_id'];?>" <?php if($get_id==$v['child_id'])echo "checked=\"checked\"";?>  /> </label> </td>
                 
                      <div class="btn-group">
           
            
                <ul class="dropdown-menu" role="menu">
                
                  <li>
                  <a href="<?php echo site_url('Channel/location_form');?>">设置子渠道</a>                
                  </li>
                </ul>
                </div>
                    </td>
                  </tr>
                <?php }}?>

                </tbody>
                
              </table>
              <input type='hidden' name="hid_id" value="<?=$get_id;?>" id="hid_id">
              <input type="submit">
            </div>
                 </form>
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
<script>  
  

  function search(){

    var qd_name = $('#qd_name').val();
    var get_id = $('#hid_id').val();

    window.location.href = "/admin/index.php/Channel/location_form?qd_name="+qd_name+"&id="+get_id;
  }

  </script>  
<style>  
.ui-button-text-only .ui-button-text {  
    padding: 8px;  
}  
.ui-state-default,  
.ui-widget-content .ui-state-default,  
.ui-widget-header .ui-state-default {  
background: url(images/safari-checkbox.png) 0 0 no-repeat; border:none;  
}  
.ui-state-hover,  
.ui-widget-content .ui-state-hover,  
.ui-widget-header .ui-state-hover,  
.ui-state-focus,  
.ui-widget-content .ui-state-focus,  
.ui-widget-header .ui-state-focus {  
background: url(images/safari-checkbox.png) -16px 0 no-repeat; border:none;  
}  
.ui-state-active,  
.ui-widget-content .ui-state-active,  
.ui-widget-header .ui-state-active {  
background: url(images/safari-checkbox.png) 0 -16px no-repeat; border:none;  
}  
</style>  
</body>
</html>