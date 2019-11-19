<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="/uploads/profile/<?= $admin['image'] ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $admin['name']; ?></div>
                <div class="email"><?= $admin['email']; ?></div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="/admin/profile"><i class="material-icons">person</i>Profile</a></li>
                        <li><a href="/admin/changePassword"><i class="material-icons">vpn_key</i>Change Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/login/logout"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="nav-item <?= $active == 'dasboard' ? 'active' : '' ?>">
                    <a href="/admin">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li class="nav-item <?= $active == 'registrant' ? 'active' : '' ?>">
                    <a href="/admin/registrant">
                        <i class="material-icons">assignment_ind</i>
                        <span>Pemagang</span>
                    </a>
                </li>
                <li class="nav-item <?= $active == 'reporting' ? 'active' : '' ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">insert_invitation</i>
                        <span>Tahun Magang</span>
                    </a>
                    <ul class="ml-menu">
                        <?php foreach ($years as $y) { ?>
                            <li class="">
                                <a href="/admin/reporting/<?= $y['registration_year'] ?>"><?= $y['registration_year']; ?></a>
                            </li>
                        <?php }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 <a href="javascript:void(0);">Admin</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>