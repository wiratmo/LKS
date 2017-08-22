<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assets/latihan.css"> 
	<script type="text/javascript" src=""></script>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['email'])) {
	header('location:admin.php');
}
$address = "localhost";
$username = "root";
$password ="";
$database = "latihan";

/*meminta ijin untuk koneksi ke database*/
$con = mysqli_connect($address,$username,$password,$database);
if(!empty($_POST['submit'])){
	//parameter get sysmbol
	$email = mysqli_real_escape_string($con, $_POST['email']);
	//parameter get symbol
	$password = mysqli_real_escape_string($con, $_POST['pass']);
	//checking data 
	/*cek data langsung email sama password  yang berefek notifikasi error tidak kelihatan*/
	$query = "select * from user where email ='".$email."' and password ='".$password."'";
	/*hasil dari mysqli query adalah sebuah objek*/
	$result =  mysqli_query($con, $query);
	/*jumlah data pada resut*/
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	$_SESSION['email'] = $email;
	    	$_SESSION['nama']= $row['nama'];
	    	header('location:admin.php');	
	    }
	} else {
	    echo "<script>alert('password anda salah')</script>";
	    
	}
}
mysqli_close($con);
?>
<form method="POST" action="">
	<input type="text" name="email" placeholder="Masukkan Email">
	<input type="password" name="pass" placeholder="Masukkan password">
	<input type="submit" name="submit" value="login">
</form>
</body>
<footer>
	
</footer>
</html>