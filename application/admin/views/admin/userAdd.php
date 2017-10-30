<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">
        <?php if(empty($_GET['id'])){?>
            新增用户
        <?php }else{?>
            编辑用户
        <?php }?>

    </h4>
</div>
<form class="form-horizontal J_ajaxForm" role="form" method="POST" action="<?=site_url('admin/addUser');?>" data-validate="validate">
    <input type="hidden" name="type" value="<?=!empty($_GET['type'])?$_GET['type']:''?>">
    <input type="hidden" name="id" value="<?=!empty($_GET['id'])?$_GET['id']:''?>">
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-3 control-label">用户</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="角色" id="username" name="username" value="<?=!empty($user['username'])?$user['username']:''?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">密码</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="密码" id="password" name="password" value="">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">用户组</label>
            <div class="col-sm-9">
                <select class="form-control" name="roleId">
                    <option value="">请选择</option>
                    <?php foreach($role as $k=>$v){?>
                        <option value="<?=$v['id']?>" <?=($user['roleId']==$v['id']&&!empty($_GET['id']))?'selected="selected"':''?>><?=$v['name']?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">状态</label>
            <div class="col-sm-9">
                <div class="radio">
                    <label>
                        <input type="radio" id="status" name="status" value="1" <?=(!empty($user['status']) && $user['status']==1)?'checked':''?>>开启
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" id="status" name="status" value="0" <?=(isset($user['status']) && $user['status']==0)?'checked':''?>>禁用
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary J_ajaxSubmitBtn">提交</button>
    </div>
</form>

<link rel="stylesheet" href="<?=VENDER_PATH.'js/vendor/summernote/summernote.css'?>">
<script src="<?=VENDER_PATH.'js/vendor/summernote/summernote.js'?>"></script>
<script src="<?=VENDER_PATH.'js/vendor/summernote/lang/summernote-zh-CN.js'?>"></script>
<script>
    function validate($from) {
        var username = $from.find('input[name="username"]');
        if ($.trim(username.val()) == '') {
            return '请输入用户';
        }
//        var password = $from.find('input[name="password"]');
//        if ($.trim(password.val()) == '') {
//            return '请输入密码';
//        }
        var status = $from.find('input[name="status"]');
        if ($.trim(status.val()) == '') {
            return '请选择状态';
        }
        var role_id = $from.find('select[name="role_id"]');
        if (role_id.val() == 0) {
            return '请选择用户组';
        }
        return true;
    }
</script>