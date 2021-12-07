<?php
$koneksi = mysqli_connect("localhost", "root", "", "ppdb_online");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function register($data)
{
    global $koneksi;
    $fullname = htmlspecialchars($data['fullname']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $query = "INSERT INTO user VALUES('', '$fullname', '$email', '$password')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function login($data)
{
    global $koneksi;
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

    if (query($query)) {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("location: user-page.php?email=$email");
        $_GET['email'] = $email;
        exit;
    }

    return [
        'pesan' => 'Email atau Password Salah',
        'error' => 'true'
    ];
}

function login_admin($data)
{
    global $koneksi;
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

    if (query($query)) {
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        header("location: dashboard_admin.php?email=$email");
        $_GET['email'] = $email;
        exit;
    }

    return [
        'pesan' => 'Email atau Password Salah',
        'error' => 'true'
    ];
}

function tambah_calon_siswa($data)
{
    global $koneksi;
    $nama_calon_siswa = htmlspecialchars($data['nama-calon-siswa']);
    $tempat_lahir = htmlspecialchars($data['tempat-lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);
    $tanggal_lahir = htmlspecialchars($data['tanggal-lahir']);
    $agama = htmlspecialchars($data['agama']);
    $anak_ke = htmlspecialchars($data['anak-ke']);
    $jurusan_satu = htmlspecialchars($data['jurusan-satu']);
    $jurusan_dua = htmlspecialchars($data['jurusan-dua']);
    $alamat_calon_siswa = htmlspecialchars($data['alamat-calon-siswa']);
    $alamat_sekolah_asal = htmlspecialchars($data['alamat-sekolah-asal']);
    $no_telp_calon_siswa = htmlspecialchars($data['no-telp-calon-siswa']);
    $nama_sekolah_asal = htmlspecialchars($data['nama-sekolah-asal']);
    $tahun_lulus = htmlspecialchars($data['tahun-lulus']);
    $tahun_periode = htmlspecialchars($data['tahun-periode']);

    // upload gambar ijazah depan
    // $gambar_ijazah_depan = upload_ijazah_depan();
    // if ($gambar_ijazah_depan = false) {
    //     return false;
    // }

    // upload gambar ijazah belakang
    // $gambar_ijazah_belakang = upload_ijazah_belakang();
    // if ($gambar_ijazah_belakang = false) {
    //     return false;
    // }

    // upload gambar pas foto
    $gambar_pas_foto = upload_pas_foto();
    // if ($gambar_pas_foto = false) {
    //     return false;
    // }

    // upload scan surat keterangan lulus
    // $gambar_scan_surat_keterangan_lulus = upload_scan_surat_keterangan_lulus();
    // if ($gambar_scan_surat_keterangan_lulus = false) {
    //     return false;
    // }

    // if ($gambar_ijazah_depan = false) {
    //     return false;
    // }
    // if ($gambar_ijazah_belakang = false) {
    //     return false;
    // }
    // if ($gambar_pas_foto = false) {
    //     return false;
    // }
    // if ($gambar_scan_surat_keterangan_lulus = false) {
    //     return false;
    // }



    $query = "INSERT INTO calon_siswa VALUES(
        '',
        '$nama_calon_siswa',
        '$tempat_lahir',
        '$tanggal_lahir',
        '$jenis_kelamin',
        '$agama', 
        '$anak_ke',
        '$jurusan_satu',
        '$jurusan_dua',                
        '$gambar_pas_foto',        
        '$alamat_calon_siswa',
        '$no_telp_calon_siswa',
        '$nama_sekolah_asal',
        '$alamat_sekolah_asal',
        '$tahun_lulus',
        '$tahun_periode',
        ''    
    )";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// function upload_ijazah_depan()
// {
//     // scan-ijazah-bagian-depan
//     $namaFile_scan_ijazah_bagian_depan = $_FILES['scan-ijazah-bagian-depan']['name'];
//     $ukuranFile_scan_ijazah_bagian_depan = $_FILES['scan-ijazah-bagian-depan']['size'];
//     $error_scan_ijazah_bagian_depan = $_FILES['scan-ijazah-bagian-depan']['error'];
//     $tmpName_scan_ijazah_bagian_depan = $_FILES['scan-ijazah-bagian-depan']['tmp_name'];

//     if ($error_scan_ijazah_bagian_depan === 4) {
//         echo "
//         <script>
//             alert('Pilih Gambar Terlebih Dahulu!');                
//         </script>
//         ";
//         return false;
//     }

//     // cek apakah yang diupload adalah gambar
//     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
//     $ekstensiGambar = explode('.', $namaFile_scan_ijazah_bagian_depan);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));

//     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         echo "
//         <script>
//             alert('Yang anda upload bukan gambar');                
//         </script>
//         ";
//     }

//     // cek jika ukurannya terlalu besar
//     if ($ukuranFile_scan_ijazah_bagian_depan > 1000000) {
//         echo "
//         <script>
//             alert('Ukuran Gambar Terlalu Besar');                
//         </script>
//         ";
//     }

//     // lolos pengecekan, gambar siap diupload
//     // generate nama gambar baru
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;
//     move_uploaded_file($tmpName_scan_ijazah_bagian_depan, 'img/' . $namaFileBaru);

//     return $namaFileBaru;
// }

// function upload_ijazah_belakang()
// {
//     // scan-ijazah-bagian-belakang
//     $namaFile_scan_ijazah_bagian_belakang = $_FILES['scan-ijazah-bagian-belakang']['name'];
//     $ukuranFile_scan_ijazah_bagian_belakang = $_FILES['scan-ijazah-bagian-belakang']['size'];
//     $error_scan_ijazah_bagian_belakang = $_FILES['scan-ijazah-bagian-belakang']['error'];
//     $tmpName_scan_ijazah_bagian_belakang = $_FILES['scan-ijazah-bagian-belakang']['tmp_name'];

//     if ($error_scan_ijazah_bagian_belakang === 4) {
//         echo "
//         <script>
//             alert('Pilih Gambar Terlebih Dahulu!');                
//         </script>
//         ";
//         return false;
//     }

//     // cek apakah yang diupload adalah gambar
//     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
//     $ekstensiGambar = explode('.', $namaFile_scan_ijazah_bagian_belakang);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));

//     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         echo "
//         <script>
//             alert('Yang anda upload bukan gambar');                
//         </script>
//         ";
//     }

//     // cek jika ukurannya terlalu besar
//     if ($ukuranFile_scan_ijazah_bagian_belakang > 1000000) {
//         echo "
//         <script>
//             alert('Ukuran Gambar Terlalu Besar');                
//         </script>
//         ";
//     }

//     // lolos pengecekan, gambar siap diupload
//     // generate nama gambar baru
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;
//     move_uploaded_file($tmpName_scan_ijazah_bagian_belakang, 'img/' . $namaFileBaru);

//     return $namaFileBaru;
// }

function upload_pas_foto()
{
    // scan-ijazah-bagian-depan
    $namaFile_pas_foto = $_FILES['pas-foto']['name'];
    $ukuranFile_pas_foto = $_FILES['pas-foto']['size'];
    $error_pas_foto = $_FILES['pas-foto']['error'];
    $tmpName_pas_foto = $_FILES['pas-foto']['tmp_name'];

    // if ($error_pas_foto === 4) {
    //     echo "
    //     <script>
    //         alert('Pilih Gambar Terlebih Dahulu!');                
    //     </script>
    //     ";
    //     return false;
    // }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile_pas_foto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Yang anda upload bukan gambar');                
        </script>
        ";
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile_pas_foto > 1000000) {
        echo "
        <script>
            alert('Ukuran Gambar Terlalu Besar');                
        </script>
        ";
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName_pas_foto, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}
function upload_pas_foto_admin()
{
    // scan-ijazah-bagian-depan
    $namaFile_pas_foto = $_FILES['pas-foto']['name'];
    $ukuranFile_pas_foto = $_FILES['pas-foto']['size'];
    $error_pas_foto = $_FILES['pas-foto']['error'];
    $tmpName_pas_foto = $_FILES['pas-foto']['tmp_name'];

    // if ($error_pas_foto === 4) {
    //     echo "
    //     <script>
    //         alert('Pilih Gambar Terlebih Dahulu!');                
    //     </script>
    //     ";
    //     return false;
    // }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile_pas_foto);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
        <script>
            alert('Yang anda upload bukan gambar');                
        </script>
        ";
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile_pas_foto > 1000000) {
        echo "
        <script>
            alert('Ukuran Gambar Terlalu Besar');                
        </script>
        ";
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName_pas_foto, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus_data_admin($id_admin)
{
    global $koneksi;
    $query = "DELETE FROM admin WHERE id_admin=$id_admin";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function hapus_data_user($id_user)
{
    global $koneksi;
    $query = "DELETE FROM user WHERE iduser = '$id_user'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function hapus_data_calon_siswa($no_pendaftaran)
{
    global $koneksi;
    $query = "DELETE FROM calon_siswa WHERE no_pendaftaran = '$no_pendaftaran'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function hapus_data_wali_siswa($id_wali)
{
    global $koneksi;
    $query = "DELETE FROM wali WHERE id_wali = '$id_wali'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function hapus_data_nilai_siswa($id_nilai)
{
    global $koneksi;
    $query = "DELETE FROM nilai WHERE id_nilai = '$id_nilai'";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
// function upload_scan_surat_keterangan_lulus()
// {
//     // scan-ijazah-bagian-depan
//     $namaFile_surat_keterangan_lulus = $_FILES['scan-surat-keterangan-lulus']['name'];
//     $ukuranFile_surat_keterangan_lulus = $_FILES['scan-surat-keterangan-lulus']['size'];
//     $error_surat_keterangan_lulus = $_FILES['scan-surat-keterangan-lulus']['error'];
//     $tmpName_surat_keterangan_lulus = $_FILES['scan-surat-keterangan-lulus']['tmp_name'];

//     if ($error_surat_keterangan_lulus === 4) {
//         echo "
//         <script>
//             alert('Pilih Gambar Terlebih Dahulu!');                
//         </script>
//         ";
//         return false;
//     }

//     // cek apakah yang diupload adalah gambar
//     $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
//     $ekstensiGambar = explode('.', $namaFile_surat_keterangan_lulus);
//     $ekstensiGambar = strtolower(end($ekstensiGambar));

//     if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
//         echo "
//         <script>
//             alert('Yang anda upload bukan gambar');                
//         </script>
//         ";
//     }

//     // cek jika ukurannya terlalu besar
//     if ($ukuranFile_surat_keterangan_lulus > 1000000) {
//         echo "
//         <script>
//             alert('Ukuran Gambar Terlalu Besar');                
//         </script>
//         ";
//     }

//     // lolos pengecekan, gambar siap diupload
//     // generate nama gambar baru
//     $namaFileBaru = uniqid();
//     $namaFileBaru .= '.';
//     $namaFileBaru .= $ekstensiGambar;

//     move_uploaded_file($tmpName_surat_keterangan_lulus, 'img/' . $namaFileBaru);

//     return $namaFileBaru;
// }

function cari($keyword)
{
    global $koneksi;
    $query = "SELECT * FROM calon_siswa WHERE
            nama_calon_siswa LIKE '%$keyword%' OR
            jurusan_terpilih LIKE '%$keyword%' OR
            status LIKE '%$keyword%'
    ";
    return query($query);
}


function edit_calon_siswa($data)
{
    global $koneksi;
    $no_pendaftaran = htmlspecialchars($data['no_pendaftaran']);
    $nama_calon_siswa = htmlspecialchars($data['nama-calon-siswa']);
    $tempat_lahir = htmlspecialchars($data['tempat-lahir']);
    $jenis_kelamin = htmlspecialchars($data['jenis-kelamin']);
    $tanggal_lahir = htmlspecialchars($data['tanggal-lahir']);
    $agama = htmlspecialchars($data['agama']);
    $anak_ke = htmlspecialchars($data['anak-ke']);
    $jurusan_satu = htmlspecialchars($data['jurusan-satu']);
    $jurusan_dua = htmlspecialchars($data['jurusan-dua']);
    $alamat_calon_siswa = htmlspecialchars($data['alamat-calon-siswa']);
    $alamat_sekolah_asal = htmlspecialchars($data['alamat-sekolah-asal']);
    $no_telp_calon_siswa = htmlspecialchars($data['no-telp-calon-siswa']);
    $nama_sekolah_asal = htmlspecialchars($data['nama-sekolah-asal']);
    $tahun_lulus = htmlspecialchars($data['tahun-lulus']);
    $tahun_periode = htmlspecialchars($data['tahun-periode']);

    $gambar_pas_foto_lama = htmlspecialchars($data['pas-foto-lama']);

    // upload gambar pas foto
    // $gambar_pas_foto = upload_pas_foto();
    // if ($gambar_pas_foto = false) {
    //     return false;
    // }

    if ($_FILES['pas-foto']['error'] === 4) {
        $gambar_pas_foto = $gambar_pas_foto_lama;
    } else {
        $gambar_pas_foto = upload_pas_foto();
    }

    $query = "UPDATE calon_siswa SET        
        nama_calon_siswa = '$nama_calon_siswa',
        tempat_lahir = '$tempat_lahir',
        tgl_lahir = '$tanggal_lahir',
        jenis_kelamin = '$jenis_kelamin',
        agama = '$agama', 
        anak_ke = '$anak_ke',
        jurusan_satu ='$jurusan_satu',
        jurusan_dua ='$jurusan_dua',    
        pas_foto ='$gambar_pas_foto',
        alamat_calon_siswa = '$alamat_calon_siswa',
        tlp_calon_siswa = '$no_telp_calon_siswa',
        nama_sekolah_asal = '$nama_sekolah_asal',
        alamat_sekolah_asal = '$alamat_sekolah_asal',
        tahun_lulus = '$tahun_lulus',
        tahun_periode = '$tahun_periode'     
        WHERE no_pendaftaran = '$no_pendaftaran'
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function validasi_siswa($data)
{
    global $koneksi;
    $no_pendaftaran = htmlspecialchars($data['no_pendaftaran']);
    $validasi_now = htmlspecialchars($data['validate_now']);
    $query = "UPDATE calon_siswa SET        
        status='$validasi_now'                     
        WHERE no_pendaftaran = '$no_pendaftaran'
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function newjurusanset($data)
{
    global $koneksi;
    $no_pendaftaran = htmlspecialchars($data['no_pendaftaran']);
    $query = "UPDATE calon_siswa SET        
        jurusan_terpilih='TIDAK DITERIMA'                     
        WHERE no_pendaftaran = '$no_pendaftaran'
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function newjurusansetlolos($data)
{
    global $koneksi;
    $no_pendaftaran = htmlspecialchars($data['no_pendaftaran']);
    $query = "UPDATE calon_siswa SET        
        jurusan_terpilih='Belum Di Tentukan'                     
        WHERE no_pendaftaran = '$no_pendaftaran'
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function jurusan_terpilih($data)
{
    global $koneksi;
    $no_pendaftaran = htmlspecialchars($data['no_pendaftaran']);
    $jurusan_terpilih = htmlspecialchars($data['jurusan_terpilih']);
    $query = "UPDATE calon_siswa SET        
        jurusan_terpilih='$jurusan_terpilih'       
        WHERE no_pendaftaran = '$no_pendaftaran'
    ";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function tambah_admin($data)
{
    global $koneksi;
    $nama_calon_admin = htmlspecialchars($data['nama-calon-admin']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);

    $gambar_pas_foto_lama = htmlspecialchars($data['pas-foto-lama']);


    if ($_FILES['pas-foto']['error'] === 4) {
        $gambar_pas_foto = $gambar_pas_foto_lama;
    } else {
        $gambar_pas_foto = upload_pas_foto_admin();
    }

    $query = "INSERT INTO admin VALUES('', '$email', '$password', '$nama_calon_admin', '$gambar_pas_foto')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

function edit_admin($data)
{
    global $koneksi;
    $id_admin = htmlspecialchars($data['id_admin']);
    $nama_calon_admin = htmlspecialchars($data['nama-calon-admin']);
    $email = htmlspecialchars($data['email']);
    $password = htmlspecialchars($data['password']);


    $gambar_pas_foto_lama = htmlspecialchars($data['pas-foto-lama']);


    if ($_FILES['pas-foto']['error'] === 4) {
        $gambar_pas_foto = $gambar_pas_foto_lama;
    } else {
        $gambar_pas_foto = upload_pas_foto_admin();
    }

    $query = "UPDATE admin SET
                email = '$email',
                password = '$password',
                fullname = '$nama_calon_admin',
                pas_foto = '$gambar_pas_foto'
                WHERE id_admin = '$id_admin'
            ";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function data_nilai($data)
{
    global $koneksi;
    $nilai_mtk = htmlspecialchars($data['nilai_mtk']);
    $nilai_bindo = htmlspecialchars($data['nilai_bindo']);
    $nilai_ipa = htmlspecialchars($data['nilai_ipa']);
    $nilai_bing = htmlspecialchars($data['nilai_bing']);

    $query = "INSERT INTO nilai VALUES(
                '',
                '$nilai_mtk',
                '$nilai_bindo',
                '$nilai_bing',
                '$nilai_ipa'
        )";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function edit_data_nilai($data)
{
    global $koneksi;
    $id = htmlspecialchars($data['no_pendaftar']);
    $nilai_mtk = htmlspecialchars($data['nilai_mtk']);
    $nilai_bindo = htmlspecialchars($data['nilai_bindo']);
    $nilai_ipa = htmlspecialchars($data['nilai_ipa']);
    $nilai_bing = htmlspecialchars($data['nilai_bing']);

    $query = "UPDATE nilai SET               
                matematika = '$nilai_mtk',
                bhs_indo = '$nilai_bindo',
                bhs_ing = '$nilai_bing',
                ipa = '$nilai_ipa'
                WHERE id_nilai = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function data_wali($data)
{
    global $koneksi;
    $nama_ayah = htmlspecialchars($data['nama_ayah']);
    $nama_ibu = htmlspecialchars($data['nama_ibu']);
    $alamat_ortu = htmlspecialchars($data['alamat_ortu']);
    $telp_ortu = htmlspecialchars($data['telp_ortu']);
    $pekerjaan_ayah = htmlspecialchars($data['pekerjaan_ayah']);
    $pekerjaan_ibu = htmlspecialchars($data['pekerjaan_ibu']);

    $query = "INSERT INTO wali VALUES(
                '',
                '$nama_ayah',
                '$nama_ibu',
                '$alamat_ortu',
                '$telp_ortu',
                '$pekerjaan_ayah',
                '$pekerjaan_ibu'                
        )";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function edit_data_wali($data)
{
    global $koneksi;
    $no_pendaftar = htmlspecialchars($data['no_pendaftar']);
    $nama_ayah = htmlspecialchars($data['nama_ayah']);
    $nama_ibu = htmlspecialchars($data['nama_ibu']);
    $alamat_ortu = htmlspecialchars($data['alamat_ortu']);
    $telp_ortu = htmlspecialchars($data['telp_ortu']);
    $pekerjaan_ayah = htmlspecialchars($data['pekerjaan_ayah']);
    $pekerjaan_ibu = htmlspecialchars($data['pekerjaan_ibu']);

    $query = "UPDATE wali SET                
                nama_ayah = '$nama_ayah',
                nama_ibu = '$nama_ibu',
                alamat_ortu = '$alamat_ortu',
                telp_ortu = '$telp_ortu',
                pekerjaan_ayah = '$pekerjaan_ayah',
                pekerjaan_ibu = '$pekerjaan_ibu' 
                WHERE id_wali = '$no_pendaftar'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
