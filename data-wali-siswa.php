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
                                        <h3 class="mb-0">Data Wali Siswa</h3>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4">student guardian information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Nama Ayah</label>
                                                    <input type="text" id="input-username" class="form-control" placeholder="Username" value="lucky.jesse">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Nama Ibu</label>
                                                    <input type="email" id="input-email" class="form-control" placeholder="jesse@example.com">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Alamat Ibu</label>
                                                    <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">No Telp. Orang Tua</label>
                                                    <input type="text" id="input-last-name" class="form-control" placeholder="Last name" value="Jesse">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Pekerjaan Ayah</label>
                                                    <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">Pekerjaan Ibu</label>
                                                    <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr class="my-4" />
                                    <!-- Address -->
                                    <h6 class="heading-small text-muted mb-4">Wali information
                                    </h6>
                                    <p style="color: red; font-style: italic; font-size: 12px; line-height: 0;">*Optional Boleh Tidak Diisi</p>
                                    <div class="pl-lg-4">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">Nama Wali</label>
                                                <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">Alamat Wali</label>
                                                <input type="text" id="input-first-name" class="form-control" placeholder="First name" value="Lucky">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
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
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Alamat Wali</label>
                                                <input id="input-address" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">
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