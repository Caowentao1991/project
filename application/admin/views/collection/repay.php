<link rel="stylesheet" href="<?=VENDER_PATH.'js/vendor/bootstrap-datepicker/css/bootstrap-datepicker.css'?>">
<script src="<?=VENDER_PATH;?>js/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<div class="content_wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>

                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form class="form-inline" role="form" method="get" action="<?=site_url('collection/repay');?>" data-validate="validate" data-callBack="callback">
                                        <label>日期</label>
                                        <input type="text" class="form-control" id="datepicker" name="getDate" value="<?=!empty($_GET['date']) ? $_GET['date'] : date('Y-m-d');?>" >
                                        <span class="gap"></span>
                                        <button type="button" class="btn btn-primary J_ajaxSubmitBtn">查询</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>催收绩效考核-回单</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <tr>
                                            <th>姓名</th>
                                            <? for($i=1;$i<32;$i++){?>
                                            <th><?='D'.$i;?></th>
                                            <? }?>
                                        </tr>
                                        <? foreach($result as $k=>$v){?>
                                            <tr>
                                                <td><?=$v['姓名'];?></td>
                                                <? for ($i=1;$i<32;$i++){?>
                                                <td><?=$v["D$i"];?></td>
                                                <? }?>
                                            </tr>
                                        <? }?>
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
    function callback(returnData, $from) {
        console.log($from);
    }
    function validate($from) {
        return true;
    }
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

</script>