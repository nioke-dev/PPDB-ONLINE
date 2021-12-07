<?php
session_start();
require 'functions.php';
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}

$data_yang_sudah_diisi = query("SELECT * FROM user WHERE email = '$email'");
$id_user_yang_sudah_login = $data_yang_sudah_diisi[0]['iduser'];

$calon_siswa = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$id_user_yang_sudah_login'")[0];
if (isset($_POST['submit'])) {
    if (tambah_calon_siswa($_POST) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dikirim, Silahkan Mengakses Halaman input data Nilai Siswa');                
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
    if ($_POST['jurusan-satu'] != $_POST['jurusan-dua']) {
        if (edit_calon_siswa($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Diubah');  
                    document.location.href = 'data-calon-siswa.php';              
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Dikirim, Periksa Data Anda Kembali!!!');                
                </script>
                ";
        }
    } else {
        echo "
            <script>
                alert('Dilarang memilih Jurusan Yang Sama');                                  
                document.location.href = 'data-calon-siswa.php';
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
    <?php $title = 'data_calon_siswa';
    include 'Templates/sidenav.php'; ?>
    <!-- end sidenav -->

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php $title = 'data_calon_siswa';
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
                                        <h3 class="mb-0">Data Diri Siswa </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="" enctype="multipart/form-data">
                                    <h6 class="heading-small text-muted mb-4">Student information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" value="<?= $calon_siswa['pas_foto']; ?>" name="pas-foto-lama">
                                                    <label class="form-control-label" for="no_pendaftaran">No. Pendaftaran</label>
                                                    <input type="hidden" name="no_pendaftaran" value="<?= $calon_siswa['no_pendaftaran']; ?>">
                                                    <input type="text" id="no_pendaftaran" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['no_pendaftaran']; ?>" name="no_pendaftaran_disable" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-nama-calon-siswa">Nama Calon Siswa</label>
                                                    <input type="text" id="input-nama-calon-siswa" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['nama_calon_siswa']; ?>" name="nama-calon-siswa">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-tempat-lahir">Tempat Lahir</label>
                                                    <input type="text" id="input-tempat-lahir" class="form-control" placeholder="Type Here" name="tempat-lahir" value="<?= $calon_siswa['tempat_lahir']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-jenis-kelamin">Jenis Kelamin</label>
                                                    <select class="form-control" id="input-jenis-kelamin" name="jenis-kelamin">
                                                        <option value="<?= $calon_siswa['jenis_kelamin']; ?>"><?= $calon_siswa['jenis_kelamin']; ?></option>
                                                        <option value="laki-laki">laki-laki</option>
                                                        <option value="perempuan">perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-tanggal-lahir">Tanggal Lahir</label>
                                                    <input type="date" id="input-tanggal-lahir" class="form-control" name="tanggal-lahir" value="<?= $calon_siswa['tgl_lahir']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-agama">Agama</label>
                                                    <select class="form-control" id="input-agama" name="agama">
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
                                                    <select class="form-control" id="input-anak-ke" name="anak-ke">
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
                                                    <select class="form-control" id="input-anak-ke" name="jurusan-satu">
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
                                                    <select class="form-control" id="input-anak-ke" name="jurusan-dua">
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
                                                    <img src="img/<?= $calon_siswa['pas_foto']; ?>" alt="gambar" width="100px" height="150px">
                                                    <input type="file" id="pas-foto-4-kali-6" class="form-control" name="pas-foto" value="">
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
                                                    <input id="input-alamat-calon-siswa" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['alamat_calon_siswa']; ?>" type="text" name="alamat-calon-siswa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-alamat-sekolah-asal">Alamat Sekolah Asal</label>
                                                    <input id="input-alamat-sekolah-asal" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['alamat_sekolah_asal']; ?>" type="text" name="alamat-sekolah-asal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="no-telp">No Telp Calon Siswa</label>
                                                    <input type="text" id="no-telp" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['tlp_calon_siswa']; ?>" name="no-telp-calon-siswa">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-nama-sekolah-asal">Nama Sekolah Asal</label>
                                                    <input type="text" id="input-nama-sekolah-asal" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['nama_sekolah_asal']; ?>" name="nama-sekolah-asal">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="tahun-lulus">Tahun Lulus</label>
                                                    <input type="text" id="tahun-lulus" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['tahun_lulus']; ?>" name="tahun-lulus">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">Tahun Periode</label>
                                                    <input type="text" id="input-city" class="form-control" placeholder="Type Here" value="<?= $calon_siswa['tahun_periode']; ?>" name="tahun-periode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-left">
                                                <!-- <button type="submit" name="submit" class="btn btn-sm btn-primary mr-1">Kirim</button> -->
                                                <button type="submit" name="edit" class="btn btn-sm btn-success mr-1">Kirim Data</button>
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