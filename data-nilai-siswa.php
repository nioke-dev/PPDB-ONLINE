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
    <?php $title = 'data_nilai_siswa';
    include 'Templates/sidenav.php'; ?>
    <!-- end sidenav -->

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $title = 'data_nilai_siswa';
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
                                        <h3 class="mb-0">Data Nilai Siswa</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <h6 class="heading-small text-muted mb-4">Input Data Nilai UNBK Siswa</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nilai_matematika">No Pendaftar</label>
                                                    <input type="text" id="nilai_matematika" class="form-control" placeholder="Type Here" value="<?= $nopendaftar['no_pendaftaran']; ?>" name="no_pendaftar" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nilai_matematika">Nilai Matematika</label>
                                                    <input type="text" id="nilai_matematika" class="form-control" placeholder="Type Here" value="<?= $data_nilai['matematika']; ?>" name="nilai_mtk">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nilai_bahasa_indonesia">Nilai Bahasa Indonesia</label>
                                                    <input type="text" id="nilai_bahasa_indonesia" class="form-control" placeholder="Type Here" value="<?= $data_nilai['bhs_indo']; ?>" name="nilai_bindo">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nilai_ipa">Nilai Ilmu Pengetahuan Alam</label>
                                                    <input type="text" id="nilai_ipa" class="form-control" placeholder="Type Here" value="<?= $data_nilai['ipa']; ?>" name="nilai_ipa">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nilai_bahasa_inggris">Nilai Bahasa Inggris</label>
                                                    <input type="text" id="nilai_bahasa_inggris" class="form-control" placeholder="Type Here" value="<?= $data_nilai['bhs_ing']; ?>" name="nilai_bing">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-left">
                                                <button type="submit" name="submit" class="btn btn-sm btn-primary">Kirim</button>
                                                <button type="submit" name="edit" class="btn btn-sm btn-danger">Rubah Nilai</button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
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