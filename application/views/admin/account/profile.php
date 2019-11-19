<section class="content">
    <div class="container-fluid">

        <div class="col-xs-12 col-sm-3">
            <div class="card profile-card">
                <div class="profile-header">&nbsp;</div>
                <div class="profile-body">
                    <div class="image-area">
                        <img src="/uploads/profile/<?= $admin['image'] ?>" alt="AdminBSB - Profile Image" />
                    </div>
                    <div class="content-area">
                        <h3><?= $admin['name'] ?></h3>
                        <p><?= $admin['email'] ?></p>
                        <p>Administrator</p>
                    </div>
                </div>
                <div class="profile-footer">
                    <a href="/admin/editProfile"><button class="btn btn-primary btn-lg waves-effect btn-block">EDIT</button></a>
                </div>
            </div>
        </div>

    </div>
</section>