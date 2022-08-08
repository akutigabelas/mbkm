<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Peserta</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/gambar/<?= $mengajar_mbkm['foto']; ?>" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Nama : <?= $mengajar_mbkm['nama_mahasiswa']; ?></h5>
                            <p class="card-text">NPM : <?= $mengajar_mbkm['npm_mahasiswa']; ?></p>
                            <p class="card-text">Program Studi : <?= $mengajar_mbkm['program_studi']; ?></small></p>

                            <a href="/mengajar/edit/<?= $mengajar_mbkm['nama_mahasiswa']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/mengajar/<?= $mengajar_mbkm['id']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>



                            <br><br>
                            <a href="/mengajar">Kembali ke Halaman Peserta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>