<!DOCTYPE html>
<html lang="en">

<head>
    <title>Form Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/assets/images/iconte.jpg" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/assets/form/css/util.css">
    <link rel="stylesheet" type="text/css" href="/assets/form/css/main.css">
    <!--===============================================================================================-->
</head>

<body>


    <div class="container-contact100">
        <div class="contact100-map" id="google_map" data-map-x="-7.759751" data-map-y="110.409339" data-pin="/assets/images/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

        <div class="wrap-contact100">
            <div class="contact100-form-title" style="background-image: url(/assets/images/logote.png); height:5px">
                <span class="contact100-form-title-1">
                    Form Registration
                </span>
            </div>
            <?php if ($this->session->flashdata('message')) { ?>
                <div>
                    <?= $this->session->flashdata('message') ?>
                </div>
            <?php
            } ?>

            <form class="contact100-form validate-form" method="post" enctype="multipart/form-data" action="/pendaftaran/registrant">
                <div class="wrap-input100 validate-input" data-validate="Nama harus diisi">
                    <span class="label-input100">Nama Panjang:</span>
                    <input class="input100" type="text" name="name" placeholder="Nama Panjang">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Email yang benar : ex@example.com">
                    <span class="label-input100">Email:</span>
                    <input class="input100" type="text" name="email" placeholder="Alamat email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Nomor harus diisi">
                    <span class="label-input100">Nomor Hp:</span>
                    <input class="input100" type="number" name="phone" placeholder="Nomor Hp">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Nama Instansi harus diisi">
                    <span class="label-input100">Instansi:</span>
                    <input class="input100" type="text" name="instance" placeholder="Nama Instansi">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Mulai magang harus diisi">
                    <span class="label-input100">Tanggal Mulai:</span>
                    <input class="input100" type="date" name="start" id="start">
                    <span class=" focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Selesai magang harus diisi">
                    <span class="label-input100">Tanggal Selesai:</span>
                    <input class="input100" type="date" name="finish">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Foto harus dimasukkan">
                    <span class="label-input100">Foto diri:</span>
                    <input class="input100" type="file" id="photo" name="photo">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
                        <span>
                            Submit
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="/assets/form/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets/form/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets/form/vendor/bootstrap/js/popper.js"></script>
    <script src="/assets/form/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets/form/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="/assets/form/vendor/daterangepicker/moment.min.js"></script>
    <script src="/assets/form/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="/assets/form/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
    <script src="/assets/form/js/map-custom.js"></script>
    <!--===============================================================================================-->
    <script src="/assets/form/js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>