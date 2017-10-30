<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>组织机构</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group" style="margin-bottom:20px;">
<!--                                    <a class="btn btn-default J_ajax_content_modal" data-href="--><?//=site_url('admin/addRoleFirst?type=add&pid=0&isAdmin=0');?><!--"><i class="fa fa-file-o"></i>添加一级部门</a>-->
                                    </div>
                                    <form method="get" action="../server/ajaxReturn.json">
                                        <div class="table-responsive">
                                            <table class="table table-hover J_tree_table" cellspacing="0" width="100%" id="tree_table1">
                                                <thead>
                                                <tr>
                                                    <th width="40"></th>
                                                    <th>部门&&职位名称</th>
                                                    <th>备注</th>
                                                    <th>操作</th>
                                                </tr>
                                                </thead>
                                                <?=unlimitedBladeWorks($list,$group,$myRole);?>
                                            </table>
                                        </div>
                                        <div class="lineW" style="margin-bottom:8px;">
<!--                                            <button type="button" class="btn btn-xs J_tree_table_all_open" data-target="#tree_table1"><i class="fa fa-caret-down"></i>全部展开</button>-->
<!--                                            <button type="button" class="btn btn-xs J_tree_table_all_close" data-target="#tree_table1"><i class="fa fa-caret-up"></i>全部收起</button>-->
                                        </div>
                                        <hr/>
<!--                                        <div class="form-group">-->
<!--                                            <button type="button" class="btn btn-primary J_ajaxSubmitBtn">提交</button>-->
<!--                                        </div>-->
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