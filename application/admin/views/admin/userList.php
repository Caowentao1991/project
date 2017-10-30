<link rel="stylesheet" href="<?=base_url().'static/Admin/public/'.'js/vendor/DataTables/css/dataTables.bootstrap.css'?>">
<script src="<?=base_url().'static/Admin/public/'.'js/vendor/DataTables/js/jquery.dataTables.min.js'?>"></script>
<script src="<?=base_url().'static/Admin/public/'.'js/vendor/DataTables/js/dataTables.bootstrap.min.js'?>"></script>
<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>用户管理</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group" style="margin-bottom:20px;">
                                        <a class="btn btn-default J_ajax_content_modal" data-href="<?=site_url('admin/addUser?type=add');?>"><i class="fa fa-file-o"></i>添加新用户</a>
                                    </div>

                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="80">id</th>
                                            <th>用户名</th>
                                            <th>用户组</th>
                                            <th>登陆时间</th>
                                            <th>登出时间</th>
                                            <th>创建时间</th>
                                            <th>IP</th>
                                            <th>状态</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($list as $k=>$v){?>
                                            <tr>
                                                <td><?=$v['id']?></td>
                                                <td><?=$v['username']?></td>
                                                <td>
                                                    <?=empty($roleList[$v['roleId']]['name'])?'':$roleList[$v['roleId']]['name']?>
                                                </td>
                                                <td><?=$v['loginTime']?></td>
                                                <td><?=$v['logout_time']?></td>
                                                <td><?=$v['create_time']?></td>
                                                <td><?=$v['ip']?></td>
                                                <td>
                                                    <?php if($v['status']==1){?>
                                                        启用
                                                    <?php }else{?>
                                                        禁用
                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-xs J_ajax_content_modal" data-href="/index.php/admin/addUser?type=edit&id=<?=$v['id']?>">编辑</button>
                                                    <button type="button" class="btn btn-warning btn-xs J_confirm_modal" data-tip="一定要删除？" data-target="/index.php/admin/delUser?id=<?=$v['id']?>">删除</button>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $('#example').DataTable({
//             paging: false,
//             lengthChange: false,
//             searching: false,
            ordering: false,
            info: false,
            scrollX: true,
            "language": {
                url:'<?=base_url().'static/Admin/public/'.'js/vendor/DataTables/Chinese.json'?>'
            }
        });
    });
</script>