<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<?php $session = session(); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Registrasi Mahasiswa MBKM</h2>
            <form action="/Mengajar/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" autofocus>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_mahasiswa')) ? 'is-invalid' : ''; ?>" id="nama_mahasiswa" name="nama_mahasiswa" autofocus placeholder="<?= $session->get('displayname'); ?>" disabled>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_mahasiswa'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="npm_mahasiswa" class="col-sm-2 col-form-label">NPM Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="npm_mahasiswa" name="npm_mahasiswa" autofocus placeholder="<?= $session->get('id_nik'); ?>" disabled>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" id="program_studi" name="program_studi" autofocus value="<?= old('program_studi'); ?>"> -->
                        <select class="form-control col-sm-2 mt-3 mb-3" name="program_studi" id="program_studi" required="" autofocus value="<?= old('program_studi'); ?>">
                            <option selected disabled hidden>Pilih</option>
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Perpustakaan dan Sains Informasi">Perpustakaan dan Sains Informasi</option>
                            <option value="Psikologi">Psikologi</option>
                            <option value="Hukum">Hukum</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" id="program_studi" name="program_studi" autofocus value="<?= old('fakultas'); ?>"> -->
                        <select class="form-control col-sm-2 mt-3 mb-3" name="fakultas" id="fakultas" required="" autofocus value="<?= old('fakultas'); ?>">
                            <option selected disabled hidden>Pilih</option>
                            <option value="Ekonimi dan Bisnis">Ekonomi dan Bisnis</option>
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                            <option value="Psikologi">Psikologi</option>
                            <option value="Hukum">Hukum</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="semester" name="semester" autofocus value="<?= old('semester'); ?>">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ipk" name="ipk" autofocus value="<?= old('ipk'); ?>">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah_sks" class="col-sm-2 col-form-label">Jumlah SKS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah_sks" name="jumlah_sks" autofocus value="<?= old('jumlah_sks'); ?>">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_wa" class="col-sm-2 col-form-label">No WA</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_wa" name="no_wa" autofocus value="<?= old('no_wa'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bentuk_kegiatan" class="col-sm-2 col-form-label">Bentuk Kegiatan</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" id="bentuk_kegiatan" name="bentuk_kegiatan" autofocus value="<?= old('bentuk_kegiatan'); ?>"> -->
                        <select class="form-control col-sm-2 mt-3 mb-3" name="bentuk_kegiatan" id="bentuk_kegiatan" required="" autofocus value="<?= old('bentuk_kegiatan'); ?>">
                            <option selected disabled hidden>Pilih</option>
                            <option value="Magang Bersertifikat">Magang Bersertifikat</option>
                            <option value="Studi Independen">Studi Independen</option>
                            <option value="Kampus Mengajar">Kampus Mengajar</option>
                        </select>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="learning_path" class="col-sm-2 col-form-label">learning_path</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="learning_path" name="learning_path" autofocus value="<?= old('learning_path'); ?>">
                    </div>
                </div> -->
                <div class="row mb-3">
                    <label for="mitra_perusahaan" class="col-sm-2 col-form-label">Mitra Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mitra_perusahaan" name="mitra_perusahaan" autofocus value="<?= old('mitra_perusahaan'); ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="surat_persetujuan_prodi" class="col-sm-2 custom-form-label">Surat Persetujuan Prodi</label>
                    <div class="col-auto">
                        <input class="custom-file-input  <?= ($validation->hasError('learning_path')) ? 'is-invalid' : ''; ?>" type="file" id="learning_path" name="learning_path" accept="application/pdf" style="opacity: 100;">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('learning_path'); ?>
                        </div>
                        Maksimal 3 MB
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="surat_persetujuan" class="col-sm-2 col-form-label">surat_persetujuan_prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="surat_persetujuan" name="surat_persetujuan" autofocus value="<?= old('surat_persetujuan'); ?>">
                    </div>
                </div> -->
                <div class="row mb-3">
                    <label for="surat_komitmen" class="col-sm-2 custom-form-label">Surat Komitmen</label>
                    <div class="col-auto">
                        <input class="custom-file-input  <?= ($validation->hasError('surat_komitmen')) ? 'is-invalid' : ''; ?>" type="file" id="surat_komitmen" name="surat_komitmen" accept="application/pdf" style="opacity: 100;">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('surat_komitmen'); ?>
                        </div>
                        Maksimal 3 MB
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 custom-form-label">Foto</label>
                    <div class="col-auto">
                        <input class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" accept=".jpg, .jpeg, .png" style=" opacity: 100;">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                        </div>
                        Maksimal 2 MB
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Tambahkan Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>