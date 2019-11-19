<section class="content">
    <div class="container-fluid">

        <div class="col-xs-12 col-sm-8">
            <div class="card profile-card">
                <?= form_open_multipart('admin/editProfile'); ?>
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
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $admin['email']; ?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="profile-footer">
                    <div class="row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $admin['name']; ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="profile-footer">
                    <div class="row">
                        <div class="col-sm-2"><b>Picture</b></div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="/uploads/profile/<?= $admin['image'] ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profile-footer">
                    <button type="submit" class="btn btn-primary btn-lg waves-effect btn-block">EDIT</button>
                </div>
                </form>
            </div>
        </div>

    </div>
</section>