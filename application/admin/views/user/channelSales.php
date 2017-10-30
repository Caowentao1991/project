<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>部门架构</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group" style="margin-bottom:20px;">
                                        <a class="btn btn-default J_ajax_content_modal" data-href="/index.php/admin/addChannelSales?field=role_id&type=add"><i class="fa fa-file-o"></i>添加部门</a>
                                    </div>

                                    <form method="get" action="../server/ajaxReturn.json">
                                        <div class="lineW" style="margin-bottom:8px;">
                                            <button type="button" class="btn btn-xs J_tree_table_all_open" data-target="#tree_table1"><i class="fa fa-caret-down"></i>全部展开</button>
                                            <button type="button" class="btn btn-xs J_tree_table_all_close" data-target="#tree_table1"><i class="fa fa-caret-up"></i>全部收起</button>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-hover J_tree_table" cellspacing="0" width="100%" id="tree_table1">
                                                <thead>
                                                <tr>
                                                    <th width="40"></th>
                                                    <th>用户组</th>
<!--                                                    <th>启用</th>-->
                                                    <th>操作</th>
                                                </tr>
                                                </thead>
                                                <?php foreach($userList as $k=>$v){?>
                                                <tbody>
                                                    <tr>
                                                    <td><span class="J_pull_btn pull_down"></span></td>
                                                    <td><?=$k?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-xs J_ajax_content_modal" data-href="/user/addChannelSales?field=sales&type=add&role_id=<?=$k?>">添加</a>
                                                        <a class="btn btn-default btn-xs J_ajax_content_modal" data-href="/user/addChannelSales?field=role_id&type=edit&role_id=<?=$k?>">编辑</a>
                                                    </td>
                                                    </tr>
                                                    <?php foreach($v as $l=>$j){?>
                                                    <tr>
                                                        <td></td>
                                                        <td><span class="end"></span><?=$j?></td><td>
                                                        <button type="button" class="btn btn-warning btn-xs J_confirm_modal" data-tip="一定要删除？" data-target="/user/delChannelSales?type=sales&name=<?=$j?>">删除</button>
                                                            <a class="btn btn-default btn-xs J_ajax_content_modal" data-href="/user/addChannelSales?field=sales&type=edit&sales=<?=$j?>">编辑</a>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                                <?php }?>
                                            </table>
                                        </div>
<!--                                        <div class="lineW" style="margin-bottom:8px;">-->
<!--                                            <button type="button" class="btn btn-xs J_tree_table_all_open" data-target="#tree_table1"><i class="fa fa-caret-down"></i>全部展开</button>-->
<!--                                            <button type="button" class="btn btn-xs J_tree_table_all_close" data-target="#tree_table1"><i class="fa fa-caret-up"></i>全部收起</button>-->
<!--                                        </div>-->
                                        <hr/>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary J_ajaxSubmitBtn">提交</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>

</div>