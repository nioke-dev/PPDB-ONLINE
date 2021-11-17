<?php
session_start();
require 'functions.php';
$no_pendaftaran = $_GET['no_pendaftaran'];
$calon_siswa = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$no_pendaftaran'")[0];
$data_nilai = query("SELECT * FROM nilai WHERE id_nilai = '$no_pendaftaran'")[0];
$data_wali = query("SELECT * FROM wali WHERE id_wali = '$no_pendaftaran'")[0];

if (isset($_POST['edit'])) {
    if (edit_calon_siswa($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
if (isset($_POST['validasi'])) {
    if (validasi_siswa($_POST) > 0) {
        echo "
            <script>
                alert('Siswa Berhasil Di validasi');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
if (isset($_POST['validate'])) {
    if (validasi_siswa($_POST) > 0) {
        echo "
            <script>
                alert('Siswa Berhasil Di validasi');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Diubah, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
if (isset($_POST['tentukan_jurusan'])) {
    if (jurusan_terpilih($_POST) > 0) {
        echo "
            <script>
                alert('Jurusan Siswa Berhasil Ditentukan');  
                window.location.href='dashboard_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Menentukan Jurusan, Hubungi Developer Segera!!!');                
            </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Page - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'Templates/sidenav.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'Templates/topbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Detail Pendaftar</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->

                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $calon_siswa['pas_foto']; ?>" name="pas-foto-lama">
                                <input type="hidden" name="no_pendaftaan" value="<?= $calon_siswa['no_pendaftaran']; ?>">
                                <h6 class="heading-small text-muted mb-4">Student information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nama-calon-siswa">No. Pendaftaran</label>
                                                <input type="text" id="input-nama-calon-siswa" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['no_pendaftaran']; ?>" name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="no_pendaftaran" value="<?= $calon_siswa['no_pendaftaran']; ?>">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nama-calon-siswa">Nama Calon Siswa</label>
                                                <input type="text" id="input-nama-calon-siswa" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['nama_calon_siswa']; ?>" name="nama-calon-siswa" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-tempat-lahir">Tempat Lahir</label>
                                                <input type="text" id="input-tempat-lahir" class="form-control" placeholder="Type Here" name="tempat-lahir" value="<?= $calon_siswa['tempat_lahir']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-jenis-kelamin">Jenis Kelamin</label>
                                                <select class="form-control" id="input-jenis-kelamin" name="jenis-kelamin" readonly>
                                                    <option value="<?= $calon_siswa['jenis_kelamin']; ?>"><?= $calon_siswa['jenis_kelamin']; ?></option>
                                                    <option value="laki-laki">laki-laki</option>
                                                    <option value="perempuan">perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-tanggal-lahir">Tanggal Lahir</label>
                                                <input type="date" id="input-tanggal-lahir" class="form-control" name="tanggal-lahir" value="<?= $calon_siswa['tgl_lahir']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-agama">Agama</label>
                                                <select class="form-control" id="input-agama" name="agama" readonly>
                                                    <option value="<?= $calon_siswa['agama']; ?>"><?= $calon_siswa['agama']; ?></option>
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
                                                    <option value="konghucu">Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="input-anak-ke" class="form-control-label">Anak Ke</label>
                                                <select class="form-control" id="input-anak-ke" name="anak-ke" readonly>
                                                    <option value="<?= $calon_siswa['anak_ke']; ?>"><?= $calon_siswa['anak_ke']; ?></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="lebih dari 10">Lebih Dari 10</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="input-anak-ke" class="form-control-label">Pilih Jurusan Pertama</label>
                                                <select class="form-control" id="input-anak-ke" name="jurusan-satu" readonly>
                                                    <option value="<?= $calon_siswa['jurusan_satu']; ?>"><?= $calon_siswa['jurusan_satu']; ?></option>
                                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                    <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                                    <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
                                                    <option value="Teknik Mesin Industri">Teknik Mesin Industri</option>
                                                    <option value="Tata Busana">Tata Busana</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="input-anak-ke" class="form-control-label">Pilih Jurusan Kedua</label>
                                                <select class="form-control" id="input-anak-ke" name="jurusan-dua" readonly>
                                                    <option value="<?= $calon_siswa['jurusan_dua']; ?>"><?= $calon_siswa['jurusan_dua']; ?></option>
                                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                                    <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                                                    <option value="Teknik Instalasi Tenaga Listrik">Teknik Instalasi Tenaga Listrik</option>
                                                    <option value="Teknik Mesin Industri">Teknik Mesin Industri</option>
                                                    <option value="Tata Busana">Tata Busana</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="pas-foto-4-kali-6">Pas Foto 4 x 6</label>
                                                <br>
                                                <img src="../img/<?= $calon_siswa['pas_foto']; ?>" alt="gambar" width="100px" height="150px">
                                                <input type="file" id="pas-foto-4-kali-6" class="form-control" name="pas-foto" value="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-alamat-calon-siswa">Alamat Calon Siswa</label>
                                                <input id="input-alamat-calon-siswa" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['alamat_calon_siswa']; ?>" type="text" name="alamat-calon-siswa" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-alamat-sekolah-asal">Alamat Sekolah Asal</label>
                                                <input id="input-alamat-sekolah-asal" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['alamat_sekolah_asal']; ?>" type="text" name="alamat-sekolah-asal" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="no-telp">No Telp Calon Siswa</label>
                                                <input type="text" id="no-telp" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['tlp_calon_siswa']; ?>" name="no-telp-calon-siswa" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-nama-sekolah-asal">Nama Sekolah Asal</label>
                                                <input type="text" id="input-nama-sekolah-asal" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['nama_sekolah_asal']; ?>" name="nama-sekolah-asal" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="tahun-lulus">Tahun Lulus</label>
                                                <input type="text" id="tahun-lulus" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['tahun_lulus']; ?>" name="tahun-lulus" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Tahun Periode</label>
                                                <input type="text" id="input-city" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['tahun_periode']; ?>" name="tahun-periode" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-4">Data Nilai Siswa</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nilai_matematika">Nilai Matematika</label>
                                                <input type="text" id="nilai_matematika" class="form-control" placeholder="Type Here" value="<?= $data_nilai['matematika']; ?>" name="nilai_mtk" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nilai_bahasa_indonesia">Nilai Bahasa Indonesia</label>
                                                <input type="text" id="nilai_bahasa_indonesia" class="form-control" placeholder="Type Here" value="<?= $data_nilai['bhs_indo']; ?>" name="nilai_bindo" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nilai_ipa">Nilai Ilmu Pengetahuan Alam</label>
                                                <input type="text" id="nilai_ipa" class="form-control" placeholder="Type Here" value="<?= $data_nilai['ipa']; ?>" name="nilai_ipa" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nilai_bahasa_inggris">Nilai Bahasa Inggris</label>
                                                <input type="text" id="nilai_bahasa_inggris" class="form-control" placeholder="Type Here" value="<?= $data_nilai['bhs_ing']; ?>" name="nilai_bing" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-4">Data Wali Siswa</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nama-ayah">Nama Ayah</label>
                                                <input type="text" id="nama-ayah" class="form-control" placeholder="Type Here" value="<?= $data_wali['nama_ayah']; ?>" name="nama_ayah" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nama-ibu">Nama Ibu</label>
                                                <input type="text" id="nama-ibu" class="form-control" placeholder="Type Here" value="<?= $data_wali['nama_ibu']; ?>" name="nama_ibu" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="alamat_ortu">Alamat Ortu</label>
                                                <input type="text" id="alamat_ortu" class="form-control" placeholder="Type Here" value="<?= $data_wali['alamat_ortu']; ?>" name="alamat_ortu" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="telp-ortu">No Telp. Orang Tua</label>
                                                <input type="text" id="telp-ortu" class="form-control" placeholder="Type Here" value="<?= $data_wali['telp_ortu']; ?>" name="telp_ortu" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="pekejaan-ayah">Pekerjaan Ayah</label>
                                                <input type="text" id="pekejaan-ayah" class="form-control" placeholder="Type Here" name="pekerjaan_ayah" value="<?= $data_wali['pekerjaan_ayah']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="pekerjaan-ibu">Pekerjaan Ibu</label>
                                                <input type="text" id="pekerjaan-ibu" class="form-control" placeholder="Type Here" name="pekerjaan_ibu" value="<?= $data_wali['pekerjaan_ibu']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <!-- <button type="submit" name="submit" class="btn btn-sm btn-primary mr-1">Kirim</button> -->
                                            <!-- <button type="submit" name="edit" class="btn btn-sm btn-success mr-1">Ubah Data</button> -->
                                            <a href="detail_cetak.php?no_pendaftaran=<?= $calon_siswa['no_pendaftaran']; ?>" class="btn btn-info btn-sm mr-1" target="_blank">Cetak Data</a>
                                            <button type="button" name="validasii" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_validate">validasi Now</button>
                                            <button type="button" name="tentukan_jurusan" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_tentukan_jurusan">Tentukan Jurusan</button>
                                            <a href="dashboard_admin.php" class="btn btn-primary btn-sm">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Modal validate -->
    <div class="modal fade" id="modal_validate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Validasi Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="detail_pendaftar.php?no_pendaftaran=<?= $no_pendaftaran; ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="no_pendaftaran" value="<?= $no_pendaftaran; ?>">
                            <label for="beri_penilaian">Beri Penilaian</label>
                            <select class="form-control" id="beri_penilaian" name="validate_now">
                                <option value="<?= $calon_siswa['status']; ?>"><?= $calon_siswa['status']; ?></option>
                                <option value="LOLOS">LOLOS</option>
                                <option value="TIDAK DITERIMA">TIDAK DITERIMA</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="validate" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal tentukan jurusan -->
    <div class="modal fade" id="modal_tentukan_jurusan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tentukan Jurusan Now!!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="detail_pendaftar.php?no_pendaftaran=<?= $no_pendaftaran; ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="no_pendaftaran" value="<?= $no_pendaftaran; ?>">
                            <label for="beri_penilaian">Tentukan Jurusan</label>
                            <select class="form-control" id="beri_penilaian" name="jurusan_terpilih">
                                <option value="<?= $calon_siswa['jurusan_terpilih']; ?>"><?= $calon_siswa['jurusan_terpilih']; ?></option>
                                <option value="<?= $calon_siswa['jurusan_satu']; ?>"><?= $calon_siswa['jurusan_satu']; ?></option>
                                <option value="<?= $calon_siswa['jurusan_dua']; ?>"><?= $calon_siswa['jurusan_dua']; ?></option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="tentukan_jurusan" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>