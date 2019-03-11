<?php 
	session_start();
	include 'config.php';
	if (isset($_SESSION['user'])) {
		header("location: index.php");
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
    <title>Login - tabler.github.io - a responsive, flat and full featured admin template</title>
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
    <!-- <script src="http://localhost/dist/js/jquery-3.3.1.min.js"></script> -->
  </head>
  <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="./demo/brand/tabler.svg" class="h-6" alt="">
              </div>
              <form class="card" id="loginForm">
                <div class="card-body p-6">
                  <div class="card-title">Login to your account</div>
                  <span id="load" class="text-center"></span>

                  <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter username" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label">
                      Password
                    </label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" />
                      <span class="custom-control-label">Remember me</span>
                    </label>
                  </div>
                  <div class="form-footer">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="http://localhost/dist/js/jquery-3.3.1.min.js"></script>
    <script>
    	$(document).ready(function(){
    		$('#loginForm').submit(function(e){
    			e.preventDefault();
    			$('#load').html('<div class="ml-auto mr-auto loader"></div>');
    			setTimeout(function(){
    				$.ajax({
    					type : "POST",
    					url : "loginjs.php",
    					data : $('#loginForm').serialize(),
    					success : function(data){
    						if (data === 'success') {
    							$('#load').html('<p class="alert alert-success"><i class="fe fe-info"></i> Success Login. Redirecting...</p>');
    							setTimeout(function(){
    								window.location.replace('index.php')
    							},1000);
    						}else if(data === 'failed'){
    							$('#load').html('<p class="alert alert-danger"><i class="fe fe-info"></i> Wrong Password!</p>');
    						}else if(data === 'unknown'){
    							$('#load').html('<p class="alert alert-danger"><i class="fe fe-info"></i> Username tidak terdaftar!</p>');
    						}else{
    							alert('Error Status: '+data);
    						}
    					}
    				})
    			},2000);
    		});4
    	});
    	
    </script>
  </body>
</html>