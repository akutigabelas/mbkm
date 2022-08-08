<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Peserta</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/gambar/<?= $surat_komitmen['no_wa']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama : <?= $surat_komitmen['nama_mahasiswa']; ?></h5>
                            <p class="card-text">NPM : <?= $surat_komitmen['npm_mahasiswa']; ?></p>
                            <p class="card-text">Program Studi : <?= $surat_komitmen['program_studi']; ?></small></p>

                            <a href="/komitmen/edit/<?= $surat_komitmen['nama_mahasiswa']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/komitmen/<?= $surat_komitmen['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>



                            <br><br>
                            <a href="/komik">Kembali ke Halaman Peserta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>