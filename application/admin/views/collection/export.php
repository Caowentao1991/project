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
                                    <a  class="btn btn-default" href="/index.php/Collection/riskCaseUpload?scene_id=100001" target="_blank"><i class="fa fa-file-o"></i>风险案件上报表（手机分期）Excel</a>
                                    <a  class="btn btn-default" href="/index.php/Collection/riskCaseUpload?scene_id=100010" target="_blank"><i class="fa fa-file-o"></i>风险案件上报表（现金贷）Excel</a>
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