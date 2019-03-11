<?php 
	include '../config.php';
	if ($_POST) {
		$id = $_POST['id_user'];
		$conn->query("DELETE FROM user WHERE id_user = $id");
		echo "success";
	}else{
		echo "error";
	}
 ?>