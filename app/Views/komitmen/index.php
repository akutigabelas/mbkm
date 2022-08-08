<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Tab -->
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: black;" href="komitmen">Daftar Mahasiswa</a>
                    </li>
                </ul>
            </div>
            <?php

            use phpDocumentor\Reflection\Types\Null_;

            if (session()->get('role') == 'Mahasiswa') : { ?>

                    <!-- // if (in_groups('mhs-magang')) : ?> -->
                    <a href="/Komitmen/create" class="btn btn-primary mt-3">Daftar Data Mahasiswa</a> <br>
                    <a href="https://docs.google.com/document/d/1iaNR2sPVBCclK1dfnCywBEazBcpSCItb0qaDpZHZNFE">Download Surat Komitmen</a> <br>
                    <a href="https://docs.google.com/document/d/1FPPLqaqUKJsmbIDyh3KZvd8uJaHc5kMJYHr1vO-YfRA/edit?usp=sharing">Download Surat Persetujuan Prodi</a> <?php }
                                                                                                                                                            endif; ?>


            <h1 class="mt-2"> Daftar Mahasiswa</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <!-- <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div> -->
                <div class="alert alert-info" role="alert">
                    <?= session()->getFlashdata('pesan'); ?> </div>
            <?php endif; ?>

            <table class="table" id="example">
                <form action="/komitmen/kegiatan" method="POST" enctype="multipart/form-data">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Mahasiswa</th>
                            <th scope="col">NPM</th>
                            <th scope="col">Bentuk Kegiatan</th>
                            <th scope="col">Mitra Perusahaan</th>
                            <th scope="col">Status Prodi</th>
                            <?php if (session()->get('role') == 'Mahasiswa') : { ?>
                                    <th scope="col">Keterangan Prodi</th>
                            <?php }
                            endif; ?>
                            <th scope="col">Status rektorat</th>
                            <?php if (session()->get('role') == 'warek') : { ?>
                                    <th scope="col">Keterangan Warek</th>
                            <?php }
                            endif; ?>
                            <?php if (session()->get('role') == 'Dosen') : { ?>
                                    <th scope="col">aksi</th>
                            <?php }
                            endif; ?>
                            <?php if (session()->get('role') == 'Mahasiswa') : { ?>
                                    <th scope="col">download</th>
                            <?php }
                            endif; ?>
                            <?php if (in_groups(['warek', 'warek-admin', 'dosen-ti', 'dosen-hukum', 'dosen-akt', 'dosen-pdsi', 'dosen-psi', 'dosen-eko'])) : ?>
                                <th scope="col">Aksi</th>
                            <?php
                            endif; ?>
                        </tr>
                    </thead>
                    <?php if (session()->get('role') == 'Dosen') : { ?>
                            <tbody>
                                <?php
                                $angka = 0;
                                foreach ($stupen as $a) : ?>
                                    <?php $angka++; ?>
                                    <tr>
                                        <td><?= $angka; ?></td>
                                        <td><?= $a['nama_mahasiswa']; ?></td>
                                        <td><?= $a['npm_mahasiswa']; ?></td>
                                        <td><?= $a['bentuk_kegiatan']; ?></td>
                                        <td><?= $a['mitra_perusahaan']; ?></td>
                                        <td><?= $a['status']; ?></td>
                                        <td><?= $a['status2']; ?></td>
                                        <td>
                                            <?php if (session()->get('role') == 'Dosen') : { ?> <?php
                                                                                                if ($a['status'] == "") {
                                                                                                ?>
                                                        <a href="/komitmen/lanjut/<?= $a['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                                    <?php  } elseif ($a['status'] != "") { ?>
                                                        <a href="" class="btn btn-primary">Verifikasi</a>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php
                                            endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php } ?>
                    <?php endif; ?>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>

                    <?php
                    $npm = session()->get('id_nik');
                    // print_r($npm);
                    // die;
                    if (session()->get('role') == 'Mahasiswa') : {
                            // echo "hahahaha";
                    ?>
                            <tbody>
                                <?php // $npm = session()->get('id_nik');
                                $sqll = 'SELECT * FROM stupen_mbkm WHERE npm_mahasiswa LIKE ' . $npm;
                                // print_r($sqll);
                                // die;
                                $resultt = mysqli_query($con, $sqll);
                                $angka = 0;
                                $angka++;
                                while ($row = mysqli_fetch_array($resultt)) {
                                ?>
                                    <tr>
                                        <td><?= $angka; ?></td>
                                        <td><?php echo $row['nama_mahasiswa']; ?></td>
                                        <td><?php echo $row['npm_mahasiswa']; ?></td>
                                        <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                        <td><?php echo $row['mitra_perusahaan']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['ket_status']; ?></td>
                                        <td><?php echo $row['status2']; ?></td>
                                        <td><?php echo $row['ket_status2']; ?></td>
                                        <td>
                                            <?php if (session()->get('role') == 'Mahasiswa') : { ?> <?php
                                                                                                    if ($row['status'] == "Approved" && $row['status2'] == "Approved") {                                         ?>
                                                        <a href="/komitmen/generate/<?= $row['nama_mahasiswa']; ?>" class="btn btn-primary">Download</a>
                                                    <?php  } elseif ($row['status'] == "Reject") {
                                                                                                        # code...
                                                    ?>

                                                    <?php
                                                                                                    } ?>
                                            <?php }
                                            endif; ?>
                                        </td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                <?php }
                    endif; ?>

                <?php if (in_groups(['dosen'])) : ?>
                    <tbody>
                        <?php
                        foreach ($stupen as $a) : ?>
                            <tr>
                                <td><?= $a['nama_mahasiswa']; ?></td>
                                <!-- <td><img src="/gambar/<?= $a['email']; ?>" alt="" class="sampul"></td> -->
                                <td><?= $a['npm_mahasiswa']; ?></td>
                                <td><?= $a['bentuk_kegiatan']; ?></td>
                                <td><?= $a['mitra_perusahaan']; ?></td>
                                <td><?= $a['status']; ?></td>
                                <td><?= $a['status2']; ?></td>
                                <td>
                                    <?php if (in_groups(['dosen', 'dosen-admin'])) : ?>
                                        <a href="/komitmen/lanjut/<?= $a['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                    <?php endif; ?>
                                    <?php if (in_groups(['warek',  'warek-admin'])) : ?>
                                        <a href="/komitmen/lanjut2/<?= $a['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                <?php endif; ?>

                <tbody>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups(['dosen-hukum'])) : { ?>
                            <?php //$npm = session()->get('id_nik');
                            $sqll = 'SELECT * FROM stupen_mbkm WHERE npm_mahasiswa LIKE "130%"';
                            $resultt = mysqli_query($con, $sqll);
                            $angka = 0;
                            // print_r($sqll);
                            // die;
                            while ($row = mysqli_fetch_array($resultt)) {
                                $angka++;
                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?= $row['nama_mahasiswa']; ?></td>
                                    <td><?= $row['npm_mahasiswa']; ?></td>
                                    <td><?= $row['bentuk_kegiatan']; ?></td>
                                    <td><?= $row['mitra_perusahaan']; ?></td>
                                    <td><?= $row['status']; ?></td>
                                    <td><?= $row['status2']; ?></td>
                                    <td>
                                        <?php if (in_groups(['dosen-hukum'])) : { ?>
                                                <?php if ($row['status'] == "") {
                                                ?>
                                                    <a href="/komitmen/lanjut/<?= $row['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                                <?php  } elseif ($row['status'] != "") { ?>
                                                    <a href="" class="btn btn-primary">Verifikasi</a>
                                                <?php } ?> <?php }
                                                    endif; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                </tbody>
        <?php }
                    endif; ?>
        <tbody>
            <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
            <?php if (in_groups(['dosen-eko'])) : { ?>
                    <?php //$npm = session()->get('id_nik');
                    $sqll = 'SELECT * FROM stupen_mbkm WHERE npm_mahasiswa LIKE "120%"';
                    $resultt = mysqli_query($con, $sqll);
                    $angka = 0;
                    // print_r($sqll);
                    // die;
                    while ($row = mysqli_fetch_array($resultt)) {
                        $angka++;
                    ?>
                        <tr>
                            <td><?= $angka; ?></td>
                            <td><?= $row['nama_mahasiswa']; ?></td>
                            <td><?= $row['npm_mahasiswa']; ?></td>
                            <td><?= $row['bentuk_kegiatan']; ?></td>
                            <td><?= $row['mitra_perusahaan']; ?></td>
                            <td><?= $row['status']; ?></td>
                            <td><?= $row['status2']; ?></td>
                            <td>
                                <?php if (in_groups(['dosen-eko'])) : { ?>
                                        <?php if ($row['status'] == "") {
                                        ?>
                                            <a href="/komitmen/lanjut/<?= $row['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                        <?php  } elseif ($row['status'] != "") { ?>
                                            <a href="" class="btn btn-primary">Verifikasi</a>
                                        <?php } ?> <?php }
                                            endif; ?>
                            </td>
                        </tr>
                    <?php } ?>
        </tbody>
<?php }
            endif; ?>
<tbody>
    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
    <?php if (in_groups(['dosen-akt'])) : { ?>
            <?php //$npm = session()->get('id_nik');
            $sqll = 'SELECT * FROM stupen_mbkm WHERE npm_mahasiswa LIKE "121%"';
            $resultt = mysqli_query($con, $sqll);
            $angka = 0;
            // print_r($sqll);
            // die;
            while ($row = mysqli_fetch_array($resultt)) {
                $angka++;
            ?>
                <tr>
                    <td><?= $angka; ?></td>
                    <td><?= $row['nama_mahasiswa']; ?></td>
                    <td><?= $row['npm_mahasiswa']; ?></td>
                    <td><?= $row['bentuk_kegiatan']; ?></td>
                    <td><?= $row['mitra_perusahaan']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['status2']; ?></td>
                    <td>
                        <?php if (in_groups(['dosen-akt'])) : { ?>
                                <?php if ($row['status'] == "") {
                                ?>
                                    <a href="/komitmen/lanjut/<?= $row['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                <?php  } elseif ($row['status'] != "") { ?>
                                    <a href="" class="btn btn-primary">Verifikasi</a>
                                <?php } ?> <?php }
                                    endif; ?>
                    </td>
                </tr>
            <?php } ?>
</tbody>
<?php }
    endif; ?>
<tbody>
    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
    <?php if (in_groups(['dosen-ti'])) : { ?>
            <?php //$npm = session()->get('id_nik');
            $sqll = 'SELECT * FROM stupen_mbkm WHERE npm_mahasiswa LIKE "140%"';
            $resultt = mysqli_query($con, $sqll);
            $angka = 0;
            // print_r($sqll);
            // die;
            while ($row = mysqli_fetch_array($resultt)) {
                $angka++;
            ?>
                <tr>
                    <td><?= $angka; ?></td>
                    <td><?= $row['nama_mahasiswa']; ?></td>
                    <td><?= $row['npm_mahasiswa']; ?></td>
                    <td><?= $row['bentuk_kegiatan']; ?></td>
                    <td><?= $row['mitra_perusahaan']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['status2']; ?></td>
                    <td>
                        <?php if (in_groups(['dosen-ti'])) : { ?>
                                <?php if ($row['status'] == "") {
                                ?>
                                    <a href="/komitmen/lanjut/<?= $row['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                <?php  } elseif ($row['status'] != "") { ?>
                                    <a href="" class="btn btn-primary">Verifikasi</a>
                                <?php } ?> <?php }
                                    endif; ?>
                    </td>
                </tr>
            <?php } ?>
</tbody>
<?php }
    endif; ?>
<tbody>
    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
    <?php if (in_groups(['dosen-pdsi'])) : { ?>
            <?php //$npm = session()->get('id_nik');
            $sqll = 'SELECT * FROM stupen_mbkm WHERE npm_mahasiswa LIKE "150%"';
            $resultt = mysqli_query($con, $sqll);
            $angka = 0;
            // print_r($sqll);
            // die;
            while ($row = mysqli_fetch_array($resultt)) {
                $angka++;
            ?>
                <tr>
                    <td><?= $angka; ?></td>
                    <td><?= $row['nama_mahasiswa']; ?></td>
                    <td><?= $row['npm_mahasiswa']; ?></td>
                    <td><?= $row['bentuk_kegiatan']; ?></td>
                    <td><?= $row['mitra_perusahaan']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['status2']; ?></td>
                    <td>
                        <?php if (in_groups(['dosen-pdsi'])) : { ?>
                                <?php if ($row['status'] == "") {
                                ?>
                                    <a href="/komitmen/lanjut/<?= $row['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                <?php  } elseif ($row['status'] != "") { ?>
                                    <a href="" class="btn btn-primary">Verifikasi</a>
                                <?php } ?> <?php }
                                    endif; ?>
                    </td>
                </tr>
            <?php } ?>
</tbody>
<?php }
    endif; ?>
<tbody>
    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
    <?php if (in_groups(['dosen-psi'])) : { ?>
            <?php //$npm = session()->get('id_nik');
            $sqll = 'SELECT * FROM stupen_mbkm WHERE npm_mahasiswa LIKE "160%"';
            $resultt = mysqli_query($con, $sqll);
            $angka = 0;
            // print_r($sqll);
            // die;
            while ($row = mysqli_fetch_array($resultt)) {
                $angka++;
            ?>
                <tr>
                    <td><?= $angka; ?></td>
                    <td><?= $row['nama_mahasiswa']; ?></td>
                    <td><?= $row['npm_mahasiswa']; ?></td>
                    <td><?= $row['bentuk_kegiatan']; ?></td>
                    <td><?= $row['mitra_perusahaan']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td><?= $row['status2']; ?></td>
                    <td>
                        <?php if (in_groups(['dosen-psi'])) : { ?>
                                <?php if ($row['status'] == "") {
                                ?>
                                    <a href="/komitmen/lanjut/<?= $row['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                                <?php  } elseif ($row['status'] != "") { ?>
                                    <a href="" class="btn btn-primary">Verifikasi</a>
                                <?php } ?> <?php }
                                    endif; ?>
                    </td>
                </tr>
            <?php } ?>
</tbody>
<?php }
    endif; ?>
<?php if (in_groups(['warek', 'warek-admin'])) : ?>
    <tbody>
        <?php
        $angka = 0;
        foreach ($hasil as $a) :
            $angka++; ?>
            <tr>
                <td><?= $angka; ?></td>
                <td><?= $a['nama_mahasiswa']; ?></td>
                <!-- <td><img src="/gambar/<?= $a['email']; ?>" alt="" class="sampul"></td> -->
                <td><?= $a['npm_mahasiswa']; ?></td>
                <td><?= $a['bentuk_kegiatan']; ?></td>
                <td><?= $a['mitra_perusahaan']; ?></td>
                <td><?= $a['status']; ?></td>
                <td><?= $a['status2']; ?></td>
                <td>
                    <?php if (in_groups(['warek',  'warek-admin'])) : { ?> <?php
                                                                            if ($a['status2'] == "") {
                                                                            ?>
                                <a href="/komitmen/lanjut2/<?= $a['nama_mahasiswa']; ?>" class="btn btn-primary">Verifikasi</a>
                            <?php  } elseif ($a['status2'] != "") { ?>
                                <a href="" class="btn btn-primary">Verifikasi</a>
                            <?php } ?>
                    <?php }
                    endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
<?php endif; ?>

                </form>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>