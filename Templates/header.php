<?php
$email = $_SESSION['email'];
$cek = query("SELECT * FROM user WHERE email = '$email'")[0];
$id_user_yang_sudah_login = $cek['iduser'];

$calon_siswa = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$id_user_yang_sudah_login'")[0];
?>
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h6 class="h2 text-white d-inline-block mb-0">PPDB ONLINE</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item">
                        <a href="#">
                            <?php if ($title === "data_nilai_siswa") : ?>
                                <?php echo 'DATA NILAI SISWA'; ?>
                            <?php endif; ?>
                            <?php if ($title === "Dashboard") : ?>
                                <?php echo 'DASHBOARD'; ?>
                            <?php endif; ?>
                            <?php if ($title === "data_wali") : ?>
                                <?php echo 'DATA WALI SISWA'; ?>
                            <?php endif; ?>
                            <?php if ($title === "data_calon_siswa") : ?>
                                <?php echo 'DATA CALON SISWA'; ?>
                            <?php endif; ?>
                            <?php if ($title === "pengumuman") : ?>
                                <?php echo 'PENGUMUMAN'; ?>
                            <?php endif; ?>
                            <?php if ($title === "upload_berkas") : ?>
                                <?php echo 'UPLOAD BERKAS'; ?>
                            <?php endif; ?>
                        </a>
                    </li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Home</li> -->
                </ol>
            </nav>
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="ni ni-zoom-split-in"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold mr-2"><?= $cek['fullname'] ?></span>
                            </div>
                            <span class="avatar avatar-md rounded-circle" style="width: 40px; height: 40px;">
                                <img alt="Image placeholder" src="img/<?= $calon_siswa['pas_foto']; ?>">
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>