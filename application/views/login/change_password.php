<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">CHANGE YOUR PASSWORD</a>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST" action="/login/changePassword" <div class="msg">
                    Change your Password for <?= $this->session->userdata('reset_email'); ?>
            </div>
            <?php if ($this->session->flashdata('message')) { ?>
                <div class="">
                    <?= $this->session->flashdata('message') ?>
                </div>
            <?php
            } ?>

            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="New Password" required autofocus>
                </div>
                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">lock</i>
                </span>
                <div class="form-line">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password" required autofocus>
                </div>
                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET MY PASSWORD</button>

            <div class="row m-t-20 m-b--5 align-center">

            </div>
            </form>
        </div>
    </div>
    </div>