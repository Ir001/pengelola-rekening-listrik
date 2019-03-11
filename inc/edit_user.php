<?php 
	include '../config.php';
	if (isset($_POST)) {
		$id = $_POST['id'];
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$nomor_rekening = mysqli_real_escape_string($conn, $_POST['nomor_rekening']);
		$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
		$daya_listrik = mysqli_real_escape_string($conn, $_POST['daya_listrik']);
		//Proses Update
		$update = "UPDATE user SET id_daya = '$daya_listrik', username = '$username', rekening_listrik = '$nomor_rekening', alamat = '$alamat',  tanggal = now() WHERE id_user = '$id'";
		$conn->query($update);
		echo "success";
	}else{
		echo "error";
	}
 ?>