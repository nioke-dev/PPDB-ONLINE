
<?php
session_start();
require "functions.php";
$id_admin = $_GET['id_admin'];

if (hapus_data_admin($id_admin) > 0) {
    echo "<script>
                alert('data berhasil dihapus!');
                document.location.href='daftar_admin.php';
        </script>";
} else {
    echo "<script>
                        alert('Data Gagal dihapus');
                        document.location.href='daftar_admin.php';
            </script>";
    die;
}
