<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MKBKM | Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg" style="background-color:aliceblue;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <!-- <div class="card o-hidden border-0 shadow-lg my-5"> -->
                <div class="card-body p-0 shadow-lg my-5" style="background-color:royalblue; border-radius: 15px;">

                    <!-- <span class="close">&times;</span> -->

                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-6 mb-1 mt-1" style="border: 2px outset; border-radius: 15px; border-color:cornflowerblue; background-color:white">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="/gambar/yarsi.png" alt="logo" width="150" height="55">
                                    <img src="/gambar/kampus.png" alt="logo" width="130" height="60">
                                    <h1 class="h4 text-gray-900 mb-4 mt-2" style="border: 2px outset; border-left-color:transparent; border-right-color:transparent; border-bottom-color:transparent; border-top-color:blue;"><?= lang('Auth.loginTitle') ?> Mahasiswa dan Dosen</h1>
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>


                                <div class="col-6">
                                    <?php if (session()->getFlashdata('msg')) : ?>
                                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                                    <?php endif; ?>
                                    <form action="/login/postAuth" method="post">
                                        <div class="mb-3">
                                            <label for="InputForUserName" class="form-label">Username</label>
                                            <input type="text" name="userName" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" style="width: 200%" id="InputForUserName" name="login" placeholder="Username" value="">
                                        </div>
                                        <div class="mb-3">
                                            <label for="InputForPassword" class="form-label"><?= lang('Auth.password') ?></label>
                                            <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" style="width: 200%;" id=" InputForPassword">
                                        </div>
                                        <button type="submit" class="btn btn-primary" style="width: 200%">Login</button>
                                    </form>

                                    <div class="text-center" style="width:200%">
                                        <a class="small" href="<?= route_to('register') ?>">Ingin Login Sebagai Warek? Klik Disini</a>
                                    </div>
                                    <!-- <div class="text-center" style="width:200%">
                                        <a class="small" href="<?= route_to('forgot') ?>">Lupa Password</a>
                                    </div> -->
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>