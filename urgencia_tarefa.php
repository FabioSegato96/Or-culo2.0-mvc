<?php
	$acao = 'recuperarTarefasPendentes';
	require "../controllers/tarefa_controler.php";
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
			function editar(id, litros) {
				let form = document.createElement('form')
				form.action = '../controllers/tarefa_controler.php?acao=atualizar'
				form.method = 'post'
				form.className = 'row'
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'number'
				inputTarefa.name = 'litros'
				inputTarefa.className = 'form-control col-md-9'
				inputTarefa.value = litros

				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'btn btn-warning col-md-4'
				button.innerHTML = 'Realizar Coleta'

				form.appendChild(inputTarefa)

				form.appendChild(inputId)

				form.appendChild(button)

				let tarefa = document.getElementById('tarefa_'+id)

				tarefa.innerHTML = ''

				tarefa.insertBefore(form, tarefa[0])
			}
			function editarData(id) {
				let form = document.createElement('form')
				form.action = '../controllers/tarefa_controler.php?acao=updateData'
				form.method = 'post'
				form.className = 'row'
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'date'
				inputTarefa.name = 'data_remarcada'
				inputTarefa.className = 'form-control col-md-9'
				inputTarefa.value = ''

				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'btn btn-info col-md-4'
				button.innerHTML = 'Remarcar Coleta'

				form.appendChild(inputTarefa)

				form.appendChild(inputId)

				form.appendChild(button)

				let tarefa = document.getElementById('tarefa_'+id)

				tarefa.innerHTML = ''

				tarefa.insertBefore(form, tarefa[0])
			}
			function editarObs(id, obs) {
				let form = document.createElement('form')
				form.action = '../controllers/tarefa_controler.php?acao=atualizarObs'
				form.method = 'post'
				form.className = 'row'
				let inputTarefa = document.createElement('input')
				inputTarefa.type = 'text'
				inputTarefa.name = 'obs'
				inputTarefa.className = 'form-control col-md-9'
				inputTarefa.value = obs

				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'btn btn-info col-md-4'
				button.innerHTML = 'Inserir Obs'

				form.appendChild(inputTarefa)

				form.appendChild(inputId)

				form.appendChild(button)

				let tarefa = document.getElementById('tarefa_'+id)

				tarefa.innerHTML = ''

				tarefa.insertBefore(form, tarefa[0])
			}

			function remover(id) {

				location.href = 'pendente_tarefa.php?acao=remover&id=' + id;
			}
			function marcarRealizada(id) {

				location.href = 'pendente_tarefa.php?acao=marcarRealizada&id=' + id;	
			}
			function marcarUrgencia(id) {

				location.href = 'todas_tarefas.php?acao=marcarUrgencia&id=' + id;	
			}
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
				<div class="col-md-4 menu">
					<ul class="list-group">
						<li class="list-group-item strong"><a href="nova_tarefa.php" class="text-primary"><i class="fas fa-plus-square fa-lg mr-4"></i>Nova Coleta</a></li>
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
						<li class="list-group-item strong active">
							<a href="#" class="text-danger">
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

				<div class="col-sm-8">
					<div class="container pagina bg-light mb-2 rounded">
						<div class="row">
							<div class="col">
								<h4 class="text-danger"><i class="far fa-bell fa-lg mr-3"></i>Coletas Urgentes</h4>
								<hr />
						<?php if ($_SESSION['perfil'] == 0) {?>
							<?php foreach ($tarefas as $tarefa => $value) { ?>
								<?php if ($value['id_urgencia'] != 1) { ?>
									
							 		<div class="row mb-1 d-flex p-3 align-items-center tarefa border rounded p-2" style="background-color: #F5A9A9;">
									<div class="col-sm-9 text-dark" id="tarefa_<?=$value['id']?>">
										<p class="mb-0">	
											<span class="text-dark h4">Coleta N°</span>
											<span class="h4 text-danger"><?= $value['id']; ?></span>
											<span class="h4"> 
												<?php 
													switch($value['cidade']) {
														case 1: 
															echo '- Praia Grande';
															break;
														case 2: 
															echo '- Santos';
															break;
														case 3: 
															echo '- São Vicente';
															break;
														case 4: 
															echo '- Cubatão';
															break;
														case 5: 
															echo '- Mongaguá';
															break;
														case 6: 
															echo '- Itanhaém';
															break;
														case 7: 
															echo '- Litoral Sul';
															break;
														case 8: 
															echo '- Litoral Norte';
															break;														
													}
												?>
											</span>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Cliente:</span> 
											<span><?= $value['tarefa'] ?></span>
										</p>								
										<p class="mb-0">
											<span class="h6 text-primary">Endereço:</span>
											<?= $value['endereco'] ?>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Urgência:</span>
											<?php if($value['id_urgencia'] == 1) {
												echo '<span class="text-dark">Visita</span>';
											} else {
												echo '<span class="text-danger">Ligou</span>';
											}  ?>
										</p>
											<?php								
											if ($value['id_status'] == 1) {
												echo '<p class="mb-0 text-warning d-inline">
														<span class="h6 text-primary">Status:</span> Pendente
														</p>';
											} elseif ($value['id_status'] == 2) {
												echo '<p class="mb-0 text-success d-inline">
														<span class="h6 text-primary">Status:</span> Concluído
														</p>';
											}?>												
										<p class="mb-0">
											<span class="h6 text-primary">Agendada:</span>
											<?= $value['data_cadastrado'] ?>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Remarcada:</span>
											<?= $value['data_remarcada'] ?>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Litros:</span>
											<?= $value['litros'] ?>
										</p>									
										<p class="mb-0">
											<span class="h6 text-primary">Observação:</span>
											<?= $value['obs'] ?>
										</p>									
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<?php if($_SESSION['perfil'] == 0){ ?> 
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $value['id'] ?>)"></i>
										<?php } ?>
										<?php if ($value['id_status'] == 1) {?>
										<i class="far fa-calendar fa-lg text-dark" onclick="editarData(<?=$value['id']?>)"></i>
										<i class="fas fa-edit fa-lg text-info" onclick="editarObs(<?=$value['id']?>, '<?=$value['obs']?>')"></i>
										<?php if($value['id_urgencia'] == 1) {?>
										<i class="fas fa-phone fa-lg text-info" onclick="marcarUrgencia(<?= $value['id'] ?>)"></i>
										<?php } ?>		
										<i class="fas fa-tint fa-lg text-warning" onclick="editar(<?=$value['id']?>, <?=$value['litros']?>)"></i>
										
										<?php } ?>
									</div>
								</div>
									<hr>
									<?php } ?>
									<?php } ?>
						<?php } ?>
						<?php if ($_SESSION['perfil'] == 1) {?>		
							<?php foreach ($tarefas as $tarefa => $value) { ?>
								<?php if ($value['id_urgencia'] != 1) { ?>
								<?php if ($_SESSION['id'] == $value['id_user']) {?>
								<div class="row mb-1 d-flex align-items-center tarefa border rounded p-2" style="background-color: #F5A9A9;">
									<div class="col-sm-9 text-dark" id="tarefa_<?=$value['id']?>">
										<p class="mb-0">	
											<span class="text-dark h4">Coleta N°</span>
											<span class="h4 text-danger"><?= $value['id']; ?></span>
											<span class="h4"> - Praia Grande</span>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Cliente:</span> 
											<span><?= $value['tarefa'] ?></span>
										</p>								
										<p class="mb-0">
											<span class="h6 text-primary">Endereço:</span>
											<?= $value['endereco'] ?>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Urgência:</span>
											<?php if($value['id_urgencia'] == 1) {
												echo '<span class="h6 text-dark">Visita</span>';
											} else {
												echo '<span class="h6 text-danger">Ligou</span>';
											}  ?>
										</p>
											<?php								
											if ($value['id_status'] == 1) {
												echo '<p class="mb-0 text-warning d-inline">
														<span class="h6 text-primary">Status:</span> Pendente
														</p>';
											} elseif ($value['id_status'] == 2) {
												echo '<p class="mb-0 text-success d-inline">
														<span class="h6 text-primary">Status:</span> Concluído
														</p>';
											}?>												
										<p class="mb-0">
											<span class="text-primary h6">Agendada:</span>
											<?= $value['data_cadastrado'] ?>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Remarcada:</span>
											<?= $value['data_remarcada'] ?>
										</p>
										<p class="mb-0">
											<span class="h6 text-primary">Litros:</span>
											<?= $value['litros'] ?>
										</p>									
										<p class="mb-0">
											<span class="h6 text-primary">Observação:</span>
											<?= $value['obs'] ?>
										</p>									
									</div>
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										<?php if($_SESSION['perfil'] == 0){ ?> 
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $value['id'] ?>)"></i>
										<?php } ?>
										<?php if ($value['id_status'] == 1) {?>
										<i class="far fa-calendar fa-lg text-dark" onclick="editarData(<?=$value['id']?>)"></i>
										<i class="fas fa-edit fa-lg text-info" onclick="editarObs(<?=$value['id']?>, '<?=$value['obs']?>')"></i>		
										<i class="fas fa-tint fa-lg text-warning" onclick="editar(<?=$value['id']?>, <?=$value['litros']?>)"></i>
										
										<?php } ?>
									</div>
								</div>
									<hr>
									<?php } ?>
									<?php } ?>
							<?php } ?>
							<?php } ?>	
												
							</div>
						</div>
					</div>
				</div>

				
			</div>
		</div>
	</body>
</html>