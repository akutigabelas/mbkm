<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Registrasi Mahasiswa MBKM</h2>
            <form action="/Mengajar/create2/<?= $mengajar_mbkm['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $mengajar_mbkm['nama_mahasiswa']; ?>">
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" autofocus value="<?= (old('email')) ?
                                                                                                                old('email') : $mengajar_mbkm['email'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_mahasiswa" class="col-sm-2 col-form-label">Nama Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_mahasiswa')) ? 'is-invalid' : ''; ?>" id="nama_mahasiswa" name="nama_mahasiswa" autofocus value="<?= (old('nama_mahasiswa')) ?
                                                                                                                                                                                                        old('nama_mahasiswa') : $mengajar_mbkm['nama_mahasiswa'] ?>" readonly>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_mahasiswa'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="npm_mahasiswa" class="col-sm-2 col-form-label">NPM Mahasiswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="npm_mahasiswa" name="npm_mahasiswa" autofocus value="<?= (old('npm_mahasiswa')) ?
                                                                                                                                old('npm_mahasiswa') : $mengajar_mbkm['npm_mahasiswa'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="program_studi" class="col-sm-2 col-form-label">Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="program_studi" name="program_studi" autofocus value="<?= (old('program_studi')) ?
                                                                                                                                old('program_studi') : $mengajar_mbkm['program_studi'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fakultas" class="col-sm-2 col-form-label">fakultas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fakultas" name="fakultas" autofocus value="<?= (old('fakultas')) ?
                                                                                                                    old('fakultas') : $mengajar_mbkm['fakultas'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="semester" name="semester" autofocus value="<?= (old('semester')) ?
                                                                                                                    old('semester') : $mengajar_mbkm['semester'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ipk" class="col-sm-2 col-form-label">IPK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ipk" name="ipk" autofocus value="<?= (old('ipk')) ?
                                                                                                            old('ipk') : $mengajar_mbkm['ipk'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jumlah_sks" class="col-sm-2 col-form-label">Jumlah SKS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah_sks" name="jumlah_sks" autofocus value="<?= (old('jumlah_sks')) ?
                                                                                                                        old('jumlah_sks') : $mengajar_mbkm['jumlah_sks'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="program_studi" class="col-sm-2 col-form-label">No Wa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_wa" name="no_wa" autofocus value="<?= (old('no_wa')) ?
                                                                                                                old('no_wa') : $mengajar_mbkm['no_wa'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bentuk_kegiatan" class="col-sm-2 col-form-label">Bentuk Kegiatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="bentuk_kegiatan" name="bentuk_kegiatan" autofocus value="<?= (old('bentuk_kegiatan')) ?
                                                                                                                                    old('bentuk_kegiatan') : $mengajar_mbkm['bentuk_kegiatan'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="mitra_perusahaan" class="col-sm-2 col-form-label">Mitra Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="mitra_perusahaan" name="mitra_perusahaan" autofocus value="<?= (old('mitra_perusahaan')) ?
                                                                                                                                    old('mitra_perusahaan') : $mengajar_mbkm['mitra_perusahaan'] ?>" readonly>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="learning_path" class="col-sm-2 col-form-label">Surat Persetujuan Prodi</label>
                    <div class="col-sm-10">
                        <input type="" class="form-control" id="learning_path" name="learning_path" autofocus value="<?= (old('learning_path')) ?
                                                                                                                            old('learning_path') : $mengajar_mbkm['learning_path'] ?>" readonly>
                        <a href="<?= site_url('gambar/' . $mengajar_mbkm['learning_path']); ?>"> show it </a>


                    </div>

                </div>
                <div class="row mb-3">
                    <label for="surat_komitmen" class="col-sm-2 col-form-label">Surat Komitmen</label>
                    <div class="col-sm-10">
                        <input type="" class="form-control" id="surat_komitmen" name="surat_komitmen" autofocus value="<?= (old('surat_komitmen')) ?
                                                                                                                            old('surat_komitmen') : $mengajar_mbkm['surat_komitmen'] ?>" readonly>
                        <a href="<?= site_url('gambar/' . $mengajar_mbkm['surat_komitmen']); ?>"> show it </a>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ss_mitra" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="foto" name="foto" autofocus value="<?= (old('foto')) ?
                                                                                                            old('foto') : $mengajar_mbkm['foto'] ?>" readonly>
                        <a href="<?= site_url('gambar/' . $mengajar_mbkm['foto']); ?>"> show it </a>

                    </div>
                </div>
                <div class="row mb-3">
                    <?php if (session()->get('role') == 'Dosen') : { ?>
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-auto">
                                <select class="form-control col-xs-2 col-form-label mt-3 mb-3" name="status" id="status" required="">
                                    <option selected disabled hidden>Pilih</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Reject">Reject</option>
                                </select>
                            </div>
                    <?php }
                    endif; ?>
                </div>
                <div class="row mb-3">
                    <?php if (in_groups(['dosen-ti', 'dosen-hukum', 'dosen-akt', 'dosen-pdsi', 'dosen-psi', 'dosen-eko'])) : { ?>
                            <label for="status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-auto">
                                <select class="form-control col-xs-2 mt-3 mb-3" name="status" id="status" required="">
                                    <option selected disabled hidden>Pilih</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Reject">Reject</option>
                                </select>
                            </div>
                    <?php }
                    endif; ?>
                </div>
                <div class="row mb-3">
                    <label for="ket_status2" class="col-sm-2 col-form-label">keterangan</label>
                    <div class="col-sm-10">
                        <textarea name="ket_status" id="ket_status" cols="30" rows="1"></textarea>
                    </div>
                </div>
                <div class="col-sm-10">
                    <?php if (in_groups(['dosen-admin'])) : ?>
                        <input type="text" class="form-control" id="ket_status2" name="ket_status2" autofocus value="<?= (old('ket_status2')) ?
                                                                                                                            old('ket_staus2') : $mengajar_mbkm['ket_status2'] ?>" readonly>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-3" onclick="window.location.href='/komik'">submit</button>
                <!-- <a href="/mengajar" class="btn btn-primary mt-3 mb-3">submit</a> -->

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>