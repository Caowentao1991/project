var mineSetupController = {
    initEventView: function () {
        var that = this;
        //判断是否显示退出登录
        if (localStorage.userId) {
            $("#back").show().click(function () {
                if (confirm("是否要退出登录？")) {
                    var default_clubUrl = localStorage.default_clubUrl;
                    //获取当前时间
                    var date=new Date();
//将date设置为过去的时间
                    date.setTime(date.getTime()-10000);
//将userId这个cookie删除
                    document.cookie="userId=828; expires="+date.toGMTString();
                    localStorage.clear();
                    local.default_clubUrl = default_clubUrl;
                    window.location.href = "/mobile/index.php";
                }
            })
        };
        //关于速贷之家跳转
        $(".aboutour").click(function () {
            window.location.href = "/mobile/index.php/mine/mine_aboutour"
        });
        //商务合作
        $(".cooperation").click(function () {
            window.location.href = "/mobile/index.php/mine/cooperation"
        });
        //修改密码
        $.LogonStatusEvent($(".changemima"), function () {
            window.location.href = "/mobile/index.php/mine/mine_changemima2";
        }, function () {
            local.backHref = document.referrer;
        });
    }
};
$(function () {
    mineSetupController.initEventView()
});
