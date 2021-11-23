<?php
	
	$acao = 'pesquisarRelatorioCarro';
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
			          <a href="../config/logoff.php" class="nav-link text-white btn btn-danger btn-block m-1">
			          	<i class="fas fa-sign-out-alt fa-lg"></i>
			          </a>
			        </li>
				</ul>
			</div>
		</nav>

		<div class="container app">
			<div class="row">

				<a href="relatorio.php" class="btn btn-dark ml-3 mb-3"><i class="fas fa-long-arrow-alt-left fa-lg text-light"></i>
Controle Gerencial</a>
				
				<div class="col-sm-12">
					<div class="container pagina bg-light mb-2 rounded">
						<div class="row">
							<div class="col">
								<h4 class="text-dark"><i class="fas fa-chart-pie fa-lg mr-3"></i>Relatório de Coletas</h4>
								<hr />
								<div class="row m-4 justify-content-center">									
									<h4 class="text-center text-dark">Kombi:</h4>

									<div class="col-sm-5 bg-warning border rounded text-dark text-center">
										<h4 class="text-dark">Coletas Pendentes</h4>
										<h3>
											<?php if ($total_pendente_kombi[0]['total_pendente_kombi'] <= 10) {
												echo '0' . $total_pendente_kombi[0]['total_pendente_kombi']; 
											} else { 
											 	echo $total_pendente_kombi[0]['total_pendente_kombi']; 
											}	
											?>
										</h3>	
									</div>
									<div class="col-sm-5 bg-danger border rounded text-dark text-center">
										<h4 class="text-dark">Coletas Urgentes</h4>
										<h3>
											<?php if ($total_urgente_kombi[0]['total_urgente_kombi'] <= 10) {
												echo '0' . $total_urgente_kombi[0]['total_urgente_kombi']; 
											} else { 
											 	echo $total_urgente_kombi[0]['total_urgente_kombi']; 
											}	
											?>	
										</h3>	
									</div>
								</div>
								<div class="row m-4 justify-content-center">

									<h4 class="text-center text-dark">Strada:</h4>

									<div class="col-sm-5 bg-warning border rounded text-dark text-center">
										<h4 class="text-dark">Coletas Pendentes</h4>
										<h3>
											<?php if ($total_pendente_strada[0]['total_pendente_strada'] <= 10) {
												echo '0' . $total_pendente_strada[0]['total_pendente_strada']; 
											} else { 
											 	echo $total_pendente_strada[0]['total_pendente_strada']; 
											}	
											?>
										</h3>	
									</div>
									<div class="col-sm-5 bg-danger border rounded text-dark text-center">
										<h4 class="text-dark">Coletas Urgentes</h4>
										<h3>

											<?php if ($total_urgente_strada[0]['total_urgente_strada'] <= 10) {
												echo '0' . $total_urgente_strada[0]['total_urgente_strada']; 
											} else { 
											 	echo $total_urgente_strada[0]['total_urgente_strada']; 
											}	
											?>
												
										</h3>	
									</div>
								</div>
								<hr>
								<h5 class="text-center">Pesquisa coletas <span class="text-primary">Carros</span>:</h5>
								<form action="../controllers/relatorio_controler.php?acao=getDataPesquisaCarro" method="post" class="row justify-content-center">
									<input class="ml-3 form-control col-md-4 align-self-center" type="date" name="data_pesquisa" id="data_pesquisa">
									<select name="id_user" class=" ml-3 form-control col-md-4 align-self-center" value="0">
											<option value="2">Kombi</option>
											<option value="3">Strada</option>
										</select>		
									<button id="pesquisa" type="submit" class="btn btn-lg col-md-2 ml-4 btn-info" >Pesquisar</button>
								</form>
								<hr />						
								
								<?php if ($_SESSION['perfil'] == 0) {?>

										<div class="table-responsive">
									      <table class="table table-striped table-bordered table-sm">
									      <thead class="thead-dark">
									        <tr>
									        	<th>Status</th>			
									          <th>Coleta n°</th>
									          <th>Cliente</th>
									          <th>Data Cadastrada</th>
									          <th>Data Coleta</th>
									          <th>Litros</th>
									          <th class="text-primary">Carro</th>
									          <th>Obs</th>
									        </tr>
									      </thead>
									  										  
									<?php foreach ($relatorio_coletado as $key => $value) { ?>
															 								
								      <tbody class="text-center">
								        <tr>
								         <td><?php if($value['id_status'] == 1){
								         	echo '<span class="text-warning">Pendente</span>';
								         }else{
								         	echo '<span class="text-success">Concluído</span>';
								         } ?>								         	
								         </td>	
								          <td><?= $value['id'] ?></td>
								          <td><?= $value['tarefa'] ?></td>
								          <td><?= $value['data_cadastrado'] ?></td>
								          <td><?= $value['data_coleta'] ?></td>
								          <td><?= $value['litros'] ?></td>
								          <td><?php if ($value['id_user'] == 2) {
								          			echo "Kombi";
								          		} else {
								          			echo "Strada";
								          		}?>								          	
								          </td>
								          <td><?= $value['obs'] ?></td>
								        </tr>							        
								     </tbody>
								     </div>
								  													
									</div>								
								</div>
								</div>								
									<?php } ?>
									<thead class="thead-dark">
									        <tr>
									        	<th class="text-center">-</th>			
									          <th class="text-center"><?= $relatorio_contagem[0]['qtdColeta']; ?></th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									          <th class="text-center"><?= $relatorio_soma[0]['litrosColeta']; ?></th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									        </tr>
									      </thead>
								<?php } ?>													
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>