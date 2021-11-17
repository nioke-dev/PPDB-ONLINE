<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="assets/img/logo/logo ppdb online.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= ($title === "Dashboard") ? 'active' : '' ?>" href="user-page.php">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title === "data_calon_siswa") ? 'active' : '' ?>" href="data-calon-siswa.php">
                            <i class="fas fa-user-graduate text-dark"></i>
                            <span class="nav-link-text">Input Data Calon Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title === "data_nilai_siswa") ? 'active' : '' ?>" href="data-nilai-siswa.php">
                            <i class="far fa-address-card text-dark"></i>
                            <span class="nav-link-text">Input Data Nilai Siswa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title === "data_wali") ? 'active' : '' ?>" href="data-wali-siswa.php">
                            <img src="https://img.icons8.com/ios-filled/50/000000/family--v1.png" width="24px" />
                            <span class="nav-link-text ml-2">Input Data Wali</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($title === "pengumuman") ? 'active' : '' ?>" href="pengumuman.php">
                            <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/64/000000/external-announcement-news-kiranshastry-solid-kiranshastry.png" / width="24px">
                            <span class="nav-link-text ml-2">Pengumuman</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Functions</span>
                </h6>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModal" type="button">
                            <i class="fas fa-sign-out-alt text-dark"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="logout.php">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#about" type="button">
                            <img src="https://img.icons8.com/ios-glyphs/30/000000/about.png" / width="21px">
                            <span class="nav-link-text ml-2">About</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="modal" data-target="#help" type="button">
                            <i class="fas fa-exclamation-circle text-dark"></i>
                            <span class="nav-link-text">Help</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Modal about -->
    <div class="modal fade" id="about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Aplikasi ini Dibuat Oleh Tim Creative :
                    <ol>
                        <li>Muhammad Nurul Mustofa (Ketua Tim & Developer)</li>
                        <li>Muhammad Roihan (Designing)</li>
                        <li>Muhammad husain (Designing)</li>
                        <li>Nurhafifah (Data Research)</li>
                        <li>Yanti Junianti Dewi (Data Research)</li>
                        <li>Okta Nur Hidayani Subhan (Data Research)</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Help -->
    <div class="modal fade" id="help" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Di Aplikasi PPDB ONLINE ini kami sangat menjunjung tinggi komunikasi dua arah! Tujuan tim Costumer Support kami adalah membuat anda nyaman!! karena itulah, tim Support kami bekerja 24 jam agar anda tidak menemui kendala apapun saat menjalankan website!!</p>
                    Hubungi Kami Di :
                    <ul>
                        <li>Whatsapp : 085161644408</li>
                        <li>Email : nioke8090@gmail.com</li>
                        <li>Instagram : @nioke.id</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</nav>