<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/pages/monitoring">Peserta Magang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pages/monStupen">Peserta Studi Independen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/pages/monMengajar">Peserta Kampus Mengajar</a>
                </li>
            </ul>

            <table class="table text-center" id="example">
                <thead>
                    <tr>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Bentuk Kegiatan</th>
                        <th scope="col">Status Fakultas</th>
                        <th scope="col">Status Rektorat</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($km as $a) : ?>
                        <tr>
                            <td><?= $a['nama_mahasiswa']; ?></td>
                            <!-- <td><img src="/gambar/<?= $a['email']; ?>" alt="" class="sampul"></td> -->
                            <td><?= $a['npm_mahasiswa']; ?></td>
                            <td><?= $a['bentuk_kegiatan']; ?></td>
                            <td><?= $a['status']; ?></td>
                            <td><?= $a['status2']; ?></td>
                            <td><?= $a['update_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>