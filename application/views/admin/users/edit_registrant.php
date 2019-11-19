<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            CONFIRM
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA DIRI DARI
                            <small><?= $confirm['email']; ?></small>
                        </h2>
                    </div>

                    <form action="/admin/editRegistrant/<?= $confirm['id']; ?>" method="post" enctype="multipart/form-data">

                        <div class="body">
                            <input type="hidden" name="id" id="id" value="<?= $confirm['id']; ?>">
                            <div class="profile-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <b>Name</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">assignment_ind</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" id="name" name="name" value="<?= $confirm['name']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <b>Email</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email" id="email" value="<?= $confirm['email']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <b>Number Phone</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">contact_phone</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone" id="phone" value="<?= $confirm['phone']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <b>Instance</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">account_balance</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="instance" id="instance" value="<?= $confirm['instance']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <b>Start</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="start" id="start" value="<?= $confirm['start']; ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <b>Finish</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">date_range</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="finish" id="finish" value="<?= $confirm['finish']; ?>" required>
                                        </div>
                                        <?= form_error('finish', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-4">
                                    <b>Keterangan Konfirmasi</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">history</i>
                                        </span>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value=0 <?= $confirm['status'] == 0 ? 'selected' : '' ?>>Menunggu Konfirmasi</option>
                                            <option value=1 <?= $confirm['status'] == 1 ? 'selected' : '' ?>>Ditolak</option>
                                            <option value=2 <?= $confirm['status'] == 2 ? 'selected' : '' ?>>Terkonfirmasi</option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <b>Keterangan Magang</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">history</i>
                                        </span>
                                        <select name="status_magang" id="status_magang" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value=1 <?= $confirm['status_magang'] == 1 ? 'selected' : '' ?>>Proses Magang</option>
                                            <option value=2 <?= $confirm['status_magang'] == 2 ? 'selected' : '' ?>>Selesai Magang</option>
                                        </select>
                                        <?= form_error('status_magang', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <b>Rocomendasi</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">history</i>
                                        </span>
                                        <select name="recomended" id="recomended" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="n" <?= $confirm['recomended'] == 'n' ? 'selected' : '' ?>>Tidak Rekomendasi</option>
                                            <option value="y" <?= $confirm['recomended'] == 'y' ? 'selected' : '' ?>>Rekomendasi</option>
                                        </select>
                                        <?= form_error('recomended', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-8">
                                    <b>Catatan Magang</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">note_add</i>
                                        </span>
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control" name="note" id="note" placeholder="Buatlah catatan...."><?= $confirm['note']; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Photo</label>
                                            <img src="/uploads/foto/<?= $confirm['photo'] ?>" class="img-thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <b>Uploads Photo</b>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">note_add</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="file" class="custom-file-input" id="photo" name="photo">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-3">
                                    <div class="profile-footer">
                                        <button type="submit" class="btn btn-primary btn-lg waves-effect btn-block">CHANGE DATA</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
</section>