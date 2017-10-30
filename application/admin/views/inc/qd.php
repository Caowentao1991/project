<header class="main-header">
    <!-- Logo -->
    <a href="javascript:void(0);" class="logo">
      <span class="logo-mini"><b>C</b>ash</span>
      <span class="logo-lg"><b>现金贷</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url().'assets/dist/img/user2-160x160.jpg'?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('admin_data')['adm_username'];?></span>
            </a>
            <ul class="dropdown-menu" >
              <!-- User image -->
              <li class="user-header" >
                <img src="<?=base_url().'assets/dist/img/user2-160x160.jpg'?>" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="/admin/index.php/admin/logout" class="btn btn-default btn-flat">登出</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url().'assets/dist/img/user2-160x160.jpg'?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>超级管理员</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" id="qd">
        <li class="header">菜单</li>
    <li class="<?php if($act_tree == 'message'){ echo 'active';}?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-table"></i> <span>渠道对账</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="/admin/index.php/Channel/account"><i class="fa fa-circle-o"></i> 对账信息</a></li>-->
               <li><a href="/admin/index.php/Channel/summarize"><i class="fa fa-circle-o"></i> 汇总信息</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>