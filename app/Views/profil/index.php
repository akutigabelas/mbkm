<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Peserta</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php foreach ($profil as $a) : ?>
                            <img src="/profil_warek/<?= $a['foto']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama : <?= $a['nama_warek']; ?></h5>
                            <p class="card-text">Jabatan : <?= $a['jabatan_warek']; ?></p>
                            <p class="card-text">NIP : <?= $a['nip_warek']; ?></small></p>
                            <p class="card-text">Email : <?= $a['email_warek']; ?></small></p>
                            <p class="card-text">No Telp : <?= $a['no_telp']; ?></small></p>

                            <a href="/profil/ubah/<?= $a['nama_warek']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/profil/<?= $a['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>

                        <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>