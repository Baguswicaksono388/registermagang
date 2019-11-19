<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            CONFIRM
        </div>

        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DATA DIRI DARI
                            <small><?= $confirm['email']; ?></small>
                        </h2>
                    </div>

                    <!-- Start Coloum Form -->
                    <input type="hidden" name="id_karyawan" id="nama" value="<?= $confirm['id']; ?>" readonly>
                    <div class="body">

                        <div class="row clearfix">
                            <div class="col-md-4">
                                <b>Name</b>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">assignment_ind</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control date" value="<?= $confirm['name']; ?>" readonly>
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
                                        <input type="email" class="form-control date" value="<?= $confirm['email']; ?>" readonly>
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
                                        <input type="text" class="form-control date" value="<?= $confirm['phone']; ?>" readonly>
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
                                        <input type="text" class="form-control date" name="instance" value="<?= $confirm['instance']; ?>" readonly>
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
                                        <input type="date" class="form-control date" name="start" value="<?= $confirm['start']; ?>" readonly>
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
                                        <input type="date" class="form-control date" name="finish" value="<?= $confirm['finish']; ?>" readonly>
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
                                <div class="form-group">
                                    <div class="form-line">
                                        <a href="/admin/confirmed/<?= $confirm['id']; ?>">
                                            <button class="btn btn-primary btn-lg waves-effect btn-block">CONFIRMED</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <a href="/admin/unconfirmed/<?= $confirm['id']; ?>">
                                            <button class="btn btn-danger btn-lg waves-effect btn-block">UNCONFIRMED</button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- Finish Coloum Form -->

                </div>
            </div>
        </div>

    </div>
</section>