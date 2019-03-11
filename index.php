<?php
	session_start();
	include 'config.php';
	if (!isset($_SESSION['user'])) {
		header("location: login.php");
	}
	$no=1;
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
		<title><?=$config['webname'];?> - Dashboard</title>
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
				<?php include 'header.html'; ?>
				<div class="my-3 my-md-5">
					<div class="container">
						<div class="page-header">
							<h1 class="page-title">
							Dashboard
							</h1>
						</div>
						<div class="row row-cards row-deck">
							<div class="col-12">
								<?php if (empty(isset($_GET['q']))): ?>
									<div id="content"></div>
								<?php else: ?>
									<?php include 'search_user.php'; ?>
								<?php endif ?>
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
</body>
</html>