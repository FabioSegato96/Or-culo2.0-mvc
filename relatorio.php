<?php
	$acao = 'recuperarTotais';
	require "../controllers/relatorio_controler.php";
	require "../config/validador_acesso.php";
?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Oráculo2.0</title>
		<link rel="shortcut icon" type="imagex/png" href="../public/imagens/portal_oraculo.ico">
		<link rel="stylesheet" href="../public/css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

		<!--Jquery e regras-->
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script src="../public/js/regras.js"></script>
		<style type="text/css">
			@font-face{font-family: "Adventure";
			src: url(../public/fontes/unbutton.woff) ;}		

			#tituloOraculo{
				font-size: 1.5em;
				font-family: "Adventure";
			}
			body{font-family: FreeMono, monospace;}
		</style>
		<script>
			
		</script>
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
			          <a href="../config/logoff.php" class="nav-link text-white btn btn-danger btn-block m-1"><i class="fas fa-sign-out-alt fa-lg"></i>
			          </a>
			        </li>
				</ul>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-4 menu">
					<ul class="list-group">
						<li class="list-group-item strong"><a href="nova_tarefa.php" class="text-primary"><i class="fas fa-plus-square fa-lg mr-4"></i>Nova Coleta</a></li>
						<li class="list-group-item">
							<a href="pendente_tarefa.php" class="text-warning">
								<i class="fas fa-truck fa-lg mr-4"></i>
								Coletas Pendentes
							</a>
							<?php if ($_SESSION['perfil'] != 0) { ?>
								<span class="ml-5 h5 text-dark bg-warning rounded-circle p-1">
									<?= '0' . $contadorPendente[0]['total_pendente']; ?>						
								</span>
							<?php } ?>
						</li>
						<li class="list-group-item strong">
							<a href="urgencia_tarefa.php" class="text-danger">
								<i class="fas fa-bell fa-lg mr-4"></i>  
								Coletas Urgentes   
							</a>
							<?php if ($_SESSION['perfil'] != 0) { ?>
								<span class="ml-5 h5 text-dark bg-danger rounded-circle p-1"><?= '0' . $contadorUrgente[0]['total_urgente']; ?>
								</span>
							<?php } ?>	
						</li>	
						<li class="list-group-item strong"><a href="concluida_tarefa.php" class="text-success"><i class="fas fa-check-square fa-lg mr-4"></i>Coletas Concluídas</a></li>
						<?php if ($_SESSION['perfil'] == 0) { ?>
							<li class="list-group-item strong active"><a href="relatorio.php"><i class="fas fa-chart-pie fa-lg mr-2"></i>Controle Gerencial</a></li>
						<?php } ?>
					</ul>
				</div>

				<div class="col-sm-8">
					<div class="container pagina bg-light mb-2 rounded">
						<div class="row">
							<div class="col">
								<h4 class="text-dark"><i class="fas fa-chart-pie fa-lg mr-3"></i>Controle Gerencial</h4>
								<h4 class="text-center text-dark">Total de Coletas:</h4>
								<div class="row m-4 justify-content-center">

									

									<div class="col-sm-5 bg-warning border rounded text-dark text-center">
										<h4 class="text-dark">Coletas Pendentes</h4>
										<h3>
											<?php if ($total_pendente[0]['count(id_status)'] <= 10) {
												echo '0' . $total_pendente[0]['count(id_status)']; 
											} else { 
											 	echo $total_pendente[0]['count(id_status)']; 
											}	
											?>
										</h3>	
									</div>
									<div class="col-sm-5 bg-danger border rounded text-dark text-center">
										<h4 class="text-dark">Coletas Urgentes</h4>
										<h3>
											<?php if ($total_urgente[0]['count(id_status)'] <= 10) {
												echo '0' . $total_urgente[0]['count(id_status)']; 
											} else { 
											 	echo $total_urgente[0]['count(id_status)']; 
											}	
											?>
												
										</h3>	
									</div>
								</div>

								<hr />
								<h4 class="text-center text-dark">Relatório Coletas:</h4>		
								
									<div class="row justify-content-center">
										<div class="col-sm-6">	
											<ul class="list-group text-center">
											  <li class="list-group-item text-warning">						  	
											  	<a href="relatorio_cadastrado.php" class="text-warning h4">
												<i class="far fa-calendar fa-lg"></i>
												Data de Cadastro</a>
											</li>
											  <li class="list-group-item text-success">							  	
											  	<a href="relatorio_coletado.php" class="h4 text-success">
											  	<i class="far fa-calendar fa-lg"></i>	
											  	Data de Coleta</a>
											  </li>
											  <li class="list-group-item text-info">						  	
											  	<a href="relatorio_mensal.php" class="h4 text-secondary">
											  	<i class="far fa-calendar fa-lg"></i>	
											  	Relatório Mensal</a>
											  </li>
											  <li class="list-group-item">
											  	<a href="relatorio_carro.php" class="h4 text-info"> 		
												<i class="fas fa-car fa-lg"></i>

												Relatório Carro</a>
												</li>
											 </ul>
										</div>		
									</div>
									<hr>
									<h4 class="text-center text-dark">Recursos Humanos:</h4>

									<div class="row justify-content-center">
										<div class="col-sm-6">	
											<ul class="list-group text-center">
											  <li class="list-group-item text-primary">
											  <i class="fas fa-user-plus fa-lg"></i>
												<a href="novo_funcionario.php" class="h4 text-primary">Novo Funcionário</a>	
												</li>
											  <li class="list-group-item text-secondary">
											  	<i class="far fa-id-card fa-lg"></i>
											  	<a href="lista_funcionario.php" class="h4 text-secondary">Lista Funcionários</a>
											  </li>
											  <li class="list-group-item text-danger">
											  	<i class="fas fa-hand-holding-usd fa-lg"></i>
											  	<a href="novo_desconto.php" class="h4 text-danger">Novo Desconto</a>
											  </li>
											</ul>
										</div>		
									</div>
									<hr>
									<h4 class="text-center text-dark">Clientes:</h4>

									<div class="row justify-content-center">
										<div class="col-sm-6">	
											<ul class="list-group text-center">
											  <li class="list-group-item text-primary">
											  <i class="fas fa-plus-square fa-lg"></i>
												<a href="novo_cliente.php" class="h4 text-primary">Novo Cliente</a>	
												</li>
											  <li class="list-group-item text-secondary">
											  	<i class="far fa-id-card fa-lg"></i>
											  	<a href="cliente_lista.php" class="h4 text-secondary">Lista Clientes</a>
											  </li>
											  </ul>
										</div>		
									</div>
				</div>
		</div>
	</body>
</html>