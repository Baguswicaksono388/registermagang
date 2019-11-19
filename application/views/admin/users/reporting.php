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
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Start</th>
                                        <th>Finish</th>
                                        <th>Phone</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php foreach ($reporting as $re) : ?>
                                        <?php if ($re['is_deleted'] == 0) { ?>
                                            <tr>
                                                <td><?= $re['name']; ?></td>
                                                <td><?= $re['email']; ?></td>
                                                <td><?= $re['start']; ?></td>
                                                <td><?= $re['finish']; ?></td>
                                                <td><?= $re['phone']; ?></td>
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