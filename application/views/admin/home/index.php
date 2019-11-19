<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <?php
                    $all = 0;
                    foreach ($registrant as $r) :
                        if ($r['is_deleted'] == 0) {
                            $all = $all + 1;
                        }
                    endforeach;
                    ?>
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">APPRENTICE</div>
                        <div class="number count-to" data-from="0" data-to="<?= $all; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <?php
                    $y = 0;
                    foreach ($registrant as $r) :
                        if ($r['status'] == 1 && $r['is_deleted'] == 0) {
                            $y = $y + 1;
                        }
                    endforeach;
                    ?>
                    <div class="icon">
                        <a href="/admin/toUnconfirmed">
                            <i class="material-icons">help</i>
                        </a>
                    </div>
                    <div class="content">
                        <div class="text">UNCONFIRMED</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $y; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <?php
                    $y = 0;
                    foreach ($registrant as $r) :
                        if ($r['status_magang'] == 1 && $r['is_deleted'] == 0) {
                            $y = $y + 1;
                        }
                    endforeach;
                    ?>
                    <div class="icon">
                        <a href="/admin/internshipProcess">
                            <i class="material-icons">card_travel</i>
                        </a>
                    </div>
                    <div class="content">
                        <div class="text">INTERNSHIP PROCESS</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $y; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <?php
                    $re = 0;
                    foreach ($registrant as $r) :
                        if ($r['recomended'] == 'y' && $r['is_deleted'] == 0) {
                            $re = $re + 1;
                        }
                    endforeach;
                    ?>
                    <div class="icon">
                        <a href="/admin/recommended">
                            <i class="material-icons">thumb_up</i>
                        </a>
                    </div>
                    <div class="content">
                        <div class="text">RECOMMENDED</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $re; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>CPU USAGE (%)</h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right">
                                <div class="switch panel-switch-btn">
                                    <span class="m-r-10 font-12">REAL TIME</span>
                                    <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="real_time_chart" class="dashboard-flot-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# CPU Usage -->

    </div>
</section>