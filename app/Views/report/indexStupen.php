<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <!-- Tab -->
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <?php if (in_groups('mhs-stupen')) : ?>
                            <a class="nav-link" style="color: black;" href="/komitmen">Detail Mahasiswa</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <?php if (in_groups('dosen')) : ?>
                        <a class="nav-link" style="color: black;" href="/komik">Detail Mahasiswa</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link active" style="color: #808080;" href="/report" title="Melihat Progress Pengajuan">Report</a>
            </li>
                </ul>
            </div>
            <div class="input-group mb-3">

                <div class="row">
                    <?php if (in_groups('mhs-stupen')) : ?>
                        <form action="/report/save" method="POST">
                            <input type="date" id="week" name="week">
                            <input type="text" class="form-control mt-3" id="activity" name="activity" width="198px">
                            <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Data</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">


            <table class="table" id="example">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">NPM Mahasiswa</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Week</th>
                        <th scope="col">Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($studi as $b) : ?>
                        <tr>
                            <th scope="row"> <?= $b['id']; ?></th>
                            <td><?= $b['npm_mahasiswa']; ?></td>
                            <td><?= $b['bentuk_kegiatan']; ?></td>
                            <td><?= $b['week']; ?></td>
                            <td><?= $b['activity']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>