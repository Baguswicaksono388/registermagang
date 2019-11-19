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
                                        <th>Instance</th>
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
                                        <th>Instance</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($registrant as $r) : ?>

                                        <?php if ($r['recomended'] == 'y' && $r['is_deleted'] == 0) { ?>
                                            <tr>
                                                <td><?= $r['name']; ?></td>
                                                <td><?= $r['email']; ?></td>
                                                <td><?= $r['instance']; ?></td>
                                                <td><?= $r['finish']; ?></td>
                                                <td><?= $r['phone']; ?></td>
                                                <td>
                                                    <a href="/admin/writingMail/<?= $r['id'] ?>"><button class="btn btn-primary" title="Kirim Pesan"><i class="material-icons">mail</i></button></a>
                                                    <a href="/admin/editRegistrant/<?= $r['id'] ?>"><button class="btn btn-success" title="Edit atau Detail Data"><i class="material-icons">build</i></button></a>
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