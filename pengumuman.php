<?php
require 'functions.php';

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

$data_yang_sudah_diisi = query("SELECT * FROM user WHERE email = '$email'");
$id_user_yang_sudah_login = $data_yang_sudah_diisi[0]['iduser'];

$nopendaftar = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$id_user_yang_sudah_login'")[0];

$nopendaftar_primary = $nopendaftar['no_pendaftaran'];
$data_nilai = query("SELECT * FROM nilai WHERE id_nilai = '$nopendaftar_primary'")[0];

$email = $_SESSION['email'];
$cek = query("SELECT * FROM user WHERE email = '$email'")[0];

$data_siswa = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$id_user_yang_sudah_login'")[0];
$jurusan_terpilih = $data_siswa['jurusan_terpilih'];


if (isset($_POST['submit'])) {
    if (data_nilai($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dikirim, Silahkan Mengakses Halaman input data Wali');                
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dikirim, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
if (isset($_POST['edit'])) {
    if (edit_data_nilai($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Diubah');   
                document.location.href = 'data-nilai-siswa.php';             
            </script>
            ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dikirim, Periksa Data Anda Kembali!!!');                
            </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Siswa</title>
    <?php include 'Templates/link_head.php'; ?>
</head>

<body>
    <!-- sidenav -->
    <?php $title = 'pengumuman';
    include 'Templates/sidenav.php'; ?>
    <!-- end sidenav -->

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $title = 'pengumuman';
        include 'Templates/header.php' ?>
        <!-- Header -->
        <!-- Header content -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">

                </div>
            </div>
        </div>
        <!-- Page content -->
        <br>
        <div class="container mt--6 mt-5">
            <div class="container-fluid mt--6 mb-5">
                <div class="row">
                    <div class="col-xl-12 order-xl-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Pengumuman</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="row p-0">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <form method="POST" action="">
                                                <h6 class="heading-small text-muted mb-4">Pengumuman</h6>
                                                <div class="card" style="width: 30rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Info Status</h5>
                                                        <p class="card-text">Hai <?= $cek['fullname']; ?>!!!</p>
                                                        <p class="card-text">Status Pendaftaran Kamu Saat Ini <?= $nopendaftar['status']; ?>
                                                            <?php if ($nopendaftar['status'] == "LOLOS") {
                                                                echo "Silahkan Daftar Ulang Sekarang";
                                                            }
                                                            if ($nopendaftar['status'] == "Belum Di Validasi") {
                                                                echo "Harap Tunggu Admin Mengecek Data Kamu";
                                                            } ?>
                                                        </p>
                                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#daftar_ulang" type="button">Daftar Ulang Now</a>
                                                        <!-- Modal Daftar Ulang -->
                                                        <div class="modal fade" id="daftar_ulang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Panduan Daftar Ulang</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Datang Ke SMKN 1 GENDING dengan membawa :
                                                                        <ol>
                                                                            <li>Pas Foto 4 x 6</li>
                                                                            <li>Surat Keterangan Lulus dari sekolah asal</li>
                                                                        </ol>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <form method="POST" action="">
                                                <h6 class="heading-small text-muted mb-4"></h6>
                                                <div class="card" style="width: 27rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Info jurusan</h5>
                                                        <p class="card-text">Hai <?= $cek['fullname']; ?>!!!</p>
                                                        <?php
                                                        if ($data_siswa['jurusan_terpilih'] == 'Belum Ditentukan') {
                                                            echo "Data Kamu Masih Dalam Pengecekan oleh Panitia. Cek Terus Website ini Untuk Mendapatkan Info Selanjutnya!!!";
                                                        } else {
                                                            echo "<p>Selamat Kamu Terpilih Di jurusan $jurusan_terpilih</p>";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-0 mt-0">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <form method="POST" action="">
                                                <div class="card" style="width: 30rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Info Kelas</h5>
                                                        <p class="card-text">Hai <?= $cek['fullname']; ?>!!!</p>
                                                        <p class="card-text">Untuk Informasi Kelas Silahkan Datang Ke SMKN 1 GENDING pada tanggal 20 juli 2022 jam 08.00 - 10.00</p>
                                                        <a href="https://goo.gl/maps/ZJBRfCiFuNA8YdCc9" target="_blank" class="btn btn-primary">Maps SMKN 1 GENDING</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <form method="POST" action="">
                                                <div class="card" style="width: 25rem;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Pengajuan Pencabutan</h5>
                                                        <p class="card-text">Hai <?= $cek['fullname']; ?>!!!</p>
                                                        <p class="card-text">Untuk pengajuan pencabutan Silahkan Datang Ke SMKN 1 GENDING pada tanggal 20 juli 2022 jam 08.00 - 10.00 dengan membawa formulir yang diberikan admin</p>
                                                        <p style="color: red; font-style: italic; font-size: 14px;">*Cetak Formulir menggunakan kertas ukuran A4 80gsm</p>
                                                        <a href="https://goo.gl/maps/ZJBRfCiFuNA8YdCc9" target="_blank" class="btn btn-primary btn-sm">Petunjuk Arah</a>
                                                        <a href="formulir_pencabutan.php" target="_blank" class="btn btn-primary btn-sm">Cetak Formulir Pencabutan</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include 'Templates/footer.php'; ?>
        </div>
    </div>


    <!-- argon script -->
    <?php include 'Templates/argon_script.php'; ?>
</body>

</html>