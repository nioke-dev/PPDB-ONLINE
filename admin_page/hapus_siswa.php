
<?php
session_start();
require "functions.php";
$no_pendaftaran = $_GET['no_pendaftaran'];

if (hapus_data_user($no_pendaftaran) && hapus_data_calon_siswa($no_pendaftaran) && hapus_data_wali_siswa($no_pendaftaran) && hapus_data_nilai_siswa($no_pendaftaran) > 0) {
    echo "
                <script>
                    alert('Data Siswa Berhasil Dihapus!!');
                    document.location.href='dashboard_admin.php';
                </script>
            ";
} else {
    echo "<script>
                        alert('Data Gagal dihapus');
                        document.location.href='dashboard_admin.php';
            </script>";
    die;
}
