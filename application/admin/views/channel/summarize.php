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
    <link rel="stylesheet" href="<?=base_url().'assets/bootstrap/css/bootstrap-datetimepicker.min.css'?>">
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
       	汇总信息
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
                  <label>日期(起)</label>
                  <input type="text" name="sdate" id="sdate" maxlength="10" style="width: 100px" value="<?=empty($_GET['sdate'])?'':$_GET['sdate']?>">
                </span>
                <span style="float: left;margin-top: 10px;">
                  <label>到日期(止)</label>
                  <input type="text" name="edate" id="edate" maxlength="10" style="width: 100px" value="<?=empty($_GET['edate'])?'':$_GET['edate']?>">
                </span>

                <?php 

         if($this->load->session->userdata['admin_data']['role_id']==1){
          
         ?>
                  <span style="float: left;margin-top: 10px;">
                  <label>渠道</label> 
                  <input type="text" name="qd" id="qd" maxlength="10" style="width: 100px" value="<?=empty($_GET['qd'])?'':$_GET['qd']?>">
                </span>

                     <?php 

                    }else{

                  ?>

                  <span style="float: left;margin-top: 10px;">
                    <label>子渠道查询</label>
                  <select name="qd_com" id="qd_com">
                    <option value=""></option>
                  <?php

                  //去重
                  $qdc = array_flip(array_flip($qdc));

                  foreach ($qdc as $kt => $vt) {

                   ?>

                  <option value="<?php echo $vt?>"><?php echo $vt?></option>

                    <?php             
                    }    

                  ?>
                  </select>

                   </span>

                  <?php
                  }
                    ?>        
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
                  <th>时间</th>
                  <th>注册</th>
                  <th>完成基础信息</th>
                  <th>完成工作信息</th>
                  <th>完成联系人信息</th>
                  <th>银行卡认证成功</th>
                  <th>运营商认证成功</th>
                  <th>完成申请</th>
                  <th>审核通过</th>
                  <th>提现成功</th>
                  <th>提现金额</th>
                </tr>
                </thead>
                <tbody>

                  
                <?php

          
                 if(!empty($data)){foreach ($data as $k=>$v)  {

                  ?>

                	<tr>
                		<td>   <?php

                       if(!empty($v['register_date'])){
                      echo $v['register_date'];
                    }else{
                      echo '0';
                    }
               
                       ?></td>
                		<td>
                      <?php

                       if(!empty($v['register'])){
                      echo $v['register'];
                    }else{
                      echo '0';
                    }
               
                       ?>
                    </td>
                		<td>
                      <?php
                        if(!empty($v['base'])){
                      echo $v['base'];
                    }else{
                      echo '0';
                    }
         

                       ?>
                    </td>
                		<td><?php 
                    if(!empty($v['job'])){
                      echo $v['job'];
                    }else{
                      echo '0';
                    }
                    
                    ?></td>
                		<td><?php 
                       if(!empty($v['relation'])){
                      echo $v['relation'];
                    }else{
                      echo '0';
                    }

                    ?></td>

                		<td><?php
                     if(!empty($v['card'])){
                      echo $v['card'];
                    }else{
                      echo '0';
                    }
                    ?></td>

                		<td><?php 
                   if(!empty($v['mobile'])){
                      echo $v['mobile'];
                    }else{
                      echo '0';
                    }
                    ?>
                  </td>
                		<td>
                      <?php 
                       if(!empty($v['apply'])){
                      echo $v['apply'];
                    }else{
                      echo '0';
                    }
                      ?>
                    </td>
                        <td>
                          <?php 
                               if(!empty($v['apply_pass'])){
                      echo $v['apply_pass'];
                    }else{
                      echo '0';
                    }
                        
                          ?>
                        </td>
                        <td>
                          <?php 
                                      if(!empty($v['trans_success'])){
                      echo $v['trans_success'];
                    }else{
                      echo '0';
                    }
                        
                          ?>
                        </td>
                        <td>
                          <?php 
                                      if(!empty($v['trans_money'])){
                      echo $v['trans_money'];
                    }else{
                      echo '0';
                    }
                      
                          ?>
                        </td>
              
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
<script src="<?=base_url().'assets/bootstrap/js/bootstrap-datetimepicker.min.js'?>"></script>
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

<script type="text/javascript">
  $(function () {

    $('#sdate').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      startView:1
    });
    $('#edate').datetimepicker({
      format: 'yyyy-mm-dd hh:ii:ss',
      startView:1
    });

  });

  function search(){

    var sdate = $('#sdate').val();
    var edate = $('#edate').val();
    var qd_com = $('#qd_com').val();
    var qd = $('#qd').val();
    if(qd_com){
      qd=qd_com;
    }

    window.location.href = "/admin/index.php/Channel/summarize?location="+qd+"&sdate="+sdate+"&edate="+edate;
  }
</script>
</body>
</html>