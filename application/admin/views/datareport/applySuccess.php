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
                                    <form class="form-inline" role="form" method="get" action="<?=site_url('DataReport/applySuccess');?>" data-validate="validate" data-callBack="callback">

                                            <label>开始日期</label>
                                            <input type="text" class="form-control" id="datepicker" name="dayStart" value="<?=!empty($_GET['choiceStart']) ? $_GET['choiceStart'] : date('Y-m-d',strtotime('-1 day'));?>" >
                                        <span class="gap"></span>
                                            <label>结束日期</label>
                                        <input type="text" class="form-control" id="datepicker1" name="dayEnd" value="<?=!empty($_GET['choiceEnd']) ? $_GET['choiceEnd'] : date('Y-m-d');?>" >
                                        <span class="gap"></span>
                                        <div class="form-group">
                                            <label>渠道</label>
                                            <select name="place" class="form-control">
                                                <option value="">无</option>
                                                <option value="xianjindai" <?=isset($_GET['place'])&& $_GET['place']== 'xianjindai' ? 'selected="selected"' : '';?>>xianjindai</option>
                                                <option value="xianshangdaikuan" <?=isset($_GET['place'])&& $_GET['place']== 'xianshangdaikuan' ? 'selected="selected"' : '';?>>xianshangdaikuan</option>
                                                <option value="xygj2" <?=isset($_GET['place'])&& $_GET['place']== 'xygj2' ? 'selected="selected"' : '';?>>xygj2</option>
                                                <option value="jieqianyong" <?=isset($_GET['place'])&& $_GET['place']== 'jieqianyong' ? 'selected="selected"' : '';?>>jieqianyong</option>
                                                <option value="laijieqian" <?=isset($_GET['place'])&& $_GET['place']== 'laijieqian' ? 'selected="selected"' : '';?>>laijieqian</option>
                                                <option value="xinyxz" <?=isset($_GET['place'])&& $_GET['place']== 'xinyxz' ? 'selected="selected"' : '';?>>xinyxz</option>
                                                <option value="jieqianguanjia" <?=isset($_GET['place'])&& $_GET['place']== 'jieqianguanjia' ? 'selected="selected"' : '';?>>jieqianguanjia</option>
                                                <option value="nalijie" <?=isset($_GET['place'])&& $_GET['place']== 'nalijie' ? 'selected="selected"' : '';?>>nalijie</option>
                                                <option value="51gjj" <?=isset($_GET['place'])&& $_GET['place']== '51gjj' ? 'selected="selected"' : '';?>>51gjj</option>
                                                <option value="tqb" <?=isset($_GET['place'])&& $_GET['place']== 'tqb' ? 'selected="selected"' : '';?>>tqb</option>
                                            </select>
                                        </div>
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
                    <header><i class="fa fa-fw fa-file"></i>1. 完成申请情况表</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>完成申请量</th>
                                            <th>审核通过量</th>
                                            <th>审核拒绝量</th>
                                            <th>信审通过率</th>
                                            <th>已提现</th>
                                            <th>已放款</th>
                                            <th>放款金额</th>
                                            <th>平均放款额度</th>

                                        </tr>
                                        <? foreach($finish as $k=>$v){?>
                                            <tr>

                                                <? if($k=='one'||$k=='three'||$k=='five'||$k=='extra'){?>
                                                    <td rowspan="2"><?=$v['title'];?></td>
                                                <? }elseif($k=='total'){?>
                                                    <td><?=$v['subtitle'];?></td>
                                                <?}?>
                                                <? if($k!='total'){?>
                                                    <td><?=$v['subtitle'];?></td>
                                                <? }else{?>
                                                    <td></td>
                                                <? }?>
                                                <td><?=$v['finish'];?></td>
                                                <td><?=$v['pass'];?></td>
                                                <td><?=$v['refused'];?></td>
                                                <td><?=$v['passrate'];?></td>
                                                <td><?=$v['getmoney'];?></td>
                                                <td><?=$v['transfer'];?></td>
                                                <td><?=$v['transfermoney'];?></td>
                                                <td><?=$v['avgmoney'];?></td>
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
    $('#datepicker1').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
</script>