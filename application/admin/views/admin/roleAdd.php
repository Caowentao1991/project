<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">
        <?php if(empty($_GET['id'])){?>
            新增用户组
        <?php }else{?>
            编辑用户组
        <?php }?>

    </h4>
</div>
<form class="form-horizontal J_ajaxForm" role="form" method="POST" action="/index.php/admin/addRole" data-validate="validate">
    <input type="hidden" name="type" value="<?=!empty($_GET['type'])?$_GET['type']:''?>">
    <input type="hidden" name="id" value="<?=!empty($_GET['id'])?$_GET['id']:''?>">
    <input type="hidden" name="pid" value="<?=!empty($_GET['pid'])?$_GET['pid']:'0'?>">
    <input type="hidden" name="fid" value="<?=!empty($_GET['fid'])?$_GET['fid']:'0'?>">
    <input type="hidden" name="isAdmin" value="<?=!empty($_GET['isAdmin'])?$_GET['isAdmin']:'0'?>">
    <div class="modal-body">
        <div class="form-group">
            <label class="col-sm-3 control-label">用户组</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="角色" id="name" name="name" value="<?=!empty($name)?$name:''?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">天赋人权</label>
            <div class="col-sm-9">
            <select id="product" name="nodes[]" multiple="multiple" class="form-control">
                <? foreach ($config as $k=>$v){?>
                <option value="<?=$v['id'];?>"><?=$v['title'];?></option>
                <? }?>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">备注</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="备注" id="remark" name="remark" value="<?=!empty($remark)?$remark:''?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">状态</label>
            <div class="col-sm-9">
                <div class="radio">
                    <label>
                        <input type="radio" id="status" name="status" value="1" <?=(!empty($status) && $status==1)?'checked':''?>>是
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" id="status" name="status" value="0" <?=(isset($status) && $status==0)?'checked':''?>>否
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

<link rel="stylesheet" href="<?=base_url().'static/Admin/public/'.'js/vendor/summernote/summernote.css'?>">
<script src="<?=base_url().'static/Admin/public/'.'js/vendor/summernote/summernote.js'?>"></script>
<script src="<?=base_url().'static/Admin/public/'.'js/vendor/summernote/lang/summernote-zh-CN.js'?>"></script>
<script>
    function validate($from) {
        var name = $from.find('input[name="name"]');
        if ($.trim(name.val()) == '') {
            return '请输入用户组';
        }
        var status = $from.find('input[name="status"]:checked');
        if ($.trim(status.val()) == '') {
            return '请选择状态';
        }
        return true;
    }
</script>
<script type="text/javascript">
    $("#product").select2({
        placeholder: "请选择产品",
        tags: true,
        maximumSelectionLength: 5 ,
        width: "100%"//最多能够选择的个数
    });

</script>
