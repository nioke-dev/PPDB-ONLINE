<?php
session_start();
require 'functions.php';

$data_perempuan = query("SELECT COUNT(jenis_kelamin) FROM calon_siswa WHERE jenis_kelamin = 'perempuan'")[0];
$data_laki = query("SELECT COUNT(jenis_kelamin) FROM calon_siswa WHERE jenis_kelamin = 'laki-laki'")[0];
$data_keseluruhan = query("SELECT COUNT(jenis_kelamin) FROM calon_siswa")[0];

$data_calon_siswa = query("SELECT * FROM calon_siswa");

$data_admin = query("SELECT * FROM admin");



// penghitungan rata rata nilai un siswa

if (isset($_POST['kirim'])) {
    if ($_POST['password'] != $_POST['konfirmasi_password']) {
        echo "
            <script>
                alert('Password harus sama dengan konfirmasi password');  
                window.location.href='daftar_admin.php';              
            </script>
        ";
        exit;
    }
    if (tambah_admin($_POST) > 0) {
        echo "
            <script>
                alert('Admin Baru Berhasil Ditambahkan');  
                window.location.href='daftar_admin.php';              
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal menambahkan Admin, Cek Kesalahan Pada Program!!!');                
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

    <title>Admin Page</title>

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
        <?php $title = 'daftar_admin';
        include 'Templates/sidenav.php' ?>
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
                        <h1 class="h3 mb-0 text-gray-800">Daftar Admin</h1>
                        <a href="" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal" data-target="#tambah_admin"><i class=" fas fa-user-plus mr-2 fa-sm text-white-50"></i>Tambah Admin Baru</a>
                    </div>


                    <div class=" card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Fullname</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Pas Foto</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data_admin as $dcs) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $dcs['fullname']; ?></td>
                                                <td><?= $dcs['email']; ?></td>
                                                <td><?= $dcs['password']; ?></td>
                                                <td><img src="../img/<?= $dcs['pas_foto']; ?>" alt="pas-foto" width="100px"></td>
                                                <td class="text-right">
                                                    <a href="edit_admin.php?id_admin=<?= $dcs['id_admin']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="hapus_data_admin.php?id_admin=<?= $dcs['id_admin']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Hapus"><i class="fa fa-trash"></i></a><br>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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
                        <span>Copyright &copy; PPDB ONLINE 2021</span>
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


    <!-- Button trigger modal -->

    <!-- Modal tambah admin -->
    <div class="modal fade" id="tambah_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Admin Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="daftar_admin.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $data_admin['pas_foto']; ?>" name="pas-foto-lama">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fullname">FullName</label>
                                    <input type="text" class="form-control" id="fullname" placeholder="Type here" name="nama-calon-admin">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="add_email">Email address</label>
                                    <input type="email" class="form-control" id="add_email" placeholder="name@example.com" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Type here" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="konfirmasi_password">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="konfirmasi_password" placeholder="Type here" name="konfirmasi_password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pas_foto">Pas Foto 4 x 6</label>
                                    <input type="file" class="form-control" id="pas_foto" placeholder="Type here" name="pas-foto">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="kirim">Save changes</button>
                    </form>
                </div>
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