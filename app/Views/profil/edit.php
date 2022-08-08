<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Profil Wakil Rektor</h2>
            <form action="/Profil/update/<?= $profil_warek['id']; ?>" method="POST">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $profil_warek['nama_warek']; ?>">
                <div class="row mb-3">
                    <label for="email_warek" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email_warek" class="form-control" id="email_warek" name="email_warek" autofocus value="<?= (old('email_warek')) ?
                                                                                                                                old('email_warek') : $profil_warek['email_warek'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama_warek" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama_warek')) ? 'is-invalid' : ''; ?>" id="nama_warek" name="nama_warek" autofocus value="<?= (old('nama_warek')) ?
                                                                                                                                                                                            old('nama_warek') : $profil_warek['nama_warek'] ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('nama_warek'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nip_warek" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nip_warek" name="nip_warek" autofocus value="<?= (old('nip_warek')) ?
                                                                                                                        old('nip_warek') : $profil_warek['nip_warek'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jabatan_warek" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jabatan_warek" name="jabatan_warek" autofocus value="<?= (old('jabatan_warek')) ?
                                                                                                                                old('jabatan_warek') : $profil_warek['jabatan_warek'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" autofocus value="<?= (old('no_telp')) ?
                                                                                                                    old('no_telp') : $profil_warek['no_telp'] ?>">
                    </div>
                </div>

                <!-- <div class="row mb-3">
                    <label for="foto" class="col-sm-2 custom-form-label">Foto</label>
                    <div class="col-auto">
                        <input class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" style="opacity: 100;">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('foto'); ?>
                        </div>
                        Maksimal 2 MB
                    </div>
                </div>
                <div class="row mb-3" hidden>
                    <label for="foto" class="col-sm-2 custom-form-label">Ttd Digital</label>
                    <div class="col-auto">
                        <input class="custom-file-input <?= ($validation->hasError('ttd_warek')) ? 'is-invalid' : ''; ?>" type="file" id="foto" name="foto" style="opacity: 100;">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('ttd_warek'); ?>
                        </div>
                        Maksimal 2 MB
                    </div>
                </div> -->

                <button type="submit" class="btn btn-primary mt-3 mb-3">submit</button>
                <!-- <a href="/komik" class="btn btn-primary mt-3 mb-3">submit</a> -->

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>