<?php
include "koneksi.php";
$id = $_GET["id"];    
$query = "DELETE FROM user WHERE id = $id";
$exe = mysqli_query($koneksi, $query);
echo "<script>
        alert('Data Berhasil Dihapus!');
        document.location.href = 'index.php';
     </script>";
?>