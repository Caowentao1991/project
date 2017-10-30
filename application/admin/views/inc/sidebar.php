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
  
 <ul class="sidebar-menu" id="all">
        <li class="header">菜单</li>

        <li class="<?php if($act_tree == 'user')?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-user"></i> <span>用户管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/index.php/user/index"><i class="fa fa-circle-o"></i>用户基础信息列表</a></li>
            <li><a href="/admin/index.php/user/user_info"><i class="fa fa-circle-o"></i>用户其他信息列表</a></li>
            <li><a href="/admin/index.php/user/user_log"><i class="fa fa-circle-o"></i>用户日志</a></li>
          </ul>
        </li>

        <li class="<?php if($act_tree == 'Loanm'){ echo 'active';}?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-cny"></i> <span>贷款管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/index.php/Loanm/index"><i class="fa fa-circle-o"></i>贷款申请记录</a></li>
            <li><a href="/admin/index.php/Loanm/rate"><i class="fa fa-circle-o"></i>贷款利率</a></li>
            <li><a href="/admin/index.php/Loanm/transfer"><i class="fa fa-circle-o"></i>放款记录</a></li>
          </ul>
        </li>

        <li class="<?php if($act_tree == 'message'){ echo 'active';}?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-table"></i> <span>信息管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/index.php/message/feedback"><i class="fa fa-circle-o"></i> 反馈信息</a></li>
            <li><a href="/admin/index.php/message/msgbox"><i class="fa fa-circle-o"></i> 个人信息</a></li>
            <li><a href="/admin/index.php/message/audit"><i class="fa fa-circle-o"></i> 运营商认证信息</a></li>
            <li><a href="/admin/index.php/message/card"><i class="fa fa-circle-o"></i> 银行卡信息</a></li>
          </ul>
        </li>

    

        <li class="<?php if($act_tree == 'Authority'){ echo 'active';}?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-table"></i> <span>管理员权限管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/index.php/Authority/index"><i class="fa fa-circle-o"></i> 管理员信息列表</a></li>
            <li><a href="/admin/index.php/Authority/role_list"><i class="fa fa-circle-o"></i> 权限列表</a></li>
          </ul>
        </li>

    <li class="<?php if($act_tree == 'message'){ echo 'active';}?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-table"></i> <span>渠道对账</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
           <!-- <li><a href="/admin/index.php/Channel/account"><i class="fa fa-circle-o"></i> 对账信息</a></li> -->
            <li><a  href="/admin/index.php/Channel/summarize"><i class="fa fa-circle-o"></i> 汇总信息</a></li>
            <li><a  href="/admin/index.php/Channel/role_list"><i class="fa fa-circle-o"></i> 权限列表</a></li>
          </ul>
        </li>
        
         <li class="<?php if($act_tree == 'message'){ echo 'active';}?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-table"></i> <span>渠道信息比例调整</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
           <!-- <li><a href="/admin/index.php/Channel/account"><i class="fa fa-circle-o"></i> 对账信息</a></li> -->
            <li><a  href="/admin/index.php/Channel/set_num"><i class="fa fa-circle-o"></i> 渠道信息比例</a></li>
          </ul>
        </li>

        <li class="<?php if($act_tree == 'Authority'){ echo 'active';}?> treeview">
          <a href="javascript:void(0);">
            <i class="fa fa-table"></i> <span>渠道管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/index.php/Drainage/drainage_form"><i class="fa fa-circle-o"></i> 渠道引流</a></li>
            <li><a href="/admin/index.php/Drainage/drainage_edit"><i class="fa fa-circle-o"></i> 引流管理</a></li>
          </ul> 
        </li>
      </ul> 






    </section>
    <!-- /.sidebar -->
  </aside>