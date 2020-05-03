<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'prak_pbw_paging');

$halaman = 5;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result = mysqli_query($koneksi,"SELECT * FROM user");
$total = mysqli_num_rows($result);
$pages = ceil($total/$halaman);            
$query = mysqli_query($koneksi,"select * from user LIMIT $mulai, $halaman");
$no = $mulai+1;
?>
       
<fieldset style="width: 10%; margin: auto; border: 1px solid; margin-top: 15%; border-radius: 15px;border-color: blue;">
    <legend>Data User</legend>
        <table border="1px" style="border-collapse: collapse; text-align: center; margin: auto">
            <tr>
                <th>No</th>
                <th>Nama</th>		
            </tr>
            <?php 
                while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>                  
                    <td><?php echo $data['nama']; ?></td>                       
                    </tr>
                    <?php               
                } 
            ?>
        </table>
</fieldset>

<fieldset style="width: 10%; margin: auto; border: 1px solid; border-radius: 15px; border-color: blue;">
    <legend>Page</legend>
      <center>
        <?php for ($i=1; $i<=$pages ; $i++){ ?>
        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php } ?>
        </table>
      </center>
</fieldset>