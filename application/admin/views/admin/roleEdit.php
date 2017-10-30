<div class="content_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>编辑用户组</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-horizontal" role="form" method="POST" action="<?=site_url('admin/editRole');?>">
                                        <input type="hidden" name="type" value="POST">
                                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                                        <div class="title_bar">编辑用户组</div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">用户组名称</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="角色" id="name" name="name" value="<?=$userInfo['name']?>">
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">天赋人权</label>
                                            <div class="col-sm-4">
                                                <select id="product" name="nodes[]" multiple="multiple" class="form-control">
                                                    <? foreach ($config as $k=>$v){?>
                                                        <option value="<?=$v['id'];?>"><?=$v['title'];?></option>
                                                    <? }?>
                                                </select>
                                            </div>
                                            <p class="col-sm-6 help-block">必填</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">用户组描述</label>
                                            <div class="col-sm-4">
                                                <textarea id="remark" name="remark" class="form-control"><?=$userInfo['remark']?></textarea>
                                            </div>
                                            <p class="col-sm-6 help-block">简单叙述一下用户组的功能，200字以内(文体不包含诗词)</p>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">用户组状态</label>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" id="status" name="status" value="1" <?=($userInfo['status']==='1')?'checked':''?>>正常
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" id="status" name="status" value="1" <?=($userInfo['status']==='0')?'checked':''?>>禁止
                                                    </label>
                                                </div>
                                            </div>
                                            <p class="col-sm-6 help-block"></p>
                                        </div>
                                        <hr>
                                        <div class="title_bar">编辑该用户组权限</div>
                                            <div class="form-group role_permission">
                                                <div class="col-sm-5">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="checkbox"><label>
                                                                    <?php foreach($access['DataReport'] as $k=>$v){?>
                                                                    <input type="checkbox" class="2"
                                                                        <?php
                                                                        if(!in_array(2,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }
                                                                        if($v['status']==1){
                                                                            echo 'checked';
                                                                            break;
                                                                        }
                                                                        ?>
                                                                        <?php }?>>数据报表
                                                                </label></div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <?php foreach($access['DataReport'] as $k=>$v){?>
                                                                <div class="checkbox"><label><input <?php
                                                                        if(!in_array(2,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }?> type="checkbox" name="access[]" class="2" <?=($v['status']==1)?'checked':''?> value="<?=$v['id']?>"><?=$v['name']?></label></div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="checkbox"><label>
                                                                    <?php foreach($access['Admin'] as $k=>$v){?>
                                                                    <input type="checkbox" class="1"
                                                                        <?php
                                                                        if(!in_array(1,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }
                                                                        if($v['status']==1){
                                                                            echo 'checked';
                                                                            break;
                                                                        }
                                                                        ?>
                                                                        <?php }?>>权限管理
                                                                </label></div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <?php foreach($access['Admin'] as $k=>$v){?>
                                                                <div class="checkbox"><label><input <?php
                                                                        if(!in_array(1,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }?> type="checkbox" name="access[]" class="1" <?=($v['status']==1)?'checked':''?> value="<?=$v['id']?>"><?=$v['name']?></label></div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="checkbox"><label>
                                                                    <?php foreach($access['Collection'] as $k=>$v){?>
                                                                    <input type="checkbox" class="3"
                                                                        <?php
                                                                        if(!in_array(3,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }
                                                                        if($v['status']==1){
                                                                            echo 'checked';
                                                                            break;
                                                                        }
                                                                        ?>
                                                                        <?php }?>>贷后数据
                                                                </label></div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <?php foreach($access['Collection'] as $k=>$v){?>
                                                                <div class="checkbox"><label><input <?php
                                                                        if(!in_array(3,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }?> type="checkbox" name="access[]" class="3" <?=($v['status']==1)?'checked':''?> value="<?=$v['id']?>"><?=$v['name']?></label></div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="checkbox"><label>
                                                                    <?php foreach($access['Product'] as $k=>$v){?>
                                                                    <input type="checkbox" class="4"
                                                                        <?php
                                                                        if(!in_array(3,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }
                                                                        if($v['status']==1){
                                                                            echo 'checked';
                                                                            break;
                                                                        }
                                                                        ?>
                                                                        <?php }?>>前台CMS
                                                                </label></div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <?php foreach($access['Product'] as $k=>$v){?>
                                                                <div class="checkbox"><label><input <?php
                                                                        if(!in_array(3,explode(',',$userInfo['nodes']))){
                                                                            echo 'disabled="disabled"';
                                                                        }?> type="checkbox" name="access[]" class="4" <?=($v['status']==1)?'checked':''?> value="<?=$v['id']?>"><?=$v['name']?></label></div>
                                                            <?php }?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <p class="col-sm-6 help-block"></p>
                                            </div>
                                            <hr>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-primary J_ajaxSubmitBtn">提交</button>
                                            </div>
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
<script>
    <?php if(!empty($userInfo['nodes'])){?>
    $("#product").val(<?=json_encode(explode(',',$userInfo['nodes']))?>).select2();
    <?php }?>
    $("#product").select2({
        placeholder: "请选择产品",
        tags: true,
        maximumSelectionLength: 5 ,
        width: "100%"//最多能够选择的个数
    });
//    $("#product").on("select2:unselect",function(){
//        var _class = $('#product').select2('val');
//        console.log(_class);
//        $('input[type=checkbox]:not(.'+_class+')').removeAttr("checked");
//        $('input[type=checkbox]:not(.'+_class+')').attr('disabled',true);
//
//    });
    $("#product").on("change",function(){
        var _class = $('#product').select2('val');

        $('input[type=checkbox]').removeAttr("checked");
        $('input[type=checkbox]').attr('disabled',true);
        for (var i in _class){
            $('input[class='+_class[i]+']').attr('disabled',false);
            $('input[class='+_class[i]+']').prop("checked",true);

        }

    });
</script>