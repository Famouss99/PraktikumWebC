<?php 
    include "function.php";

    $queryDosen = mysqli_query($koneksi, "SELECT * FROM dosen ORDER BY nip asc");


    if( !isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    $nama = $_SESSION['nama'];
    $role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SIMAK</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">SIMAK</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>Hai, <?= $nama; ?> </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <?php if($role == "1") { ?>
                            <a class="dropdown-item" href="profil_mahasiswa.php">Lihat Profil</a>
                        <?php } elseif($role == "2") { ?>
                            <a class="dropdown-item" href="profil_dosen.php">Lihat Profil</a>
                        <?php } elseif($role == "0") { ?>
                            <a class="dropdown-item" href="profil_admin.php">Lihat Profil</a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="mahasiswa.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Daftar Mahasiswa</a
                            >
                            <a class="nav-link active" href="dosen.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Daftar Dosen</a
                            >
                            <a class="nav-link" href="kelas.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Daftar Kelas</a
                            >
                            <a class="nav-link" href="bimbingan.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                Daftar Bimbingan</a
                            >
                            <?php if($role == "0") { ?>
                            <a class="nav-link" href="matakuliah.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Matakuliah</a>
                            <?php } ?>
                            <?php if($role == "1") { ?>
                            <a class="nav-link" href="krs.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-copy"></i></div>
                                KRS</a>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">Daftar Dosen</h3>
                        <div class="card mb-4">
                        <?php if($role == "0") { ?>
                            <div class="regis ml-4 mt-3 px-4">
                                <a href="register_dosen.php" class="btn btn-secondary">Registrasi Dosen</a>
                            </div>
                        <?php } ?>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="container">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <?php if($role == "0") { ?>
                                                    <th>Aksi</th>
                                                    <?php } ?>
                                                    <th class="col-sm-2">NIP</th>
                                                    <th class="col-sm-2">NIDN</th>
                                                    <th class="col-sm-3">Nama Dosen</th>
                                                    <th class="col-sm-3">Email</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php $i=1; 
                                            foreach ($queryDosen as $data) : ?>
                                                
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <?php if($role == "0") { ?>
                                                    <td><a href="edit_dosen.php?id_dosen=<?= $data['id_dosen']; ?>" class="badge badge-primary ">Edit</a></td>
                                                    <?php } ?>
                                                    <td><?= $data['nip']; ?></td>
                                                    <td><?= $data['nidn']; ?></td>
                                                    <td><?= $data['nama']; ?></td>
                                                    <td><?= $data['email']; ?></td>
                                                    <td><?= $data['status']; ?></td>
                                                </tr>
                                                    <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sistem Informasi Udayana 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/dosen.js"></script>
    </body>
</html>
