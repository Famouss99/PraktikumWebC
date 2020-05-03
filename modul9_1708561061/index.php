<?php
include "koneksi.php";

if (isset($_POST["btn_submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];

    $query_submit = "INSERT INTO user VALUES ('','$fname','$lname','$gender')";
    $exe = mysqli_query($koneksi, $query_submit);
    echo "<script>
            alert('Data Berhasil Diinput!');
            document.location.href = 'index.php';
         </script>";
}  
?>

<!DOCTYPE html>
<html>
<head>
	<title>Form Biodata</title>
</head>
<style type="text/css">
	fieldset{
		width: 25%; margin: auto; border: 1px solid;
	}
	.table{
		border-collapse: collapse; border: 1px solid black; text-align: center; margin: auto; 
	}
	.table td{
		border: 1px solid; padding: 5px; 

	}
</style>
<body>
<form action="" method="post">
<fieldset style="width: 25%; margin: auto; margin-top: 10%;border-radius: 16px;">
	<legend>Daftar</legend>
	<table>
		<tr>
			<td>Nama Depan: </td>
			<td><input type="text" name="fname"></td>
		</tr>
		<tr>
			<td>Nama belakang : </td>
			<td><input type="text" name="lname"></td>
		</tr>
		<tr>
			<td>kelamin : </td>
			<td><input type="radio" name="gender" value="Laki-laki">Male  <input type="radio" name="gender" value="Perempuan">Female  <input type="radio" name="gender" value="Lainnya">Other</td>
		</tr>
        <td><input type="submit" value="Submit" name="btn_submit"> <input type="reset" value="Reset"></td>
	</table>
</fieldset> 
</form>
<br>
<fieldset style="border-radius: 16px;">
    <legend>Tabel User</legend>
        <table border="1" class="table">
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Opsi</th>		
            </tr>
            <?php 
            $query_mysql = mysqli_query($koneksi,"SELECT * FROM user");
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)){
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['fname']; ?></td>
                <td><?php echo $data['lname']; ?></td>
                <td><?php echo $data['gender']; ?></td>
                <td>
                    <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                    <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>					
                </td>
            </tr>
            <?php } ?>
        </table>
</fieldset>
</body>
</html>