<?php
    include "koneksi.php";
    $id = $_GET["id"];
    $query_edit1 = mysqli_query($koneksi,"SELECT * FROM user WHERE id = $id");
	$data_edit = mysqli_fetch_array($query_edit1);
    $edit_fname = $data_edit["fname"];
    $edit_lname = $data_edit["lname"];

    if (isset($_POST["btn_edit"])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
    
        $query_submit = "UPDATE user SET fname = '$fname', lname = '$lname', gender = '$gender' WHERE id = $id";
        $exe = mysqli_query($koneksi, $query_submit);
    
        echo "<script>
                alert('Data Berhasil Diedit!');
                document.location.href = 'index.php';
             </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <fieldset style="width: 35%; margin: auto;border-radius: 16px;" id="edit">
        <legend>Edit Biodata</legend>
        <table>
            <tr>
                <td>Nama Depan : </td>
                <td><input type="text" name="fname" value="<?php echo $edit_fname ?>"></td>
            </tr>
            <tr>
                <td>Nama Belakang: </td>
                <td><input type="text" name="lname" value="<?php echo $edit_lname ?>"></td>
            </tr>
            <tr>
                <td>Kelamin : </td>
                <td><input type="radio" name="gender" value="Laki-laki">Male  <input type="radio" name="gender" value="Perempuan">Female  <input type="radio" name="gender" value="Lainnya">Other</td>
            </tr>
            <td><input type="submit" value="Edit" name="btn_edit"></td>
        </table>
    </fieldset> 
    </form>
</body>
</html>