<?php
	$acao = 'recuperarTarefasPendentes';
	require "../config/validador_acesso.php";
	require "../controllers/tarefa_controler.php"
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Oráculo2.0</title>

		<link rel="shortcut icon" type="imagex/png" href="../public/imagens/portal_oraculo.ico">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="stylesheet" href="../public/css/estilo.css">
		<style type="text/css">
			@font-face{font-family: "Adventure";
			src: url(../public/fontes/unbutton.woff) ;}		

			#tituloOraculo{
				font-size: 1.5em;
				font-family: "Adventure";
			}
			body{font-family: FreeMono, monospace;}
		</style>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light" style="background-color: #DDF5DD">
			<div class="container">
				<a class="navbar-brand h6" href="#">
					<img src="../public/imagens/logo2.png" width="60" height="50" class="d-inline-block align-top" alt="">
					<span class="ml-4" id="tituloOraculo">
						Oraculo 2.0
					</span>
				</a>
				<ul class="navbar-nav">
					<li class="text-primary nav-item ml-5 font-weight-bold">
						<?php echo '<i class="far fa-user fa-lg"></i><span class="ml-2">' . $_SESSION['nome'] . ' </span>'; ?>
												
					</li> 
				</ul>
				<ul class="navbar-nav">  
			        <li class="nav-item">
			          <a href="../config/logoff.php" class="nav-link text-white btn btn-danger btn-block m-1">
			          	<i class="fas fa-sign-out-alt fa-lg"></i>
			          </a>
			        </li>
				</ul>
			</div>
		</nav>

		<?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>
			<div class="bg-success pt-2 text-light d-flex justify-content-center">
				<h5>Coleta registrada com sucesso!</h5>
			</div>
		<?php } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-4 menu">
					<ul class="list-group">
						<li class="list-group-item strong active"><a href="#" class="text-primary"><i class="fas fa-plus-square fa-lg mr-4"></i>Nova Coleta</a></li>
						<li class="list-group-item">
							<a href="pendente_tarefa.php" class="text-warning">
								<i class="fas fa-truck fa-lg mr-3"></i>
								Coletas Pendentes
							</a>
							<?php if ($_SESSION['perfil'] != 0) { ?>
								<span class="ml-5 h5 text-dark bg-warning rounded-circle p-1">
									<?php if ($contadorPendente[0]['total_pendente'] >= 10) {
										echo $contadorPendente[0]['total_pendente'];
									} else {
										echo '0' . $contadorPendente[0]['total_pendente'];
									} ?>						
								</span>
							<?php } ?>
						</li>
						<li class="list-group-item strong">
							<a href="urgencia_tarefa.php" class="text-danger">
								<i class="fas fa-bell fa-lg mr-4"></i>  
								Coletas Urgentes   
							</a>
							<?php if ($_SESSION['perfil'] != 0) { ?>
								<span class="ml-5 h5 text-dark bg-danger rounded-circle p-1">
									<?php if ($contadorUrgente[0]['total_urgente'] >= 10) {
										echo $contadorUrgente[0]['total_urgente'];
									} else {
										echo '0' . $contadorUrgente[0]['total_urgente'];
									} ?>
								</span>
							<?php } ?>	
						</li>	
						<li class="list-group-item strong"><a href="concluida_tarefa.php" class="text-success"><i class="fas fa-check-square fa-lg mr-4"></i>Coletas Concluídas</a></li>
						<?php if ($_SESSION['perfil'] == 0) { ?>
							<li class="list-group-item strong"><a href="relatorio.php"><i class="fas fa-chart-pie fa-lg mr-3"></i>Relatório Gerencial</a></li>
						<?php } ?>
					</ul>
				</div>

				<div class="col-md-8">
					<div class="container pagina bg-light rounded">
						<div class="row">
							<div class="col">
								<h4 class="text-primary"><i class="fas fa-plus-square fa-lg mr-3"></i>Nova Coleta</h4>
								<hr />

								<form method="post" action="../controllers/tarefa_controler.php?acao=inserir">
									<div class="form-group">
										<label>Cliente:</label>
										<input type="text" class="form-control" name="tarefa" placeholder="Exemplo: Restaurante da Batata">
										<label>Endereço:</label>
										<input type="text" class="form-control" name="endereco" placeholder="Exemplo: Av. Pres. Kennedy">
										<label for="cidade">Cidade:</label>
										<select name="cidade" class="form-control">
											<option value="1">Praia Grande</option>
											<option value="2">Santos</option>
											<option value="3">São Vicente</option>
											<option value="4">Cubatão</option>
											<option value="5">Mongaguá</option>
											<option value="6">Itanhaém</option>
											<option value="7">Litoral Sul</option>
											<option value="8">Litoral Norte</option>							
										</select>				
										<label>Observação:</label>
										<input type="text" class="form-control" name="obs" placeholder="Exemplo: Troca produto / Pix">
										<?php if($_SESSION['perfil'] == 0) { ?>									
										<label for="id_user">Carro:</label>
										<select name="id_user" class="form-control" value="<?= $_SESSION['id'] ?>">
											<option value="2">Kombi</option>
											<option value="3">Strada</option>
										</select>							
										<?php } ?>
										<br>
										<label>ligou:</label>
										<br>
										<input value="2" type="checkbox" name="id_urgencia">
										<?php if($_SESSION['perfil'] == 1) { ?>
										<input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
										<?php } ?>	
									</div>
									<?php if(isset($_GET['erro']) && $_GET['erro'] == '6'){?>
                    <div class="text-warning mb-2">Preencha os campos obrigatórios: Cliente e Endereço.</div>
                  <?php };?>

									<button class="btn btn-primary">Cadastrar</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>