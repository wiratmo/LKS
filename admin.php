<?php
session_start();
if(isset($_SESSION['email'])){
	echo "anda sudah login silakan lanjutkan <br>";
	echo $_SESSION['nama'].'<br> <a href="logout.php">logout</a>';
} else {
	header('location:index.php');
}

?>