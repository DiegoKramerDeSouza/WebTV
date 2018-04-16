<?php
	$headerHtml = "<!DOCTYPE html>
					<html>	
						<head>
							<meta charset='utf-8'>
							<meta http-equiv='X-UA-Compatible' content='IE=edge'>
							<meta name='viewport' content='width=device-width, initial-scale=1'>
														
							<title>WebTv</title>
							
							<link href='./css/getHTMLMediaElement.css' rel='stylesheet' />
							<link href='./css/bootstrap-theme.min.css' rel='stylesheet' />
							<link href='./css/bootstrap.min.css' rel='stylesheet' />
							<link href='./css/font-awesome.min.css' rel='stylesheet' />
							<link href='./css/style.css' rel='stylesheet' />
							
							<script src='./js/jquery-3.1.0.min.js'></script>
							<script src='./js/socket.io.js'></script>
							<script src='./js/getHTMLMediaElement.js'></script>
							<script src='./js/RTCMultiConnection.min.js'></script>
							<script src='./js/application.js'></script>
							<script src='./js/bootstrap.min.js'></script>
						</head>";
						
	$scriptsHtml = "";
					
	$bodyHeader = '<header>
					<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
						<div class="container">
							<div class="navbar-header">
								<a class="navbar-brand mb-3 h1" href="index.php">
									<span class="zf-green h3">WebTv</span>
								</a>
							</div>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerMain" aria-controls="navbarTogglerMain" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarTogglerMain">
								<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
									<li class="nav-item">
										<a class="nav-link" href=""><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="classroom.php"><i class="fa fa-desktop"></i> Sala de Aula</a>
									</li>
								</ul>
							</div>
						</div>
					</nav>
				</header>
				<div>
					<img id="backgroundLayer" src="img/skyline.jpg" />
				</div>';
				
	$bodyFooter = "<hr>
					<footer class='navbar text-light'>
						<p><span class='zf-green h5'>WebTv</span> &copy; 2018 Intelit - Todos os direitos reservados.</p>
					</footer>";

	
?>