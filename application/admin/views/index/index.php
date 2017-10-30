<div class="content_wrapper">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <aside>
                    <header><i class="fa fa-fw fa-file"></i>工作台</header>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="alert alert-success" role="alert">
                                    </div>
                                    <div class="my_panel">
                                        <div class="heading">欢迎信息</div>
                                        <div class="body">您好：<?=$userinfo['adm_username']?>！您上一次登录时间：<?=$userinfo['login_time']?>，登录IP：<?=$userinfo['ip']?></div>
                                    </div>
                                    <div class="my_panel">
                                        <div class="heading">系统信息</div>
                                        <div class="body">
                                            <table class="table table-striped">
                                                <tbody>
                                                <tr>
                                                    <td width="200">所属地区</td>
                                                    <td><?=$userinfo['city']?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>

</div>