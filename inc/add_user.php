<?php 
	include '../config.php';
	if (isset($_POST)) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$nomor_rekening = mysqli_real_escape_string($conn, $_POST['nomor_rekening']);
		$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
		$daya_listrik = mysqli_real_escape_string($conn, $_POST['daya_listrik']);
		//Proses Tambah Data
		$sql = "INSERT INTO user VALUES('','$daya_listrik', '$username', '$nomor_rekening', '$alamat', now())";
		$conn->query($sql);
		echo "success";
	}else{
		echo "error";
	}
 ?>