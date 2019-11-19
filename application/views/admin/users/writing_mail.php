<section class="content">
    <div class="container-fluid">

        <!-- CKEditor -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SEND EMAIL TO
                            <small><?= $confirm['email']; ?></small>
                        </h2>
                    </div>

                    <form action="/admin/sendEmail/<?= $confirm['id'] ?>" method="post">
                        <input type="hidden" name="id" value="<?= $confirm['id']; ?>">
                        <input type="hidden" name="email" value="<?= $confirm['email']; ?>" <div class="body">

                        <?php if ($this->session->flashdata('message')) { ?>
                            <div class="alert bg-pink alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?= $this->session->flashdata('message') ?>
                            </div>
                        <?php } ?>

                        <textarea id="ckeditor" name="message" required>
                            </textarea>

                        <div class="row col-sm-2">
                            <div class="form-group">
                                <div class="form-line">
                                    <button type="submit" class="btn btn-primary btn-lg waves-effect btn-block"><i class="material-icons">send</i> SEND</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- #END# CKEditor -->

    </div>
</section>