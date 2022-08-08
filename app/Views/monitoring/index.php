<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <legend class="mb-3"><b>Monitoring Progress</b></legend>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nama Mahasiswa</th>
                        <th scope="col">NPM</th>
                        <th scope="col">Bentuk Kegiatan</th>
                        <th scope="col">created at</th>
                        <th scope="col">update at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($monitoring as $a) : ?>
                        <tr>
                            <th scope="row"> <?= $a['id']; ?></th>
                            <td><?= $a['nama_mahasiswa']; ?></td>
                            <td><?= $a['npm_mahasiswa']; ?></td>
                            <td><?= $a['bentuk_kegiatan']; ?></td>
                            <td><?= $a['created_at']; ?></td>
                            <td><?= $a['update_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>