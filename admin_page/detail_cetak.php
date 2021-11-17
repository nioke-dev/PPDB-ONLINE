<?php
session_start();
require '../functions.php';
$no_pendaftaran = $_GET['no_pendaftaran'];
$calon_siswa = query("SELECT * FROM calon_siswa WHERE no_pendaftaran = '$no_pendaftaran'")[0];
$data_nilai_siswa  = query("SELECT * FROM nilai WHERE id_nilai='$no_pendaftaran'")[0];
$data_wali_siswa = query("SELECT * FROM wali WHERE id_wali = '$no_pendaftaran'")[0];



require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DETAIL CETAK</title>
<style>
table,
tr,
td {
    padding: 5px;
    vertical-align: top;
}
.judul{
    margin-bottom: 0px;
    font-size: 16px;
    font-weight: bold;
}
</style>
</head>

<body>    
<img src="../Assets/img/logo/logo smkn1gending.png" style="float: left;  height: 70px;" alt="logo-smkn1gending">
<div style="margin-left: 0px; text-align: center;">
    <div style="font-size: 18px; text-align: center; margin-left: -70px;">Data Pendaftaran Siswa Baru | Tahun 2020</div>
    <div style="font-size: 20px; text-align: center; margin-top: -40px;">SMK NEGERI 1 GENDING</div>
    <div style="font-size: 12px; text-align: center;">Desa Sumber Kerang, Kabupaten Probolinggo, Jawa Timur 67272</div>
</div>
<hr style="border: 0.5px solid black; margin: 0px;">
<h3 class="judul">A. Detail Pendaftar</h3>
    <table width="100%">
        <tr>
            <td width="23%">Nama</td>
            <td width="1%">:</td>
            <td width="60%">' . $calon_siswa['nama_calon_siswa'] . '</td>
            <td rowspan="6" align="right">
                <img src="../img/' . $calon_siswa['pas_foto'] . '" width="130px" height="150px" alt="gambar-siswa">
            </td>
        </tr>
        <tr>
            <td>Tempat lahir</td>
            <td>:</td>
            <td>' . $calon_siswa['tempat_lahir'] . '</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>' . $calon_siswa['tgl_lahir'] . '</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>' . $calon_siswa['jenis_kelamin'] . '</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>' . $calon_siswa['agama'] . '</td>
        </tr>
        <tr>
            <td>Anak Ke</td>
            <td>:</td>
            <td>' . $calon_siswa['anak_ke'] . '</td>
        </tr>
        <tr>
            <td>Plihan Jurusan Satu</td>
            <td>:</td>
            <td>' . $calon_siswa['jurusan_satu'] . '</td>
        </tr>
        <tr>
            <td>Pilihan Jurusan Dua</td>
            <td>:</td>
            <td>' . $calon_siswa['jurusan_dua'] . '</td>
        </tr>
        <tr>
            <td>Alamat Calon Siswa</td>
            <td>:</td>
            <td>' . $calon_siswa['alamat_calon_siswa'] . '</td>
        </tr>
        <tr>
            <td>No Telp Calon Siswa</td>
            <td>:</td>
            <td>' . $calon_siswa['tlp_calon_siswa'] . '</td>
        </tr>
        <tr>
            <td>Tahun Lulus</td>
            <td>:</td>
            <td>' . $calon_siswa['tahun_lulus'] . '</td>
        </tr>        
        <tr>
            <td>Tahun Periode</td>
            <td>:</td>
            <td>' . $calon_siswa['tahun_periode'] . '</td>
        </tr>                
    </table>

    <h3 class="judul">B Data Nilai Pendaftar</h3>
    <table>
        <tr>
            <td width="250px">Nilai Matematika</td>
            <td>:</td>
            <td>' . $data_nilai_siswa['matematika'] . '</td>
        </tr>
        <tr>
            <td>Nilai Bahasa Indonesia</td>
            <td>:</td>
            <td>' . $data_nilai_siswa['bhs_indo'] . '</td>
        </tr>
        <tr>
            <td>Nilai Bahasa Inggris</td>
            <td>:</td>
            <td>' . $data_nilai_siswa['bhs_ing'] . '</td>
        </tr>
        <tr>
            <td>Nilai Ilmu Penetahuan Alam</td>
            <td>:</td>
            <td>' . $data_nilai_siswa['ipa'] . '</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>:</td>
            <td>' . $calon_siswa['status'] . ' ==> ' . $calon_siswa['jurusan_terpilih'] . '</td>
        </tr>

    </table>

    <h3 class="judul">C Data Wali Calon Siswa</h3>
    <table>
        <tr>
            <td width="250px">Nama Ayah</td>
            <td>:</td>
            <td>' . $data_wali_siswa['nama_ayah'] . '</td>
        </tr>
        <tr>
            <td>Nama Ibu</td>
            <td>:</td>
            <td>' . $data_wali_siswa['nama_ibu'] . '</td>
        </tr>
        <tr>
            <td>Alamat Ortu</td>
            <td>:</td>
            <td>' . $data_wali_siswa['alamat_ortu'] . '</td>
        </tr>
        <tr>
            <td>No Telepon Ortu</td>
            <td>:</td>
            <td>' . $data_wali_siswa['telp_ortu'] . '</td>
        </tr>
        <tr>
            <td>Pekerjaan Ayah</td>
            <td>:</td>
            <td>' . $data_wali_siswa['pekerjaan_ayah'] . '</td>
        </tr>
        <tr>
            <td>Pekerjaan Ibu</td>
            <td>:</td>
            <td>' . $data_wali_siswa['pekerjaan_ibu'] . '</td>
        </tr>
    </table>
</body>

</html>');
$mpdf->Output();
