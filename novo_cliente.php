<?php
	require "../config/validador_acesso.php";
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

		<?php if( isset($_GET['status']) && $_GET['status'] == 'ok') { ?>
			<div class="bg-success pt-2 text-light d-flex justify-content-center">
				<h5>Cliente cadastrado com sucesso!</h5>
			</div>
		<?php } ?>

		<div class="container app mb-2">
			<div class="row justify-content-center">

			
<div class="col-sm-7">
	<a href="relatorio.php" class="btn btn-dark ml-2 mb-3"><i class="fas fa-long-arrow-alt-left fa-lg text-light"></i>
Controle Gerencial</a>
					<div class="container pagina bg-light mb-2 rounded">
			<div class="row justify-content-center">
				
				<div class="col-md-10">
					<div class="container pagina bg-light rounded">
						<div class="row">
							<div class="col">
								<h4 class="text-primary"><i class="fas fa-plus-square fa-lg mr-3"></i>Novo Cliente</h4>
								<hr />

								<form method="post" action="../controllers/cliente_controler.php?acao=inserirCliente">
									<div class="form-group">
										<label>Cliente:</label>
										<input type="text" class="form-control" name="cliente" placeholder="Exemplo: Restaurante da Batata">
										<label>Responsável:</label>
										<input type="text" class="form-control" name="responsavel" placeholder="Exemplo: Joaquim Almeida">
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
										<label>Pix:</label>
										<input type="text" class="form-control" name="pix" placeholder="Insira o pix">
										<label>Email:</label>
										<input type="email" class="form-control" name="email" placeholder="Exemplo@Exemplo.com">
										<label>Telefone:</label>
										<input type="tel" class="form-control" name="tel" placeholder="(xx) xxxx-xxxx">
										<label>Celular:</label>
										<input type="tel" class="form-control" name="cel" placeholder="(xx) xxxxx-xxxx">
										<label>LeadTime:</label>
										<input type="number" class="form-control" name="leadtime" placeholder="00">			
										<label>Observação:</label>
										<input type="text" class="form-control" name="obs" placeholder="Insira a observação">										
									</div>
									<?php if(isset($_GET['erro']) && $_GET['erro'] == '6'){?>
                    <div class="text-warning mb-2">Preencha os campos obrigatórios!</div>
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