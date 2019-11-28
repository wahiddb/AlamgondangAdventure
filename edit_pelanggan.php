<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit Pelanggan</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Akronim">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Landing-Page---Parallax-Background---Logo-Heading-ButtonGIF.css">
</head>

<body id="page-top">
    <?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:index.php?pesan=belum_login");
    }
    ?>
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0" style="background-color: #00b9cb;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="welcome.php">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-hiking"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>AlamGondang<br>adventure<br></span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="pelanggan.php">
                            <span>Data Pelanggan</span>
                        </a>
                        <a class="nav-link" href="transaksi.php">
                            <span>Transaksi</span>
                        </a>
                        <a class="nav-link" href="riwayat_transaksi.php">
                            <span>Riwayat Transaksi</span>
                        </a>
                        <a class="nav-link" href="alat.php">
                            <span>Daftar Alat</span>
                        </a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                            <?php
                                            include "koneksi.php";
                                            $id = $_SESSION['username'];
                                            $query = "SELECT * from admin where email='$id'";
                                            $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <?php echo $row['nama']; ?>
                                            <?php
                                            }
                                            ?>
                                        </span></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Edit Data Pelanggan</p>
                            </div>
                            <div class="card-body">
                                <?php
                                //isikan dengan query select data
                                include "koneksi.php";
                                $id = $_GET['id'];
                                $query = mysqli_query($connect, "select * from penyewa where no_ktp='$id'") or die(mysqli_error($connect));

                                while ($plg = mysqli_fetch_array($query)) {
                                    $no_ktp = $plg['no_ktp'];
                                    $nama = $plg['nama'];
                                    $alamat = $plg['alamat'];
                                    $no_hp = $plg['no_hp'];
                                }
                                ?>
                                <form method="post" action="aksi_edit_pelanggan.php">
                                    <div class="form-group">
                                        <label for="address">
                                            <strong>No KTP</strong>
                                            <br>
                                        </label>
                                        <input disabled value="<?php echo $no_ktp; ?>" class="form-control" type="text" name="no_ktp" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">
                                            <strong>Nama</strong>
                                            <br>
                                        </label>
                                        <input value="<?php echo $nama; ?>" class="form-control" type="text" name="nama" onkeypress="return event.charCode < 48 || event.charCode  >57" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">
                                            <strong>Alamat</strong>
                                            <br>
                                        </label>
                                        <input value="<?php echo $alamat; ?>" class="form-control" type="text" name="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">
                                            <strong>Nomor Hp</strong>
                                            <br>
                                        </label>
                                        <input value="<?php echo $no_hp; ?>" class="form-control" type="text" name="no_hp" onkeypress="return event.charCode >= 48 && event.charCode <=57" required>
                                    </div>
                                    <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Wahid Dwipa Baskara 2019</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>