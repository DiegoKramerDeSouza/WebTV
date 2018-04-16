<?php
	if(session_id() == '') {
		session_start();
	}
	if(isset($_SESSION['active'])){
		if($_SESSION['active']){
			if(!(isset($_SESSION['id']) && isset($_SESSION['nome']) && isset($_SESSION['escola']))){
				header("location:logout.php");
			}
		} else {
			header("location:logout.php");
		}
	} else {
		header("location:logout.php");
	}
	require_once 'structure.php';
	
	echo $headerHtml;
	
	$display = '';
	$collum = 'col-md-6';
	$alunoExit = '';
	$profExit = "<a href='logout.php' class='btn btn-danger'>Sair</a>";
	if($_SESSION['grupo'] != 'Professor'){
		$display = 'd-none';
		$collum = '';
		$alunoExit = "<a href='logout.php' class='btn btn-danger btn-sm'>Sair</a>";
		$profExit = '';
	}
?>
<body>
	<?php
		echo $bodyHeader;
	?>
	<div class='container'>
		<div class="jumbotron">
			<div class='row mt-4'>
				<div id='opend-rooms' class='col-sm-12 <?php echo $collum; ?>'>
					<h1>Bem vindo ao <span class="zf-green">WebTv</span></h1>
					<h4 class='row'>
						<span class='col-sm-8'>Salas disponíveis</span>
						<span class='col-sm-4 text-right'><?php echo $alunoExit; ?></span>
					</h4>
					<hr>
					<div id='public-conference'>
						<div class="text-center zf-green mt-5">
							<div class="h6">Encontrando salas...</div>
							<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
							<span class="sr-only">Aguarde...</span>
						</div>
						<!--Salas disponíveis-->
					</div>
				</div>
				<div id='teacher-access' class='col-sm-12 col-md-6 <?php echo $display; ?>'>
					<div class='card bg-light'>
						<h5 class='card-header'>
							<i class='fa fa-desktop'></i> Nova sala de aula:
						</h5>
						<div class='card-body'>
							<div class='card-title'>
								<h3 class='panel-heading'>Criar sala de aula</h3>
							</div>
							<div class='form-group'>
								<form id='criar-sala' action='#' method='POST'>
									<div class='form-group'>
										<label for='materia'><i class='fa fa-book'></i> Nome da Matéria:</label>
										<input type='text' class='form-control' id='materia' />
									</div>
									<div class='form-group'>
										<label for='assunto'><i class='fa fa-tag'></i> Assunto da Aula:</label>
										<input type='text' class='form-control' id='assunto' />
									</div>
									<hr>
									<div class='text-right'>
										<?php echo $profExit; ?>
										<input type='submit' id='btn-join-as-teacher' class='btn btn-success' value='Criar Sala' />
									</div>
									<input type='hidden' id='room-id' />
								</form>
							</div>
							
						</div>
					</div>
				</div>
				<input type='hidden' id='codEscola' value='<?php echo $_SESSION['cod'];?>' />
				<input type='hidden' id='meuNome' value='<?php echo $_SESSION['nome'];?>' />
			</div>
			<div class=''>
				<!--Video Panel-->
				<div id='video-panel' class='row d-none'>
					<!--Painel de Debug-->
					<div class='hidden-panel'>
						<input type='hidden' id='connected-class' readonly />
						<input type='hidden' id='connected-content' readonly />
						<input type='hidden' id='current-user' value='<?php echo $_SESSION['nome'];?>' readonly />
					</div>
					<div class='col-sm-12 col-md-8'>
						<!--Card de vídeo e chat-->
						<div class='card'>
							<div id='class-suptitle' class='card-header'>
								<i class="fa fa-circle zf-green"></i>
								<span id='class-title'>
									<!--Título da aula - Matéria (Assunto)-->
								</span>
							</div>
							<div class='card-body'>
								<div class='row'>
									<div class='col-sm-12'>
										<div id='room-urls'>
											<!--Definições da Sala-->
										</div>
										<div id='main-video' class='inroom mainView'>
											<!--Vídeo principal-->
											<div id='div-connect'>
												<div class='h6 zf-green text-center'>
													Conectando...
												</div>
												<div class="progress">
													<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="100" aria-valuemax="100" style="width: 100%"></div>
												</div>
											</div>
										</div>
									</div>
									<!--Formação de chat-->
									<div class='col-sm-12'>
										<div class='form-row mt-4 mb-4'>
											<div class='col-10'>
												<!--Input de mensagem-->
												<input type='text' id='text-message' class='form-control w-100' />
											</div>
											<div class='col text-right'>
												<!--Botão de envio-->
												<a id='send-message-btn' class='btn btn-info' style='width:100%;'><i class='fa fa-send text-light'></i></a>
											</div>
										</div>
										<div class='card light-bg'>
											<!--Output de mensagem-->
											<textarea class='form-control bg-light' disabled rows='6' id='chat-panel'></textarea>
										</div>
									</div>    
								</div>
							</div>
							<div id='teacher-name' class='card-footer text-center'>
								<h5>Prof. <span id='prof-room-name'></span></h5>
							</div>
						</div>
					</div>
					<!--Painel com os vídeos dos espectadores-->
					<div class='col-sm-12 col-md-4' style='display:block;'>
						<div id='class-video' class='inroom otherView'>
							<!--Outros vídeos-->
						</div>
					</div>
				</div> 
			</div>
		</div>
		
	<?php
		echo $bodyFooter;
	?>
	</div>

</body>

</html>