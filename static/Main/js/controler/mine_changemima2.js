var changemima2Controller = {
    initView: function () {
        localFun.resizeFooter();
        this.showBool = true;
        this.initShowView();
        this.initEventView();

    },
    initShowView: function () {
        $(".yfs b").text(localStorage.phone);
        if ($("input").val().length == 4) {
            $(".btn").addClass("next_click")
        };

    },
    initEventView: function () {
        var that = this;
        //按钮颜色
        $("input").bind("input propertychange", function () {
            if ($("input").val().length == 4) {
                $(".btn").addClass("next_click");
            } else {
                $(".btn").removeClass("next_click");
            }
        });
        //btn点击
        $(".btn").click(function () {
            if ($("input").val().length == 4) {
                service.doAjaxRequest({
                    url: '/cust/code',
                    type: 'GET',
                    data: {
                        "mobile": localStorage.phone,
                        "code": $("input").val(),
                        "smsType": "password",
                        "sign": localStorage.codeSign
                    }
                }, function () {
                    window.location.href = "/mobile/index.php/mine/mine_changemima3";
                }, function (json) {
                    $.popupCover({
                        content: json.error_message
                    })
                });
            }
        })
        $(".input_ma span").click(function () {
            if ($(this).html() == "重新发送" || $(this).html() == '获取验证码') {
                that.doChangePasswordView();
            }
        })

    },
    //修改密码发送短信验证码
    doChangePasswordView: function () {
        var that = this;
        service.doAjaxRequest({
                url: "/sms/password",
                type: "POST",
                data: {
                    "mobile": localStorage.phone,

                },
            },
            function (obj) {
                $('.textStatus').text('已发送验证码短信到');
                localStorage.codeSign = obj.sign;
                that.doCountDownView();
            },
            function (json) {
                $.popupCover({
                    content: json.error_message
                })
            })
    },
    //倒计时
    doCountDownView: function () {
        var that = this;
        var time = 60;
        $(".input_ma span").html('重新发送（<b class="daojishi">60</b>）').css({
            color: "#999"
        });
        var t = setInterval(function () {
            time--;
            that.showBool = false;
            $(".daojishi").html(time);
            if (time == 0) {
                clearInterval(t);
                $(".input_ma span").html("重新发送").css({
                    color: "#44b7f7"
                });
                that.showBool = true;
            }
        }, 1000)


    },

};
$(function () {
    changemima2Controller.initView();
})
