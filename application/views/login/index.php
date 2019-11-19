<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Welcome</a>
        </div>
        <div class="card">
            <div class="body">
                <form method="POST" action="/login">
                    <div class="msg">Sign in to start your session</div>
                    <?php if ($this->session->flashdata('message')) { ?>
                        <div class="">
                            <?= $this->session->flashdata('message') ?>
                        </div>
                    <?php
                    } ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                </form>
                <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="login/forgotPassword">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>