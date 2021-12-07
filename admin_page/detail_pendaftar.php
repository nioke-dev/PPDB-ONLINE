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
    if ($_POST['validate_now'] == "TIDAK DITERIMA") {
        newjurusanset($_POST);
    }
    if ($_POST['validate_now'] == "LOLOS") {
        newjurusansetlolos($_POST);
    }
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
                            <a href="dashboard_admin.php">
                                <i class="fas fa-sign-out-alt" style="text-decoration: none; float: right; cursor: pointer; font-size: 19px;" data-toggle="tooltip" title="Kembali"></i>
                            </a>
                            <h6 class="m-0 font-weight-bold text-primary">Data Pendaftar</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $calon_siswa['pas_foto']; ?>" name="pas-foto-lama">
                                <input type="hidden" name="no_pendaftaan" value="<?= $calon_siswa['no_pendaftaran']; ?>">
                                <h6 class="heading-small text-muted mb-4">Student information</h6>
                                <div class="pl-lg-4">
                                    <table>
                                        <img src="../img/<?= $calon_siswa['pas_foto']; ?>" style="float: right; width: 150px;" alt="">
                                        <tr>
                                            <td>Nomor Pendaftaran</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td><?= $calon_siswa['no_pendaftaran']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Siswa</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['nama_calon_siswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['tempat_lahir']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['jenis_kelamin']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['tgl_lahir']; ?>&nbsp;(yyyy-mm-dd)</td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['agama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Anak Ke</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['anak_ke']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pilihan Jurusan Pertama</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['jurusan_satu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pilihan Jurusan Kedua</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['jurusan_dua']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <hr class="my-4" />
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <table>
                                        <tr>
                                            <td>Alamat Calon Siswa</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td><?= $calon_siswa['alamat_calon_siswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Sekolah Asal</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['alamat_sekolah_asal']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No Telp Calon Siswa</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['tlp_calon_siswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Sekolah Asal</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['nama_sekolah_asal']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>tahun Lulu</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['tahun_lulus']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>tahun Periode</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $calon_siswa['tahun_periode']; ?></td>
                                        </tr>

                                    </table>
                                </div>
                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-4">Data Nilai Siswa</h6>
                                <div class="pl-lg-4">
                                    <table>
                                        <tr>
                                            <td>Nilai Matematika</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td><?= $data_nilai['matematika']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nilai Bahasa Indonesia</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_nilai['bhs_indo']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nilai Ilmu Pengetahuan Alam</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_nilai['ipa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nilai Bahasa Inggris</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_nilai['bhs_ing']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-4">Data Wali Siswa</h6>
                                <div class="pl-lg-4">
                                    <table>
                                        <tr>
                                            <td>Nama Ayah</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td>:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                            <td><?= $data_wali['nama_ayah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ibu</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_wali['nama_ibu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Orang Tua</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_wali['alamat_ortu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Telepon Orang Tua</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_wali['telp_ortu']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ayah</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_wali['pekerjaan_ayah']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ibu</td>
                                            <td></td>
                                            <td>:</td>
                                            <td><?= $data_wali['pekerjaan_ibu']; ?></td>
                                        </tr>
                                    </table>
                                    <hr class="my-4" />
                                    <h6 class="heading-small text-muted mb-4">Data Status</h6>
                                    <div class="pl-lg-4">
                                        <table>
                                            <tr>
                                                <td>Status Diterima</td>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td>:&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                <td><?= $calon_siswa['status']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Jurusan</td>
                                                <td></td>
                                                <td>:</td>
                                                <td><?= $calon_siswa['jurusan_terpilih']; ?></td>
                                            </tr>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6 text-left">
                                                <br>
                                                <a href="detail_cetak.php?no_pendaftaran=<?= $calon_siswa['no_pendaftaran']; ?>" class="btn btn-info btn-sm mr-1" target="_blank">Cetak Data</a>
                                                <button type="button" name="validasii" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal_validate">validasi Now</button>
                                                <button type="button" name="tentukan_jurusan" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_tentukan_jurusan">Tentukan Jurusan</button>
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
                            <p>Berdasarkan Data Data yang siswa inputkan apakah siswa tersebut layak untuk menempati tempat duduk di SMKN 1 GENDING beri penilaian sekarang juga!!!</p>
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
                    <p>Tentukan jurusan siswa sesuai dengan kemampuan siswa pada nilai yang tertera.</p>
                    <p style="color: red; font-style: italic;">Ingat!!! jika status siswa <b>TIDAK DITERIMA</b> maka jangan isi formulir ini karena sudah terisi otomatis oleh sistem</p>
                    <form action="detail_pendaftar.php?no_pendaftaran=<?= $no_pendaftaran; ?>" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="no_pendaftaran" value="<?= $no_pendaftaran; ?>">
                            <label for="beri_penilaian">Tentukan Jurusan</label>
                            <select class="form-control" id="beri_penilaian" name="jurusan_terpilih" <?php if ($calon_siswa['status'] == 'TIDAK DITERIMA') {
                                                                                                            echo "disabled";
                                                                                                        } else {
                                                                                                            echo "";
                                                                                                        } ?>>
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