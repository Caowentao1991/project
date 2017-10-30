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
                                    <form class="form-inline" role="form" method="get" action="<?=site_url('collection/distributionAndReturn');?>" data-validate="validate" data-callBack="callback">
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
                    <header><i class="fa fa-fw fa-file"></i>催收绩效考核-分单及催回</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <tr>
                                            <th>id</th>
                                            <th>地区</th>
                                            <th>是否委外</th>
                                            <th>姓名</th>
                                            <th>角色</th>
                                            <th>分单数</th>
                                            <th>分单金额</th>
                                            <th>催回金额</th>
                                            <th>催回率</th>
                                            <th>罚金总额</th>
                                            <th>实收罚金</th>
                                            <th>实收占比</th>
                                        </tr>
                                        <? foreach($result as $k=>$v){?>
                                            <tr>
                                                <td><?=$k+1;?></td>
                                                <td><?=$v['地区'];?></td>
                                                <td><?=$v['是否委外'];?></td>
                                                <td><?=$v['姓名'];?></td>
                                                <td><?=$v['角色'];?></td>
                                                <td><?=$v['分单数'];?></td>
                                                <td><?=$v['分单金额'];?></td>
                                                <td><?=$v['催回金额'];?></td>
                                                <td><?=$v['催回率'];?></td>
                                                <td><?=$v['罚金总额'];?></td>
                                                <td><?=$v['实收罚金'];?></td>
                                                <td><?=$v['实收占比'];?></td>
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