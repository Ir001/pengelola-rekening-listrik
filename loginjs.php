<?php 
	session_start();
	include 'config.php';
	if (isset($_POST)) {
		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		/*Proses Login*/
		$cek_user = $conn->query("SELECT * FROM admin WHERE username = '$username'");
		$user = $cek_user->num_rows;
		if ($user >= 1) {
			$data_user = $cek_user->fetch_assoc();
			if ($data_user['password'] == $password) {
				$_SESSION['user'] = $data_user;
				echo "success";
			}else{
				echo "failed";
			}
		}else{
			echo "unknown";
		}
	}else{
		echo "error";
	}
 ?>