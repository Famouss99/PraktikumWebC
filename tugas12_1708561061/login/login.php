<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<style>
    	body {
			margin: 0;
			padding: 0;
		}
		h1 {
			font-family: Poppins;
			color: #065279;
			font-style: bold;
			font-size: 30px;
			background-color: white;
			text-align: center;
		}
		h2 {
			font-family: Poppins;
			color: #065279;
			font-style: bold;
			text-align: center;
			font-size: 20px;
			margin-top: 1px;
		}
		a {
			font-family: Poppins;
			font-size: 20px;
			color: #065279;
		}
		.formkot {
			width:20%;
			padding:20px;
			margin: 9% auto;
			border-radius: 20px;
			background-color:#0a0a0a;
		}
		#kotak {
			opacity: 1;
			color: #0a0a0a;
			padding: 8px;
			margin: 8px;
		}
		.kotak::-webkit-input-placeholder{
			text-align: center;
			font-family: Poppins;
			font-style: normal;
			font-weight: normal;
			font-size: 20px;
			color: #16289e;
			letter-spacing: 0.35px;
		}
		.kotak {
			width: 98%;
			height: 10px;
			border:0px;
			border-radius: 9px;
			text-align: center;
			font-family: Poppins;
			font-style: normal;
			font-weight: normal;
			font-size: 20px;
			color: #16289e;
			background-color: rgba(255,255,255,1);
			padding: 8px;
		}
		.btn {
			margin-top: 5px;
			width: 80%;
			height:30px;
			margin-left: 10%;
			text-align: center;
			font-size: 14px;
			font-family: 'Open Sans',sans-serif;
			font-weight: bold;
			letter-spacing: 0;
			-webkit-box-shadow: inset 0px 0px 0px 0px rgba(250, 220, 219, 1);
			-moz-box-shadow: inset 0px 0px 0px 0px rgba(250, 220, 219, 1);
			box-shadow: inset 0px 0px 0px 0px rgba(250, 220, 219, 1);
			color: #fff;
			background-color: #16289e;
			text-shadow: none;
			text-transform: uppercase;
			border: none;
			cursor: pointer;
			position: relative;
			margin-bottom: 20px;
			-webkit-animation: shadowFadeOut 0.4s;
			-moz-animation: shadowFadeOut 0.4s;
			border-radius: 9px;
		}
		.btn:hover,.btn:focus{
  			color: #fff;
  		-webkit-box-shadow: inset 0px 54px 0px 0px rgba(250, 220, 219, 1);
  		-moz-box-shadow:    inset 0px 54px 0px 0px rgba(250, 220, 219, 1);
  		box-shadow:         inset 0px 54px 0px 0px rgba(250, 220, 219, 1);
  		-webkit-animation: shadowFade 0.4s;
  		-moz-animation: shadowFade 0.4s;
		}
	</style>
</head>
<body>
<div class="formkot">
	<?php
		$koneksi = mysqli_connect("localhost","root","","login") or die(mysqli_error());
		session_start();
		if(isset($_POST['login'])){
    	$email = $_POST['email'];
   		$pass = $_POST['pass'];
    	if($email == NULL || $pass == NULL){
        	echo"<script>alert('Anda belum mengisi form!');document.location.href='login.php'</script>";
    	}
    	$sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
    	$result = mysqli_query($koneksi,$sql);
    	if(mysqli_num_rows($result)>0){
        	while($row = mysqli_fetch_assoc($result)){
            	$_SESSION['nama'] = $row['nama'];
            	$_SESSION['level'] = $row['level'];
            	header('Location:index.php');
        	}
    	}else{
        	echo"<script>alert('Username atau password salah!');document.location.href='login.php'</script>";
    	}
	}
		?>
		<h1>LOGIN</h1>
		<form action="" method="post">
			<center><a><b>EMAIL</b></a><br></center>
        	<input class="kotak" type="text" name="email"  required/><br><br><center><a><b>PASSWORD</b></a><br></center>
        	<input class="kotak" type="Password" name="pass"  required/><br><br>
			<input class="btn" type="submit" name="login" value="LOGIN"><br>
    	</form>
	</div><br><br>
</body>
</html>
