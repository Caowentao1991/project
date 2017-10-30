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
                                    <form class="form-inline" role="form" method="get" action="<?=site_url('DataReport/dailyReport');?>" data-validate="validate" data-callBack="callback">
                                        <label>日期</label>
                                        <input type="text" class="form-control" id="datepicker" name="registerTime" value="<?=isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');?>">
                                        <span class="gap"></span>
                                        <div class="form-group">
                                            <label>渠道</label>
                                            <select name="place" class="form-control">
                                                <option value="">无</option>
                                                <option value="weimeng" <?=(isset($_GET['place'])&& $_GET['place']== 'weimeng') ? 'selected="selected"' : '';?>>weimeng</option>
                                                <option value="xianshangdaikuan" <?=(isset($_GET['place'])&& $_GET['place']== 'xianshangdaikuan') ? 'selected="selected"' : '';?>>xianshangdaikuan</option>
                                                <option value="xygj2" <?=(isset($_GET['place'])&& $_GET['place']== 'xygj2') ? 'selected="selected"' : '';?>>xygj2</option>
                                                <option value="jieqianyong" <?=(isset($_GET['place'])&& $_GET['place']== 'jieqianyong') ? 'selected="selected"' : '';?>>jieqianyong</option>
                                                <option value="laijieqian" <?=(isset($_GET['place'])&& $_GET['place']== 'laijieqian') ? 'selected="selected"' : '';?>>laijieqian</option>
                                                <option value="xinyxz" <?=(isset($_GET['place'])&& $_GET['place']== 'xinyxz') ? 'selected="selected"' : '';?>>xinyxz</option>
                                                <option value="jieqianguanjia" <?=(isset($_GET['place'])&& $_GET['place']== 'jieqianguanjia') ? 'selected="selected"' : '';?>>jieqianguanjia</option>
                                                <option value="nalijie" <?=(isset($_GET['place'])&& $_GET['place']== 'nalijie') ? 'selected="selected"' : '';?>>nalijie</option>
                                                <option value="51gjj" <?=(isset($_GET['place'])&& $_GET['place']== '51gjj') ? 'selected="selected"' : '';?>>51gjj</option>
                                                <option value="tqb" <?=(isset($_GET['place'])&& $_GET['place']== 'tqb') ? 'selected="selected"' : '';?>>tqb</option>
                                            </select>
                                        </div>
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
                    <header><i class="fa fa-fw fa-file"></i>1. 注册情况</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="register" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <tr>
                                            <th style="max-width: 200px">新注册量</th>
                                            <? if(!empty($place)){?>
                                            <? if(!empty($place)){foreach ($place as $k=>$v){?>
                                            <th><?=$v['place'];?></th>
                                            <? }}?>


                                            <? }?>
                                        </tr>
                                        <tr>
                                            <td  style="max-width: 200px"><?=$register['register'];?></td>
                                            <? if(!empty($place)){foreach ($place as $k=>$v){?>
                                            <td><?=$v['amount'];?></td>
                                            <? }}?>
                                        </tr>
                                        <? if(!empty($outplace)){?>
                                        <tr>
                                            <th>渠道TOP10</th>
                                        </tr>
                                        <tr>
                                            <? foreach ($outplace as $k=>$v){?>
                                                <th><?=$v['place'];?></th>
                                            <? }?>
                                        </tr>
                                        <tr>
                                            <? foreach ($outplace as $k=>$v){?>
                                                <td><?=$v['amount'];?></td>
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
        <? if(!empty($finish)){?>
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>2. 完成申请情况</header>
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
        <? }?>
        <? if(!empty($transfer)){?>
            <div class="row">
                <div class="col-sm-12">
                    <aside>
                        <header><i class="fa fa-fw fa-file"></i>3. 本月截止目前放款情况</header>
                        <section>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                            <tr>
                                                <th></th>
                                                <th>放款数</th>
                                                <th>放贷金额</th>
                                                <th>平均额度</th>
                                            </tr>
                                            <tr>
                                                <td>整体</td>
                                                <td><?=$transfer['tAmount'];?></td>
                                                <td><?=$transfer['tMoney'];?></td>
                                                <td><?=$transfer['tAve'];?></td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        <? }?>
        <? if(!empty($overDue)){?>
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>4. 逾期情况</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <tr>
                                            <th>D0</th>
                                            <th>到期应还</th>
                                            <th>到期正常还</th>
                                            <th>逾期已还</th>
                                            <th>逾期中</th>
                                            <th>逾期率</th>
                                            <th>备注：逾期率 = 逾期中/到期应还(T-1)</th>

                                        </tr>
                                        <tr>
                                            <td><?=$overDue['d1'];?></td>
                                            <td><?=$overDue['havetopay'];?></td>
                                            <td><?=$overDue['normalpay'];?></td>
                                            <td><?=$overDue['overduepay'];?></td>
                                            <td><?=$overDue['overdue'];?></td>
                                            <td><?=$overDue['overduerate'];?></td>

                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
        <? }?>

        <? if(!empty($finally)){?>
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>5. 新老用户占比图</header>
                    <section>
                        <div class="container-fluid" id="container0">
                        </div>
                        </div>
                    </section>
                </aside>
            </div>
        <?}?>
        <? if(!empty($moneyRate)){?>
            <div class="row">
                <div class="col-sm-12">
                    <aside>
                        <header><i class="fa fa-fw fa-file"></i>6. 放款额度占比图</header>
                        <section>
                            <div class="container-fluid" id="container">

                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        <? }?>
        </div>
        </div>


<script>
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
    function callback(returnData, $from) {
        console.log($from);
    }
    function validate($from) {
        return true;
    }
</script>
<? if(!empty($moneyRate)){?>
<script language="JavaScript">
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'waterfall'
            },
            animation:false,
            title: {
                text: '放贷额度占比'
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: '笔数'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '<b>{point.y}笔</b> '
            },
            series: [{
                color: 'red',
                data: [
                    <? foreach ($moneyRate as $k=>$v){?>
                    {
                    name: <?=$v['ed'];?>,
                    y: <?=$v['bs'];?>
                    },
                    <? }?>
                     {
                    name: '累计值',
                    isSum: true,

                }],
                dataLabels: {
                    enabled: true,
                    verticalAlign : "top",
                    y:-20,
                    style : {"color": "black", "fontSize": "11px", }
                },

            }]
        });
    });


</script>
<? }?>
<? if(!empty($finally)){?>
<script language="JavaScript">
    $(document).ready(function() {
        var chart = {
            type: 'area'
        };
        var title = {
            text: '新老用户占比'
        };

        var xAxis = {
            categories: [
                <? foreach ($finally['day'] as $k=>$v){ echo "'".$v."'," ;}?>
            ],
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        };
        var yAxis = {
            title: {
                text: '笔数'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        };
        var tooltip = {
            shared: true,
            valueSuffix: ' 笔'
        };
        var plotOptions = {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                },
                dataLabels: {
                    enabled: true,
                    style : {"font-family": "Microsoft YaHei","color":"#484848","font-weight":"normal","textOutline": "none"}
                }
            }
        };
        var credits = {
            enabled: false
        };
        var series= [
            {
                name: '新用户首借',
                data: [<? foreach ($finally['one'] as $v){echo $v.',';}?>]
            },
            {
                name: '老用户首借',
                data: [<? foreach ($finally['two'] as $v){echo $v.',';}?>]
            },
            {
                name: '老用户复借,上次拒绝',
                data: [<? foreach ($finally['three'] as $v){echo $v.',';}?>]
            },
            {
                name: '老用户复借，上次通过',
                data: [<? foreach ($finally['four'] as $v){echo $v.',';}?>]
            }
        ];

        var json = {};
        json.chart = chart;
        json.title = title;
        json.xAxis = xAxis;
        json.yAxis = yAxis;
        json.tooltip = tooltip;
        json.plotOptions = plotOptions;
        json.credits = credits;
        json.series = series;
        $('#container0').highcharts(json);

    });
</script>
<? }?>
