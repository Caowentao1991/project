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
                                    <form class="form-inline" role="form" method="get" action="<?=site_url('DataReport/overdueSituation');?>" data-validate="validate" data-callBack="callback">

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
                                                <option value="weimeng" <?=isset($_GET['place'])&& $_GET['place']== 'weimeng' ? 'selected="selected"' : '';?>>weimeng</option>
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
                    <header><i class="fa fa-fw fa-file"></i>1. 逾期表</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="table1" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>注册来源</th>
                                            <th>渠道标识</th>
                                            <th>到期应还</th>
                                            <th>到期正常还款</th>
                                            <th>正常还款率</th>
                                            <th>逾期已还</th>
                                            <th>逾期还款率</th>
                                            <th>逾期中</th>
                                            <th>逾期率（按笔数）</th>
                                            <th>逾期率（按金额）</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <? foreach ($overdue as $k=>$v){?>
                                            <tr>
                                                <td><?=$k+1;?></td>
                                                <td><?=$v['source'];?></td>
                                                <td><?=$v['place'];?></td>
                                                <td><?=$v['havetopay'];?></td>
                                                <td><?=$v['normalpay'];?></td>
                                                <td><?=$v['normalpayrate'];?></td>
                                                <td><?=$v['overduepay'];?></td>
                                                <td><?=$v['overduepayrate'];?></td>
                                                <td><?=$v['overdue'];?></td>
                                                <td><?=$v['overdueratea'];?></td>
                                                <td><?=$v['overduerateb'];?></td>
                                            </tr>
                                        <? }?>
                                        </tbody>
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
<script type="text/javascript">
    $(document).ready(function(){
        (function($) {
// 看过jquery源码就可以发现$.fn就是$.prototype, 只是为了兼容早期版本的插件
// 才保留了jQuery.prototype这个形式
            $.fn.mergeCell = function(options) {
                return this.each(function() {
                    var cols = options.cols;
                    for ( var i = cols.length - 1; cols[i] != undefined; i--) {
// fixbug console调试
// console.debug(cols[i]);
                        mergeCell($(this), cols[i]);
                    }
                    dispose($(this));
                });
            };
// 如果对javascript的closure和scope概念比较清楚, 这是个插件内部使用的private方法
// 具体可以参考本人前一篇随笔里介绍的那本书
            function mergeCell($table, colIndex) {
                $table.data('col-content', ''); // 存放单元格内容
                $table.data('col-rowspan', 1); // 存放计算的rowspan值 默认为1
                $table.data('col-td', $()); // 存放发现的第一个与前一行比较结果不同td(jQuery封装过的), 默认一个"空"的jquery对象
                $table.data('trNum', $('tbody tr', $table).length); // 要处理表格的总行数, 用于最后一行做特殊处理时进行判断之用
// 我们对每一行数据进行"扫面"处理 关键是定位col-td, 和其对应的rowspan
                $('tbody tr', $table).each(function(index) {
// td:eq中的colIndex即列索引
                    var $td = $('td:eq(' + colIndex + ')', this);
// 取出单元格的当前内容
                    var currentContent = $td.html();
// 第一次时走此分支
                    if ($table.data('col-content') == '') {
                        $table.data('col-content', currentContent);
                        $table.data('col-td', $td);
                    } else {
// 上一行与当前行内容相同
                        if ($table.data('col-content') == currentContent) {
// 上一行与当前行内容相同则col-rowspan累加, 保存新值
                            var rowspan = $table.data('col-rowspan') + 1;
                            $table.data('col-rowspan', rowspan);
// 值得注意的是 如果用了$td.remove()就会对其他列的处理造成影响
                            $td.hide();
// 最后一行的情况比较特殊一点
// 比如最后2行 td中的内容是一样的, 那么到最后一行就应该把此时的col-td里保存的td设置rowspan
                            if (++index == $table.data('trNum'))
                                $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));
                        } else { // 上一行与当前行内容不同
// col-rowspan默认为1, 如果统计出的col-rowspan没有变化, 不处理
                            if ($table.data('col-rowspan') != 1) {
                                $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));
                            }
// 保存第一次出现不同内容的td, 和其内容, 重置col-rowspan
                            $table.data('col-td', $td);
                            $table.data('col-content', $td.html());
                            $table.data('col-rowspan', 1);
                        }
                    }
                });
            }
// 同样是个private函数 清理内存之用
            function dispose($table) {
                $table.removeData();
            }
        })(jQuery);

        $('#table1').mergeCell({
// 目前只有cols这么一个配置项, 用数组表示列的索引,从0开始
// 然后根据指定列来处理(合并)相同内容单元格
            cols: [0, 1]
        });
    })
</script>

