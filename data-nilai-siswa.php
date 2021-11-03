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
    <?php include 'Templates/sidenav.php'; ?>
    <!-- end sidenav -->

    <div class="main-content" id="panel">
        <!-- Topnav -->
        <?php include 'Templates/header.php' ?>
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
                                <form>
                                    <h6 class="heading-small text-muted mb-4">Input Data Nilai UNBK Siswa</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">Nilai Matematika</label>
                                                    <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Nilai Bahasa Indonesia</label>
                                                    <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Nilai Bahasa Inggris</label>
                                                    <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Nilai Ilmu Pengetahuan Alam</label>
                                                    <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 text-left">
                                                <a href="#!" class="btn btn-sm btn-primary">Kirim</a>
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