<?php 
	session_start();
	include 'config.php';
	$data_listrik = $conn->query("SELECT * FROM daya");
	if (!isset($_SESSION['user'])) {
		header("location: login.php");
	}
 ?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="Content-Language" content="en" />
		<meta name="msapplication-TileColor" content="#2d89ef">
		<meta name="theme-color" content="#4188c9">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="./favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
		<!-- Generated: 2018-04-16 09:29:05 +0200 -->
		<title><?=$config['webname'];?> - Tambah User</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
		<script src="./assets/js/require.min.js"></script>
		<script>
		requirejs.config({
		baseUrl: '.'
		});
		</script>
		<!-- Dashboard Core -->
		<link href="./assets/css/dashboard.css" rel="stylesheet" />
		<script src="./assets/js/dashboard.js"></script>
		<!-- c3.js Charts Plugin -->
		<link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
		<script src="./assets/plugins/charts-c3/plugin.js"></script>
		<!-- Google Maps Plugin -->
		<link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
		<script src="./assets/plugins/maps-google/plugin.js"></script>
		<!-- Input Mask Plugin -->
		<script src="./assets/plugins/input-mask/plugin.js"></script>
	</head>
	<body class="">
		<div class="page">
			<div class="page-main">
				<?php  include 'header.html'; ?>
				<div class="my-3 my-md-5">
					<div class="container">
						<div class="page-header">
							<h1 class="page-title">
								Tambah User
							</h1>
						</div>
						<div class="row row-cards row-deck">
							<div class="col-md-6 offset-md-3">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Tambah User</h3>
									</div>
									<div class="card-body">
										<div class="col-12">
											<form id="tambahUser">
												<span id="loading"></span>
												<div class="form-group">
													<label for="" class="control-label">Nama Lengkap</label>
													<input type="text" name="username" class="form-control" placeholder="Nama Lengkap" required>
												</div>
												<div class="form-group">
													<label for="" class="control-label">Nomor Rekening</label>
													<input type="text" name="nomor_rekening" class="form-control" maxlength="15" placeholder="Nomor Rekening Listrik" required>
												</div>
												<div class="form-group">
													<label for="" class="control-label">Alamat</label>
													<textarea name="alamat" class="form-control" placeholder="Alamat lengkap"></textarea>
												</div>
												<div class="form-group">
													<label for="" class="control-label">Daya Listrik</label>
													<select name="daya_listrik" class="form-control">
														<option disabled>Daya Listrik</option>
														<?php while ($daya = $data_listrik->fetch_assoc()) { ?>
															<option value="<?=$daya['id_daya'];?>"><?=number_format($daya['tegangan'],0,',','.'); ?> VA</option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<input type="submit" value="Simpan" class="btn btn-info">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<?php include 'footer.html'; ?>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="assets/js/script.js"></script>
		<script>
			$(document).ready(function(){
				$('#tambahUser').submit(function(e){
					e.preventDefault();
					$('#loading').html('<div class="loader mr-auto ml-auto"></div>');
					setTimeout(function(){
						$.ajax({
							type: "POST",
							url : "inc/add_user.php",
							data : $('#tambahUser').serialize(),
							success : function(data){
								if (data === 'success') {
									alert('Sukses menambah data');
									window.location.replace('index.php');
								}else{
									alert('Error: '+data);
									$('#loading').hide();
								}

							}
						})
					},2000);
				});
			});
		</script>
	</body>
</html>