<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php $session = session(); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <!-- Tab -->
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="/Report/index">Laporan Bulanan MBKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color: black;" href="">Laporan Akhir MBKM</a>
                    </li>
                </ul>
            </div>
            <div class="input-group mb-1">
                <div class="row">
                    <?php if (session()->get('role') == 'Mahasiswa') : { ?>
                            <!-- <form action="/report/save" method="POST">
                                <input type="text" id="npm_mahasiswa" name="npm_mahasiswa">
                                <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan">
                                <input type="date" id="week" name="week">
                                <input type="text" class="form-control mt-3" id="activity" name="activity" width="198px">
                                <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Data</button>
                            </form> -->
                            <!-- Trigger/Open The Modal -->
                            <!-- <button id="myBtn">Tambahkan Data</button> -->
                            <button type="submit" id="btn" class="btn btn-primary mb-3 mt-3 ml-3">Tambahkan Laporan</button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content" style="width: 40%;">
                                    <div class="modal-header">
                                        <h2>Isi Form Laporan Akhir</h2>
                                        <span class="close">&times;</span>
                                    </div>
                                    <div class="modal-body" style="width:-moz-available;">
                                        <form action="/report/save2" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="row justify-content-center">
                                                <label for="npm_mahasiswa" class="col-sm-2 col-form-label">NPM Mahasiswa</label>
                                                <input class="form-control form-control-sm-2" type="text" id="npm_mahasiswa" name="npm_mahasiswa" autofocus placeholder="<?= $session->get('id_nik'); ?>" style="width:200px;" disabled>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="npm_mahasiswa" class="col-sm-2 col-form-label">Bentuk Kegiatan</label>
                                                <!-- <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="Bentuk Kegiatan"> -->
                                                <select class="form-select col-xs-2 mt-3 mb-3" style="width:auto;" name="bentuk_kegiatan" id="bentuk_kegiatan" required="" autofocus value="<?= old('bentuk_kegiatan'); ?>">
                                                    <option selected disabled hidden>Pilih</option>
                                                    <option value="Magang Bersertifikat">Magang Bersertifikat</option>
                                                    <option value="Studi Independen">Studi Independen</option>
                                                    <option value="Kampus Mengajar">Kampus Mengajar</option>
                                                </select>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="berkas_laporan" class="col-sm-2 col-form-label">Laporan Akhir</label>
                                                <div class="col-auto">
                                                    <input class="form-control <?= ($validation->hasError('berkas_laporan')) ? 'is-invalid' : ''; ?>" type="file" id="berkas_laporan" name="berkas_laporan" style="opacity: 100;" accept="application/pdf" placeholder="<?= $session->get('id_nik'); ?>">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        <?= $validation->getError('berkas_laporan'); ?>
                                                    </div>
                                                    Maksimal 3 MB
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="upload_sertif" class="col-sm-2 col-form-label">Sertifikat</label>
                                                <div class="col-auto">
                                                    <input class="form-control  <?= ($validation->hasError('upload_sertif')) ? 'is-invalid' : ''; ?>" type="file" id="upload_sertif" name="upload_sertif" accept="application/pdf" style="opacity: 100;">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        <?= $validation->getError('upload_sertif'); ?>
                                                    </div>
                                                    Maksimal 2 MB
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                                                <div class="col-auto">
                                                    <input class="form-control  <?= ($validation->hasError('nilai')) ? 'is-invalid' : ''; ?>" type="file" id="nilai" name="nilai" accept="application/pdf" style="opacity: 100;">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        <?= $validation->getError('nilai'); ?>
                                                    </div>
                                                    Maksimal 1 MB
                                                </div>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="bukti_lain" class="col-sm-2 col-form-label">Bukti Lain</label>
                                                <div class="col-auto">
                                                    <input class="form-control col-xs-2 <?= ($validation->hasError('bukti_lain')) ? 'is-invalid' : ''; ?>" type="file" id="bukti_lain" name="bukti_lain" accept=".jpg, .jpeg, .png" style="opacity: 100;">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        <?= $validation->getError('bukti_lain'); ?>
                                                    </div>
                                                    Maksimal 5 MB
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Laporan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                    <?php }
                    endif; ?>
                </div>
            </div>
        </div>
        <h3 class="mt-1"> Laporan Akhir Mahasiswa</h3>
        <div class="row justify-content-center">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NPM Mahasiswa</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Berkas laporan</th>
                        <th scope="col">Sertifikat</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Lainnya</th>
                        <th scope="col">Tanggapan</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (session()->get('role') == 'Dosen') : { ?>
                            <?php
                            // $db = $validation;
                            $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != ""';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;


                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;
                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td>
                                        <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                                            Beri Tanggapan
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                                            <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                                            <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                                            <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan">
                                                            <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="70px" placeholder="Jumlah SKS yang diakui Prodi">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
        </div>

        </td>


        </tr>
<?php }
                        }
                    endif; ?>
<?php if (in_groups('dosen-ti')) : { ?>
        <?php
        // $db = $validation;
        $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != "" AND npm_mahasiswa LIKE "140%"';
        $result = mysqli_query($con, $sql);
        $angka = 0;
        while ($row = mysqli_fetch_array($result)) {
            $angka++;
        ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                        Beri Tanggapan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                        <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                        <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                        <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan">
                                        <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="100px" placeholder="Jumlah SKS yang diakui">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
    </div>

    </td>


    </tr>
<?php }
    }
endif; ?>
<?php if (in_groups('dosen-pdsi')) : { ?>
        <?php
        // $db = $validation;
        $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != "" AND npm_mahasiswa LIKE "150%"';
        $result = mysqli_query($con, $sql);
        $angka = 0;
        while ($row = mysqli_fetch_array($result)) {
            $angka++;
        ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                        Beri Tanggapan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                        <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                        <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                        <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan">
                                        <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="100px" placeholder="Jumlah SKS yang diakui">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
</div>

</td>


</tr>
<?php }
    }
endif; ?>
<?php if (in_groups('dosen-psi')) : { ?>
        <?php
        // $db = $validation;
        $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != "" AND npm_mahasiswa LIKE "160%"';
        $result = mysqli_query($con, $sql);
        $angka = 0;
        while ($row = mysqli_fetch_array($result)) {
            $angka++;
        ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                        Beri Tanggapan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                        <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                        <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                        <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan">
                                        <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="100px" placeholder="Jumlah SKS yang diakui">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>

                </td>


            </tr>
<?php }
    }
endif; ?>
<?php if (in_groups('dosen-eko')) : { ?>
        <?php
        // $db = $validation;
        $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != "" AND npm_mahasiswa LIKE "120%"';
        $result = mysqli_query($con, $sql);
        $angka = 0;
        while ($row = mysqli_fetch_array($result)) {
            $angka++;
        ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                        Beri Tanggapan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                        <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                        <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                        <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan">
                                        <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="100px" placeholder="Jumlah SKS yang diakui">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>

                </td>
            </tr>
<?php }
    }
endif; ?>
<?php if (in_groups('dosen-akt')) : { ?>
        <?php
        // $db = $validation;
        $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != "" AND npm_mahasiswa LIKE "121%"';
        $result = mysqli_query($con, $sql);
        $angka = 0;
        while ($row = mysqli_fetch_array($result)) {
            $angka++;
        ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                        Beri Tanggapan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                        <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                        <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                        <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan">
                                        <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="100px" placeholder="Jumlah SKS yang diakui">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>

                </td>


            </tr>
<?php }
    }
endif; ?>
<?php if (in_groups('dosen-hukum')) : { ?>
        <?php
        // $db = $validation;
        $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != "" AND npm_mahasiswa LIKE "130%"';
        $result = mysqli_query($con, $sql);
        $angka = 0;
        while ($row = mysqli_fetch_array($result)) {
            $angka++;
        ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                        Beri Tanggapan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                        <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                        <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                        <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan">
                                        <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="100px" placeholder="Jumlah SKS yang diakui">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>

                </td>


            </tr>
<?php }
    }
endif; ?>
<?php if (in_groups('warek', 'warek-admin')) : { ?>
        <?php
        // $db = $validation;
        $sql = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != ""';
        $result = mysqli_query($con, $sql);
        $angka = 0;


        while ($row = mysqli_fetch_array($result)) {
            $angka++;
        ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['berkas_laporan']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['upload_sertif']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['nilai']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>
                <td>
                    <a href="<?= site_url('laporan/' . $row['bukti_lain']); ?>"><img src="/laporan/docs.png" width="40" height="40"></a>
                </td>

                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row['id'] ?>">
                        Lihat Tanggapan
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Isi Tanggapan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="/report/save3/<?= $row['id']; ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" placeholder="" autofocus value="<?= $row['npm_mahasiswa'];  ?>" readonly>
                                        <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="" autofocus value="<?= $row['bentuk_kegiatan'];  ?>" hidden readonly>
                                        <input type="text" id="berkas_laporan" name="berkas_laporan" placeholder="" autofocus value="<?= $row['berkas_laporan'];  ?>" hidden readonly>
                                        <input type="text" class="mt-3" id="tanggapan" name="tanggapan" width="50px" placeholder="Tanggapan" disabled>
                                        <input type="text" class="mt-3" id="jumlah_sks_diakui" name="jumlah_sks_diakui" width="100px" placeholder="Jumlah SKS yang diakui" disabled>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Tanggapan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>

                </td>


            </tr>
<?php }
    }
endif; ?>

<?php
$npm = session()->get('id_nik');
// print_r($npm);
// die;
if (session()->get('id_nik')) : {
        // echo "hahahaha";
?>
        <?php // $npm = session()->get('id_nik');
        $sqll = 'SELECT * FROM report WHERE berkas_laporan IS NOT NULL AND berkas_laporan != "" AND npm_mahasiswa LIKE ' . $npm;
        // print_r($sqll);
        // die;
        $resultt = mysqli_query($con, $sqll);
        $angka = 0;
        while ($row = mysqli_fetch_array($resultt)) {
            $angka++;
        ?>
            <tr>

                <td><?= $angka; ?></td>
                <td><?php echo $row['npm_mahasiswa']; ?></td>
                <td><?php echo $row['bentuk_kegiatan']; ?></td>
                <td><img src="/laporan/docs.png" width="40" height="40"></td>
                <td><img src="/laporan/docs.png" width="40" height="40"></td>
                <td><img src="/laporan/docs.png" width="40" height="40"></td>
                <td><img src="/laporan/docs.png" width="40" height="40"></td>
                <td><?php echo $row['tanggapan']; ?></td>
            </tr>
<?php }
    }
endif; ?>

</tbody>
</table>
</div>
</div>
</div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("btn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function ShowModal(id) {
        var modal = document.getElementById(id);
        modal.style.display = "block";
    }
</script>



<?= $this->endSection(); ?>