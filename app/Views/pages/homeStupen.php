<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h2 class="my-3">Daftar Peserta Studi Independen Tahun <?= date('Y')  ?></h2>

            <?php if (session()->get('role') == 'Mahasiswa') : { ?>

                    <div class="row justify-content-center">


                        <div class="card border-white" style="width: 18rem;">
                            <div class="text-center">
                                <img class="rounded-circle" src="/gambar/msib.jpg" alt="Card image cap" style="width: 200px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Magang Bersertifikat</h5>
                                <p class="text-justify" style="border: 2px outset; border-left-color:transparent; border-right-color:transparent; border-bottom-color:transparent; border-top-color:blue;">Magang Bersertifikat adalah bagian dari program Kampus Merdeka yang bertujuan untuk memberikan kesempatan kepada mahasiswa belajar dan mengembangkan diri melalui aktivitas di luar kelas perkuliahan.</p>
                                <a href="https://kampusmerdeka.kemdikbud.go.id/program/magang" class="btn btn-primary">Tentang Program</a>
                            </div>
                        </div>
                        <div class="card border-white" style="width: 18rem;">
                            <div class="text-center">
                                <img class="rounded-circle" src="/gambar/msib.jpg" alt="Card image cap" style="width: 200px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Studi Independen</h5>
                                <p class="text-justify" style="border: 2px outset; border-left-color:transparent; border-right-color:transparent; border-bottom-color:transparent; border-top-color:blue;">Studi Independen Bersertifikat adalah bagian dari program Kampus Merdeka yang bertujuan untuk memberikan kesempatan kepada mahasiswa untuk belajar dan mengembangkan diri melalui aktivitas di luar kelas perkuliahan, namun tetap diakui sebagai bagian dari perkuliahan.</p>
                                <a href="https://kampusmerdeka.kemdikbud.go.id/program/studi-independen" class="btn btn-primary">Tentang Program</a>
                            </div>
                        </div>
                        <div class="card border-white" style="width: 18rem;">
                            <div class="text-center">
                                <img class="rounded-circle" src="/gambar/mengajar.jpg" alt="Card image cap" style="width: 200px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-center">Kampus Mengajar</h5>
                                <p class="text-justify" style="border: 2px outset; border-left-color:transparent; border-right-color:transparent; border-bottom-color:transparent; border-top-color:blue;">Kampus Mengajar adalah sebuah program yang memberikan kesempatan kepada mahasiswa selama 1 (satu) semester untuk membantu para guru dan kepala sekolah jenjang SD dan SMP dalam melaksanakan kegiatan pembelajaran yang terdampak pandemi. </p>
                                <a href="https://kampusmerdeka.kemdikbud.go.id/program/mengajar" class="btn btn-primary">Tentang Program</a>
                            </div>
                        </div>
                <?php }
            endif; ?>
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/pages">Peserta Magang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pages/homeStupen">Peserta Studi Independen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/homeMengajar">Peserta Kampus Mengajar</a>
                    </li>
                </ul>

                <table class="table text-center" id="example">
                    <thead>
                        <tr>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Bentuk Kegiatan</th>
                            <th scope="col">Mitra Perusahaan</th>
                            <th scope="col">Tahun Ajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                        <?php
                        $sql = "SELECT * FROM stupen_mbkm WHERE created_at BETWEEN '2022-03-01' AND '2022-012-01'";
                        $result = mysqli_query($con, $sql);


                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?= $row['nama_mahasiswa']; ?></td>
                                <td><?= $row['npm_mahasiswa']; ?></td>
                                <td><?= $row['bentuk_kegiatan']; ?></td>
                                <td><?= $row['mitra_perusahaan']; ?></td>
                                <td><?= $row['created_at']; ?></td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>


                <div class="row">

                    <?php if (in_groups('dosen')) : ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?php endif; ?>


                    </div>
        </div>
    </div>
    <?= $this->endSection(); ?>