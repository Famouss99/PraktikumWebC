<?php
    session_start();
    if(isset($_SESSION['level'])){
        if($_SESSION['level'] == NULL){
            header('Location: login.php');
        }
    }else{
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tugas CSS</title>
  <style>
    body {
      margin: 0;
      font-family: poppins;
      <?php echo ($_SESSION['level']=='admin') ? "background-color: #808B96;" : "background-color: #808B96;"; ?>
    }
    .kiri {
      margin: 2%;
      width: 15%;
      border-radius: 20px;
      <?php echo ($_SESSION['level']=='admin') ? "border-color: #2E86C1 ;" : "border-color: #2E86C1 ;"; ?>
      border-style: solid;
      border-width: 3px;
      height: auto;
      float: left;
    }
    .logo {
      display: flex;
      align-content: center;
      margin-top: 20px;
    }
    .sub-kiri {
      text-align: center;
      color: #065279;
     <?php echo ($_SESSION['level']=='admin') ? "background-color: #2E86C1 ;" : "background-color: #2E86C1 ;"; ?>
   }
    .sub-kiri1 a {
      text-align: center;
      color:  #065279;
    }
    .kanan {
      <?php echo ($_SESSION['level']=='admin') ? "background-color: #2E86C1 ;" : "background-color: #2E86C1 ;"; ?>
      margin: 1%;
      width: 70%;
      height: auto;
      float: left;
      border-radius: 30px;
      border-color: #065279;
      border-style: solid;
      border-width: 3px;
    }
    .foto {
      clear: right;
      height: 300px;
      background-image: url(./image/cover.JPG);
      background-size: 100%;
      border-radius: 30px;
    }
    .nav {
      width: 100%;
      height: 60px;
      <?php echo ($_SESSION['level']=='admin') ? "background-color: #7F8C8D  ;" : "background-color: #7F8C8D ;"; ?>
    }
    .nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }
    .nav ul li {
      float: left;
    }
    li a {
      display: flex;
      color: #065279;
      text-align: center;
      margin-left:105px;
      text-decoration: none;
    }
    li a:hover {
      color:  #ffffff;
    }
    .isi {
      padding:0px 50px 50px 50px;
      text-align: justify;
    }
    .isi1 {
      height:320px;
      <?php echo ($_SESSION['level']=='admin') ? "background-color: #7F8C8D ;" : "background-color: #7F8C8D ;"; ?>
      padding:30px;
    }
    .pengajar {
      float: left;
      margin-left:20px ;
      width: 200px;
      <?php echo ($_SESSION['level']=='admin') ? "border-color: #7F8C8D ;" : "border-color: #7F8C8D ;"; ?>
      border-style: solid;
      margin-bottom: 25px;
      border-width: 3px;
    }
    .container {
      text-align: center;
      padding: 10px 20px;
    }
    .garis {
      border-bottom: 4px solid #FFCC00;
    }
    .footer{
      text-align: center;
      clear: both;
      width: 100%;
      height: 50px;
      <?php echo ($_SESSION['level']=='admin') ? "background-color: #2E86C1 ;" : "background-color: #2E86C1 ;"; ?>
      color: #065279;
      padding:10px;
    
    }
  </style>
</head>

<body>
  <div class="kiri">
    <div class="logo">
      <img style="margin-left: auto; margin-right: auto;" src="./image/logo.png" alt="Logo.png" height="150px" />
    </div>
    <div class="sub-kiri">
      <h3>ARTIKEL POPULER</h3>
    </div>
    <div class="sub-kiri1">
      <a href="#" style="text-decoration: none;">
        <h4>Desain Web</h4>
      </a>
    </div>
    <div class="sub-kiri1">
      <a href="#" style="text-decoration: none;">
        <h4>HTML</h4>
      </a>
    </div>
    <div class="sub-kiri1">
      <a href="#" style="text-decoration: none;">
        <h4>CSS</h4>
      </a>
    </div>
    <div class="sub-kiri1">
      <a href="#" style="text-decoration: none;">
        <h4>Lain-lain</h4>
      </a>
    </div>
  </div>
  <div class="kanan">
    <div class="foto"></div>
     <div class="nav">
      <ul>
        <li>
          <a href="index.php" style="text-decoration: none;">
            <h3>HOME</h3>
          </a>
        </li>
        <li>
          <a href="tentang.php" style="text-decoration: none;">
            <h3>TENTANG</h3>
          </a>
        </li>
        <li>
          <a href="pengajar.php" style="text-decoration: none;">
            <h3>PENGAJAR</h3>
          </a>
        </li>
        <li>
          <a href="kontak.php" style="text-decoration: none;">
            <h3>KONTAK</h3>
          </a>
        </li>
        <li>
          <a href="logout.php" style="text-decoration: none; color: #4978D6;">
            <h3>LOGOUT</h3>
          </a>
        </li>
      </ul>
    </div>
    <div class="isi">
            <h1 style="color: #065279;"">SEJARAH</h1>
            <img style="width: 300px; float: left; margin-right: 20px;" src="./image/1.jpg" alt="Unudimage">
            <p>Cikal bakal Unud adalah Fakultas Sastra Udayana cabang Universitas Airlangga yang diresmikan oleh P. J.
                M.
                Presiden Republik Indonesia Ir. Soekarno, dibuka oleh J. M. Menteri P.P dan K. Prof. DR. Priyono pada
                tanggal 29
                September 1958 sebagaimana tertulis pada Prasasti di Fakultas Sastra Jalan Nias Denpasar.
                <br><br> Universitas Udayana secara sah berdiri pada tanggal 17 Agustus 1962 dan merupakan perguruan tinggi negeri tertua di daerah Provinsi Bali. Sebelumnya, sejak tanggal 29 September 1958 di Bali sudah berdiri sebuah Fakultas yang bernama Fakultas Sastra Udayana sebagai cabang dari Universitas Airlangga Surabaya. Fakultas Sastra Udayana inilah yang merupakan embrio dari pada berdirinya Universitas Udayana. Berdasarkan Surat Keputusan Menteri PTIPNo.104/1962, tanggal 9 Agustus 1962, Universitas Udayana secara syah berdiri sejak tanggal 17 Agustus 1962. Tetapi oleh karena hari lahir Universitas Udayana jatuh bersamaan dengan hari Proklamasi Kemerdekaan RepublikIndonesia maka perayaan Hari Ulang Tahun Universitas Udayana dialihkan menjadi tanggal 29 September dengan mengambil tanggal peresmian Fakultas Sastra yang telah berdiri sejak tahun 1958.
            </p>
        </div>
  </div>
  <div class="footer">
    <b>@ Copyright 2020<br>Universitas Udayana</b>
  </div>
</body>
</html>