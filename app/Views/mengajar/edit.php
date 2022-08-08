<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Mahasiswa</h2>
            <form action="/mengajar/update/<?= $mengajar_mbkm['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $mengajar_mbkm['nama_mahasiswa']; ?>">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" autofocus value="<?= (old('email')) ?
                                                                                                                old('email') : $mengajar_mbkm['email'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_mahasiswa')) ? 'is-invalid' : ''; ?>" id="nama_mahasiswa" name="nama_mahasiswa" autofocus value="<?= (old('nama_mahasiswa')) ?
                                                                                                                                                                                                        old('nama_mahasiswa') : $mengajar_mbkm['nama_mahasiswa'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_mahasiswa'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="npm_mahasiswa" class="col-sm-2 col-form-label">NPM Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="npm_mahasiswa" name="npm_mahasiswa" autofocus value="<?= (old('npm_mahasiswa')) ?
                                                                                                                                old('npm_mahasiswa') : $mengajar_mbkm['npm_mahasiswa'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_wa" class="col-sm-2 col-form-label">no wa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_wa" name="no_wa" autofocus value="<?= (old('no_wa')) ? old('no_wa') : $mengajar_mbkm['no_wa'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="program_studi" name="program_studi" autofocus value="<?= (old('program_studi')) ?
                                                                                                                                old('program_studi') : $mengajar_mbkm['program_studi'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bentuk_kegiatan" class="col-sm-2 col-form-label">Bentuk Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bentuk_kegiatan" name="bentuk_kegiatan" autofocus value="<?= (old('bentuk_kegiatan')) ?
                                                                                                                                    old('bentuk_kegiatan') : $mengajar_mbkm['bentuk_kegiatan'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mitra_perusahaan" class="col-sm-2 col-form-label">mitra_perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mitra_perusahaan" name="mitra_perusahaan" autofocus value="<?= (old('mitra_perusahaan')) ?
                                                                                                                                    old('mitra_perusahaan') : $mengajar_mbkm['mitra_perusahaan'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat_komitmen" class="col-sm-2 col-form-label">surat_komitmen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="surat_rekomendasi" name="surat_komitmen" autofocus value="<?= (old('surat_komitmen')) ?
                                                                                                                                    old('surat_komitmen') : $mengajar_mbkm['surat_komitmen'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">foto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="foto" name="foto" autofocus value="<?= (old('foto')) ?
                                                                                                            old('foto') : $mengajar_mbkm['foto'] ?>">
                    </div>
                </div>
                <button type=" submit" class="btn btn-primary mt-3">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>