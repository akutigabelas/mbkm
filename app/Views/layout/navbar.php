<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar_top">
    <?php if (session()->get('role') == 'Dosen') : { ?>
            <?= $this->include('layout/sidebar.php'); ?>
    <?php }
    endif; ?>
    <img src="/gambar/yarsi.png" alt="logo" width="150" height="55">
    <img src="/gambar/kampus.png" alt="logo" width="130" height="60">
    <!-- <a class="navbar-brand" href="#">MBKM</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/pages">Home</a>
            </li>

            <?php if (in_groups('warek', 'warek-admin')) : { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Detail</a>
                        <ul class="dropdown-menu">
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="Komitmen">Studi Independen</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komitmen">Studi Independen</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="mengajar">Kampus Mengajar</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/mengajar">Kampus Mengajar</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/monitoring">Monitoring Progress</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" style="color: #808080;" href="/report" title="Melihat Progress Pengajuan">Report</a>
                </li> -->
            <?php }
            endif; ?>

            <?php if (session()->get('role') == 'Dosen') : { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Detail</a>
                        <ul class="dropdown-menu">
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="Komitmen">Studi Independen</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komitmen">Studi Independen</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="mengajar">Kampus Mengajar</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/mengajar">Kampus Mengajar</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/monitoring">Monitoring Progress</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" style="color: #808080;" href="/report" title="Melihat Progress Pengajuan">Report</a>
                </li> -->
            <?php }
            endif; ?>
            <?php if (in_groups(['dosen-ti', 'dosen-hukum', 'dosen-akt', 'dosen-pdsi', 'dosen-psi', 'dosen-eko'])) : { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Detail</a>
                        <ul class="dropdown-menu">
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="Komitmen">Studi Independen</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komitmen">Studi Independen</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('detail')) : ?>
                                <li><a class="dropdown-item" href="mengajar">Kampus Mengajar</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/mengajar">Kampus Mengajar</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/pages/monitoring">Monitoring Progress</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" style="color: #808080;" href="/report" title="Melihat Progress Pengajuan">Report</a>
                </li> -->
            <?php }
            endif; ?>
            <!-- <li class="nav-item">
                    <a class="nav-link" href="/monitoring">Monitoring</a>
                </li> -->
            <?php if (session()->get('role') == 'Mahasiswa') : { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Kegiatan</a>
                        <ul class="dropdown-menu">
                            <?php if (in_groups('mhs')) : ?>
                                <li><a class="dropdown-item" href="/Komik/index">Magang Bersertifikat</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('mhs')) : ?>
                                <li><a class="dropdown-item" href="/Komitmen/index">Studi Independen</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/Komitmen">Studi Independen</a></li>
                            <?php endif; ?>
                            <?php if (in_groups('mhs')) : ?>
                                <li><a class="dropdown-item" href="mengajar">Kampus Mengajar</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="/mengajar">Kampus Mengajar</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php   }  ?>
            <?php endif; ?>
            <?php if (in_groups('mhs-stupen')) : ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Kegiatan</a>
                    <ul class="dropdown-menu">
                        <?php if (in_groups('mhs')) : ?>
                            <li><a class="dropdown-item" href="/Komik/index">Magang Bersertifikat</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                        <?php endif; ?>
                        <?php if (in_groups('mhs')) : ?>
                            <li><a class="dropdown-item" href="/Komitmen/index">Studi Independen</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="/Komitmen">Studi Independen</a></li>
                        <?php endif; ?>
                        <?php if (in_groups('mhs')) : ?>
                            <li><a class="dropdown-item" href="mengajar">Kampus Mengajar</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="/mengajar">Kampus Mengajar</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (in_groups('mhs-magang')) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Kegiatan</a>
                    <ul class="dropdown-menu">
                        <?php if (in_groups('mhs')) : ?>
                            <li><a class="dropdown-item" href="/Komik/index">Magang Bersertifikat</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="/Komik">Magang Bersertifikat</a></li>
                        <?php endif; ?>
                        <?php if (in_groups('mhs')) : ?>
                            <li><a class="dropdown-item" href="/Komitmen/index">Studi Independen</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="/Komitmen">Studi Independen</a></li>
                        <?php endif; ?>
                        <?php if (in_groups('mhs')) : ?>
                            <li><a class="dropdown-item" href="mengajar">Kampus Mengajar</a></li>
                        <?php else : ?>
                            <li><a class="dropdown-item" href="/mengajar">Kampus Mengajar</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (session()->get('role') == 'Mahasiswa') : { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/report">Report</a>
                    </li>
            <?php }
            endif; ?>
            <?php if (session()->get('role') != 'Mahasiswa') : { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/report">Report</a>
                    </li>
            <?php }
            endif; ?>
            <?php if (in_groups('warek')) : { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/profil/index">Profil</a>
                    </li>
            <?php }
            endif; ?>
        </ul>
    </div>
    <!-- <li class="nav-item"> -->
    <?php if (session()->get('logged_in')) : ?>
        <a class="nav-link active" href="/login/getLogout">Logout</a>
    <?php else : ?>
        <a class="nav-link active" href="/login">Login</a>
    <?php endif; ?>
    <!-- </li> -->
    </ul>
    </div>
    </div>
</nav>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.getElementById('navbar_top').classList.add('fixed-top');
                // add padding top to show content behind navbar
                navbar_height = document.querySelector('.navbar').offsetHeight;
                document.body.style.paddingTop = navbar_height + 'px';
            } else {
                document.getElementById('navbar_top').classList.remove('fixed-top');
                // remove padding top from body
                document.body.style.paddingTop = '0';
            }
        });
    });
</script>