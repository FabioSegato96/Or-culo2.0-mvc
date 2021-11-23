<?php
	
	$acao = 'recuperarClientes';
	require "../controllers/cliente_controler.php";
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
								<h4 class="text-dark"><i class="fas fa-handshake fa-lg mr-3"></i>
Clientes</h4>
								<hr />
								<h5 class="text-center">Lista de Clientes:</h5>
								
								<hr />						
								
								<?php if ($_SESSION['perfil'] == 0) {?>

										<div class="table-responsive">
									      <table class="table table-striped table-bordered table-sm">
									      <thead class="thead-dark">
									        <tr>
									        	<th>Cliente</th>
									        	<th>Responsável</th>			
									          <th>Endereço</th>
									          <th>Cidade</th>
									          <th>Pix</th>
									          <th>Email</th>
									          <th>Tel</th>
									          <th>Cel</th>
									          <th>Leadtime</th>
									          <th>Obs</th>
									        </tr>
									      </thead>
									  										  
									<?php foreach ($clientes_bd as $key => $value) { ?>
															 								
								      <tbody class="text-center">
								        <tr>
								         <td><?= $value['cliente'] ?></td>	
								          <td><?= $value['responsavel'] ?></td>
								          <td><?= $value['endereco'] ?></td>
								          <td>
								          	<?php 
													switch($value['cidade']) {
														case 1: 
															echo 'Praia Grande';
															break;
														case 2: 
															echo 'Santos';
															break;
														case 3: 
															echo 'São Vicente';
															break;
														case 4: 
															echo 'Cubatão';
															break;
														case 5: 
															echo 'Mongaguá';
															break;
														case 6: 
															echo 'Itanhaém';
															break;
														case 7: 
															echo 'Litoral Sul';
															break;
														case 8: 
															echo 'Litoral Norte';
															break;							
													}
												?>
								          </td>
								          <td><?= $value['pix'] ?></td>
								          <td><?= $value['email'] ?></td>
								          <td><?= $value['tel'] ?></td>
								          <td><?= $value['cel'] ?></td>
								          <td><?= $value['leadtime'] ?></td>
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
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
									          <th class="text-center">-</th>
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