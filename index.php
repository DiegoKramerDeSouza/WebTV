<?php
	require_once 'structure.php';
	echo $headerHtml;
?>
<body>
	<?php
		echo $bodyHeader;
	?>
	<div class='container'>
		<div class="jumbotron">
			<div class='row'>
				<div class='col-sm-12 col-md-6'>
					<h1>Bem vindo ao <span class="zf-green">WebTv</span></h1>
					<hr>
					<h4>
						<i class='zf-green fa fa-users'></i> Alunos e professores, seu acesso começa aqui.
					</h4>
				</div>
				<div class='col-sm-12 col-md-6'>
					<div class='card'>
						<h5 class='card-header'><i class='fa fa-sign-in'></i> Acesso</h5>
						<div class='card-body'>
							<form id='login' action='access.php' method='POST'>
								<div class='form-group'>
									<label for='user'><i class='fa fa-user fa-lg'></i> Usuário:</label>
									<input type='text' placeholder='Matrícula do Usuário' class='form-control' name='user' id='user' />
								</div>
								<div class='form-group'>
									<label for='pwd'><i class='fa fa-lock fa-lg'></i> Senha:</label>
									<input type='password' placeholder='Senha do Usuário' class='form-control' name='pwd' id='pwd' />
								</div>
								<hr>
								<div class='text-right'>
									<input type='submit' id='access' class='btn btn-success' value='Entrar' />
								</div>
							</form>
						 
							<div class=''>
								<input type='hidden' id='btn-join-as-teacher' />
								<input type='hidden' id='room-id' />
								<input type='hidden' id='public-conference' />
							</div>
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