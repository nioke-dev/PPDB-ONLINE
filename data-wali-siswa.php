<?php
require 'functions.php';

session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

$data_yang_sudah_diisi = query("SELECT * FROM user WHERE email = '$email'");
$id_user_yang_sudah_login = $data_yang_sudah_diisi[0]['iduser'];

$nopendaftar = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$id_user_yang_sudah_login'")[0];
$id_no_pendaftar = $nopendaftar['no_pendaftaran'];
$data_wali = query("SELECT * FROM wali WHERE id_wali = '$id_no_pendaftar'")[0];


if (isset($_POST['submit'])) {
    if (data_wali($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dikirim, Pantau Terus Website ini dan Tunggu Pengumumannya');                
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
    if (edit_data_wali($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dikirim');                
                document.location.href = 'data-wali-siswa.php';              
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
    <title>Data Calon Siswa</title>
    <?php include 'Templates/link_head.php'; ?>
</head>

<body>
    <!-- sidenav -->
    <?php $title = 'data_wali';
    include 'Templates/sidenav.php'; ?>
    <!-- end sidenav -->

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $title = 'data_wali';
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
                                        <h3 class="mb-0">Data Wali Siswa</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <h6 class="heading-small text-muted mb-4">student guardian information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nilai_matematika">No Pendaftar</label>
                                                    <input type="text" id="nilai_matematika" class="form-control" placeholder="Type Here" value="<?= $nopendaftar['no_pendaftaran']; ?>" name="no_pendaftar" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nama-ayah">Nama Ayah</label>
                                                    <input type="text" id="nama-ayah" class="form-control" placeholder="Type Here" value="<?= $data_wali['nama_ayah']; ?>" name="nama_ayah">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nama-ibu">Nama Ibu</label>
                                                    <input type="text" id="nama-ibu" class="form-control" placeholder="Type Here" value="<?= $data_wali['nama_ibu']; ?>" name="nama_ibu">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="alamat_ortu">Alamat Ortu</label>
                                                    <input type="text" id="alamat_ortu" class="form-control" placeholder="Type Here" value="<?= $data_wali['alamat_ortu']; ?>" name="alamat_ortu">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="telp-ortu">No Telp. Orang Tua</label>
                                                    <input type="text" id="telp-ortu" class="form-control" placeholder="Type Here" value="<?= $data_wali['telp_ortu']; ?>" name="telp_ortu">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="pekejaan-ayah">Pekerjaan Ayah</label>
                                                    <input type="text" id="pekejaan-ayah" class="form-control" placeholder="Type Here" name="pekerjaan_ayah" value="<?= $data_wali['pekerjaan_ayah']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="pekerjaan-ibu">Pekerjaan Ibu</label>
                                                    <input type="text" id="pekerjaan-ibu" class="form-control" placeholder="Type Here" name="pekerjaan_ibu" value="<?= $data_wali['pekerjaan_ibu']; ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- <hr class="my-4" /> -->
                                    <!-- Address -->
                                    <!-- <h6 class="heading-small text-muted mb-4">Wali information -->
                                    <!-- </h6> -->
                                    <!-- <p style="color: red; font-style: italic; font-size: 12px; line-height: 0;">*Optional Boleh Tidak Diisi</p> -->
                                    <div class="pl-lg-4">
                                        <!-- <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="nama-wali">Nama Wali</label>
                                                    <input type="text" id="nama-wali" class="form-control" placeholder="Type Here" value="" name="nama_wali">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="alamat_wali">Alamat Wali</label>
                                                    <input type="text" id="alamat_wali" class="form-control" placeholder="Type Here" value="" name="alamat_wali">
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">No. Telpon Wali</label>
                                                    <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Pekerjaan Wali</label>
                                                    <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Alamat Wali</label>
                                                    <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-4 text-left">
                                                <button type="submit" name="edit" class="btn btn-sm btn-primary">Kirim</button>
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