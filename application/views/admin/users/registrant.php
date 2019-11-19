<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            DAFTAR PEMAGANG
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            EXPORTABLE TABLE
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($registrant as $r) : ?>
                                        <?php if ($r['is_deleted'] == 0) { ?>
                                            <tr>
                                                <td><?= $r['name']; ?></td>
                                                <td><?= $r['email']; ?></td>
                                                <td><?= $r['start']; ?></td>
                                                <td><?= $r['finish']; ?></td>
                                                <td><?= $r['phone']; ?></td>
                                                <td>
                                                    <a href="/admin/writingMail/<?= $r['id']; ?>"><button class="btn btn-primary" title="Kirim Pesan"><i class="material-icons">mail</i></button></a>
                                                    <a href="/admin/editRegistrant/<?= $r['id']; ?>"><button class="btn btn-success" title="Edit atau Detail Data"><i class="material-icons">build</i></button></a>
                                                    <a href="/admin/delete/<?= $r['id']; ?>" onclick="return confirm('Yakin akan menghapus <?= $r['email']; ?>?');"><button class="btn btn-danger" title="Hapus Data"><i class="material-icons">delete_forever</i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            MENUNGGU PROSES MAGANG
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Phone</th>
                                        <th>Duration</th>
                                        <th>Waiting Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Phone</th>
                                        <th>Duration</th>
                                        <th>Waiting Time</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($registrant as $r) : ?>
                                        <?php if ($r['status'] == 2 && $r['status_magang'] == 0) { ?>
                                            <?php $datetime1 = new DateTime($r['start']);
                                                    $datetime2 = new DateTime($r['finish']);
                                                    $datetime3 = new DateTime() ?>
                                            <tr>
                                                <td><?= $r['name']; ?></td>
                                                <td><?= $r['email']; ?></td>
                                                <td><?= $r['start']; ?></td>
                                                <td><?= $r['finish']; ?></td>
                                                <td><?= $r['phone']; ?></td>
                                                <th>
                                                    <?php $difference = $datetime1->diff($datetime2);
                                                            echo $difference->days; ?>
                                                </th>
                                                <th>
                                                    <?php $difference = $datetime3->diff($datetime1);
                                                            echo $difference->days; ?>
                                                </th>
                                                <td>
                                                    <a href="/admin/confirmStart/<?= $r['id'] ?>"><button class="btn btn-success" title="Konfirmasi mulai magang"><i class="material-icons">confirmation_number</i></button></a>
                                                    <a href="/admin/writingMail/<?= $r['id'] ?>"><button class="btn btn-primary" title="Kirim Pesan"><i class="material-icons">mail</i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>