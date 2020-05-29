<?php 

include "function.php";

if( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
$nama = $_SESSION['nama'];

$role = $_SESSION['role'];

$id = $_GET['id_bimbingan'];

$queryPembimbing = mysqli_query($koneksi, "SELECT * FROM dosen");
$queryMahasiswa = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

$queryBimbingan = mysqli_query($koneksi, "SELECT *, mahasiswa.nim, dosen.nama as namados, mahasiswa.nama as namamah FROM bimbingan INNER JOIN dosen ON bimbingan.id_dosen=dosen.id_dosen INNER JOIN mahasiswa ON bimbingan.id_mahasiswa=mahasiswa.id_mahasiswa WHERE id_bimbingan = '$id'");

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
                            <a class="nav-link" href="dosen.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i></div>
                                Daftar Dosen</a
                            >
                            <a class="nav-link" href="kelas.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Daftar Kelas</a
                            >
                            <a class="nav-link active" href="bimbingan.php"
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
                        <h3 class="mt-4">Update Bimbingan PA</h3>
                        <div class="card mb-4">
                            <form form action="function.php?act=editBimbingan&id_bimbingan=<?= $id; ?>" id="buat" method="POST" >
                                <div class="form-group ml-4 py-3 mb-0">
                                    <label for="pa" class="form-label">Pembimbing Akademik</label>
                                    <select name="pa" id="pa" class="form-control col-sm-3">
                                        <?php $hasil = mysqli_fetch_assoc($queryBimbingan); ?>
                                        <option value="<?= $hasil["id_dosen"]; ?>"><?= $hasil["namados"]; ?></option>
                                        <?php while ($pembimbing = mysqli_fetch_assoc($queryPembimbing)) { ?>
                                            <option value="<?= $pembimbing["id_dosen"]; ?>"><?= $pembimbing["nama"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ml-4 ">
                                    <label for="mahasiswa" class="form-label">Mahasiswa Bimbingan</label>
                                    <select name="mahasiswa" id="mahasiswa" class="form-control col-sm-3">
                                        <option value="<?= $hasil["id_mahasiswa"]; ?>"><?= $hasil["namamah"]; ?></option>
                                        <?php while ($mahasiswa = mysqli_fetch_assoc($queryMahasiswa)) { ?>
                                            <option value="<?= $mahasiswa["id_mahasiswa"]; ?>"><?= $mahasiswa["nama"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="submit" name="buat_btn" id="buat" class="btn btn-primary ml-4 mb-3" value="Update Bimbingan PA">
                            </form>
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
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
