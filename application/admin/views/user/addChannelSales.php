<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">
        <?php if($_GET['type']=='add'){?>
            新增
        <?php }else{?>
            编辑
        <?php }?>
    </h4>
</div>
<form class="form-horizontal J_ajaxForm" role="form" method="POST" action="/index.php/admin/addChannelSales" data-validate="validate">
    <input type="hidden" name="type" value="<?=!empty($_GET['type'])?$_GET['type']:''?>">
    <input type="hidden" name="field" value="<?=!empty($_GET['field'])?$_GET['field']:''?>">
    <input type="hidden" name="id" value="<?=!empty($_GET[$_GET['field']])?$_GET[$_GET['field']]:''?>">
    <div class="modal-body">
        <?php
            if(($_GET['type']=='edit' && $_GET['field']=='role_id') || ($_GET['type']!='edit' && $_GET['field']!='role_id') || $_GET['type']=='add'){
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">上级用户</label>
            <div class="col-sm-9">
                <input <?=(!empty($_GET['role_id']) && $_GET['type']!='edit' && $_GET['field']!='sales')?'readonly':''?> type="text" class="form-control" placeholder="上级用户" id="role_id" name="role_id" value="<?=!empty($_GET['role_id'])?$_GET['role_id']:''?>">
            </div>
        </div>
        <?php
            }
            if(($_GET['type']=='edit' && $_GET['field']=='sales') || ($_GET['type']!='edit' && $_GET['field']!='sales') || $_GET['type']=='add'){
        ?>
        <div class="form-group">
            <label class="col-sm-3 control-label">附属用户</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="附属用户" id="sales" name="sales" value="<?=!empty($_GET['sales'])?$_GET['sales']:''?>">
            </div>
        </div>
        <?php
            }
        ?>
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
        <?php
        if(($_GET['type']=='edit' && $_GET['field']=='role_id') || ($_GET['type']!='edit' && $_GET['field']!='role_id')){
        ?>
        var role_id = $from.find('input[name="role_id"]');
        if ($.trim(role_id.val()) == '') {
            return '请输入上级用户';
        }
        <?php
        }
        if(($_GET['type']=='edit' && $_GET['field']=='sales') || ($_GET['type']!='edit' && $_GET['field']!='sales')){
        ?>
        var sales = $from.find('input[name="sales"]');
        if ($.trim(sales.val()) == '') {
            return '请输入附属用户';
        }
        <?php
        }
        ?>
        return true;
    }
</script>