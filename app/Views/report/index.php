<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<div class="container">
    <div class="row">
        <div class="col-lg-10">
            <!-- Tab -->
            <div class="card-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: black;" href="">Laporan Bulanan MBKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: black;" href="/Report/laporan">Laporan Akhir MBKM</a>
                    </li>
                </ul>
            </div>
            <div class="input-group mb-1">
                <div class="row">
                    <?php

                    use App\Models\ReportModel;
                    use CodeIgniter\HTTP\Request;
                    use CodeIgniter\Session\Session;
                    use PhpParser\Node\Stmt\Echo_;

                    $session = session();
                    if (session()->get('role') == 'Mahasiswa') : { ?>
                            <!-- <form action="/report/save" method="POST">
                                <input type="text" id="npm_mahasiswa" name="npm_mahasiswa">
                                <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan">
                                <input type="date" id="week" name="week">
                                <input type="text" class="form-control mt-3" id="activity" name="activity" width="198px">
                                <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Data</button>
                            </form> -->
                            <!-- Trigger/Open The Modal -->
                            <!-- <button id="myBtn">Tambahkan Data</button> -->
                            <button type="submit" id="myBtn" class="btn btn-primary mb-3 mt-3 ml-3">Tambahkan Data</button>

                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content" style="width: 45%;">
                                    <div class="modal-header">
                                        <h2 style="font-size: 25px;">Isi Form Laporan Mingguan</h2>
                                        <span class="close">&times;</span>
                                    </div>
                                    <div class="modal-body" style="width:-moz-available;">
                                        <form action="/report/save" method="POST" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="row justify-content-center mb-3">
                                                <label for="npm_mahasiswa" class="col-sm-2 col-form-label">NPM Mahasiswa</label>
                                                <input type="text" id="npm_mahasiswa" name="npm_mahasiswa" autofocus placeholder="<?= $session->get('id_nik'); ?>" style="width:200px;" disabled>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="email" class="col-sm-2 col-form-label">Bentuk Kegiatan</label>
                                                <!-- <input type="text" id="bentuk_kegiatan" name="bentuk_kegiatan" placeholder="Bentuk Kegiatan" style="width:200px;"> -->
                                                <select class="form-select col-xs-2 mt-3 mb-3" style="width:auto;" name="bentuk_kegiatan" id="bentuk_kegiatan" required="" autofocus value="<?= old('bentuk_kegiatan'); ?>">
                                                    <option selected disabled hidden>Pilih</option>
                                                    <option value="Magang Bersertifikat">Magang Bersertifikat</option>
                                                    <option value="Studi Independen">Studi Independen</option>
                                                    <option value="Kampus Mengajar">Kampus Mengajar</option>
                                                </select>
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="email" class="col-sm-2 col-form-label">Tanggal</label>
                                                <input type="datetime-local" class="datetimepicker" id="week" name="week" style="width:200px;" min="2022-07-17T21:00" placeholder="HH/BB/TTTT">
                                            </div>
                                            <div class="row justify-content-center mb-3">
                                                <label for="activity" class="col-sm-2 col-form-label">Laporan Bulanan</label>
                                                <div class="col-auto">
                                                    <input class="form-control <?= ($validation->hasError('activity')) ? 'is-invalid' : ''; ?>" type="file" id="activity" name="activity" accept="application/pdf" style="opacity: 100;">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">
                                                        <?= $validation->getError('activity'); ?>
                                                    </div>
                                                    Maksimal 3 MB
                                                </div>
                                            </div>

                                            <span class='bi bi-calendar-date'></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary mb-3 mt-3">Tambahkan Data</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                    <?php }
                    endif; ?>
                </div>
            </div>
        </div>
        <h3 class="mt-1"> Laporan Bulanan Mahasiswa</h3>
        <div class="row justify-content-center">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NPM Mahasiswa</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Week</th>
                        <th scope="col">Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups('dosen-ti')) : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != "" AND npm_mahasiswa LIKE "140%"';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;

                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups('dosen-pdsi')) : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != "" AND npm_mahasiswa LIKE "150%"';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;

                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups('dosen-psi')) : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != "" AND npm_mahasiswa LIKE "160%"';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;

                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups('dosen-eko')) : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != "" AND npm_mahasiswa LIKE "120%"';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;

                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups('dosen-akt')) : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != "" AND npm_mahasiswa LIKE "121%"';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;

                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups('dosen-hukum')) : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != "" AND npm_mahasiswa LIKE "130%"';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;
                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php $con = mysqli_connect('localhost', 'root', '', 'skripsi'); ?>
                    <?php if (in_groups('warek', 'warek-admin')) : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != ""';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;

                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php if (session()->get('role') == 'Dosen') : { ?>
                            <?php
                            $sql = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != ""';
                            $result = mysqli_query($con, $sql);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $angka++;

                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td> <a href="<?= site_url('laporan/' . $row['activity']); ?>"><?= $row['activity']; ?></a>
                                    </td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                    <?php
                    // if (session()->get('role') == 'Mahasiswa') : {
                    $sql = 'SELECT * FROM report WHERE npm_mahasiswa LIKE "1402018105"';
                    $result = mysqli_query($con, $sql);
                    ?>
                    <?php
                    $npm = session()->get('id_nik');
                    // print_r($npm);
                    // die;
                    if (session()->get('id_nik')) : {
                            // echo "hahahaha";
                    ?>
                            <?php // $npm = session()->get('id_nik');
                            $sqll = 'SELECT * FROM report WHERE activity IS NOT NULL AND activity != "" AND npm_mahasiswa LIKE ' . $npm;
                            // print_r($sqll);
                            // die;
                            $resultt = mysqli_query($con, $sqll);
                            $angka = 0;
                            while ($row = mysqli_fetch_array($resultt)) {
                                $angka++;
                            ?>
                                <tr>
                                    <td><?= $angka; ?></td>
                                    <td><?php echo $row['npm_mahasiswa']; ?></td>
                                    <td><?php echo $row['bentuk_kegiatan']; ?></td>
                                    <td><?php echo $row['week']; ?></td>
                                    <td><?php echo $row['activity']; ?></td>
                                </tr>
                    <?php }
                        }
                    endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    // $(document).ready(function() {
    //     var d = new Date().toISOString();
    //     d = moment.tz(d, "Asia/Jakarta").format();
    //     var minDate = d.substring(0, 11) + "";
    //     console.log(minDate);

    //     // $(".datetimepicker").attr({
    //     //     "value": minDate,
    //     //     "min": minDate,
    //     // });
    // });
</script>
<script>
</script>
<?= $this->endSection(); ?>