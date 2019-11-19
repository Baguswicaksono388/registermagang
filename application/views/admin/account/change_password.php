<section class="content">
    <div class="container-fluid">

        <div class="col-xs-12 col-sm-8">
            <div class="card profile-card">
                <form action="/admin/changePassword" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $admin['id']; ?>">
                    <div class="profile-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Current Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="new_password1" name="new_password1">
                                <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <div class="row">
                            <label class="col-sm-3 col-form-label">Confirm New Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="new_password2" name="new_password2">
                                <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="profile-footer">
                        <button type="submit" class="btn btn-primary btn-lg waves-effect btn-block">CHANGE PASSWORD</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</section>