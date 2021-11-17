<?php
require '../functions.php';
$calon_siswa = query("SELECT * FROM calon_siswa");
$nilai_siswa = query("SELECT * FROM nilai");
$wali_siswa = query("SELECT * FROM wali");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Data Pendaftar</title>
</head>

<body>
    <?php
    header('Content-Type: application/vnd-ms-excel');
    header('Content-Disposition: attachment; filename=Data Pendaftar.xls');
    ?>
    <h2>Data Pendaftar</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>No Pendaftaran</th>
            <th>Nama Lengkap</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Anak Ke</th>
            <th>Pilihan Jurusan Satu</th>
            <th>Pilihan Jurusan Dua</th>
            <th>Pas Foto</th>
            <th>Alamat</th>
            <th>Telp. Calon Siswa</th>
            <th>Nama Sekolah Asal</th>
            <th>Alamat Sekolah Asal</th>
            <th>Tahun Lulus</th>
            <th>Tahun Periode</th>
            <th>Status</th>
        </tr>

        <?php foreach ($calon_siswa as $cs) : ?>
            <tr>
                <td><?= $cs['no_pendaftaran']; ?></td>
                <td><?= $cs['nama_calon_siswa']; ?></td>
                <td><?= $cs['tempat_lahir']; ?></td>
                <td><?= $cs['tgl_lahir']; ?></td>
                <td><?= $cs['jenis_kelamin']; ?></td>
                <td><?= $cs['agama']; ?></td>
                <td><?= $cs['anak_ke']; ?></td>
                <td><?= $cs['jurusan_satu']; ?></td>
                <td><?= $cs['jurusan_dua']; ?></td>
                <td><?= $cs['pas_foto']; ?></td>
                <td><?= $cs['alamat_calon_siswa']; ?></td>
                <td><?= $cs['tlp_calon_siswa']; ?></td>
                <td><?= $cs['nama_sekolah_asal']; ?></td>
                <td><?= $cs['alamat_sekolah_asal']; ?></td>
                <td><?= $cs['tahun_lulus']; ?></td>
                <td><?= $cs['tahun_periode']; ?></td>
                <td><?= $cs['status']; ?></td>


            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Data Wali</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>No Pendaftaran</th>
            <th>Nama Ayah</th>
            <th>Nama Ibu</th>
            <th>Alamat Orang Tua</th>
            <th>No. Telp Orang Tua</th>
            <th>pekerjaan Ayah</th>
            <th>Pekerjaan ibu</th>
        </tr>
        <?php foreach ($wali_siswa as $cs) : ?>
            <tr>
                <td><?= $cs['id_wali']; ?></td>
                <td><?= $cs['nama_ayah']; ?></td>
                <td><?= $cs['nama_ibu']; ?></td>
                <td><?= $cs['alamat_ortu']; ?></td>
                <td><?= $cs['telp_ortu']; ?></td>
                <td><?= $cs['pekerjaan_ayah']; ?></td>
                <td><?= $cs['pekerjaan_ibu']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <h2>Data Nilai Siswa</h2>

    <table border="1" cellpadding="10">
        <tr>

            <th>No Pendaftaran</th>
            <th>Nilai Matematika</th>
            <th>Niali Bahasa Indonesia</th>
            <th>Nilai Bahasa Inggris</th>
            <th>Nilai Ilmu Pengetahuan Alam</th>
        </tr>
        <?php foreach ($nilai_siswa as $cs) : ?>
            <tr>
                <td><?= $cs['id_nilai']; ?></td>
                <td><?= $cs['matematika']; ?></td>
                <td><?= $cs['bhs_indo']; ?></td>
                <td><?= $cs['bhs_ing']; ?></td>
                <td><?= $cs['ipa']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>