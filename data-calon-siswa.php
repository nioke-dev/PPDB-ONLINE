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
                                        <h3 class="mb-0">Data Diri Siswa </h3>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4">Student information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Nama Calon Siswa</label>
                                                    <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Tempat Lahir</label>
                                                    <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Jenis Kelamin</label>
                                                    <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Tanggal Lahir</label>
                                                    <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Agama</label>
                                                    <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="input-anak-ke" class="form-control-label">Anak Ke</label>
                                                    <select class="form-control" id="input-anak-ke">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="input-anak-ke" class="form-control-label">Status Anak</label>
                                                    <select class="form-control" id="input-anak-ke">
                                                        <option>Lulus</option>
                                                        <option>Tidak Lulus</option>
                                                    </select>
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
                                                    <label class="form-control-label" for="input-address">Alaman Calon Siswa</label>
                                                    <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-address">Alaman Sekolah Asal</label>
                                                    <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">No Telp Calon Siswa</label>
                                                    <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Nama Sekolah Asal</label>
                                                    <input type="text" id="input-country" class="form-control" placeholder="Country" value="United States">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Tahun Lulus</label>
                                                    <input type="number" id="input-postal-code" class="form-control" placeholder="Postal code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-city">Tahun Periode</label>
                                                    <input type="text" id="input-city" class="form-control" placeholder="City" value="New York">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-country">Status</label>
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