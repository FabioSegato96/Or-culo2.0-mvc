<?php
require "../models/cliente_model.php";
require "../models/cliente_service.php";
require "../config/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if ($acao == 'inserirCliente') {

	if ($_POST['cliente'] != '' && $_POST['endereco'] != '' && $_POST['cidade'] != '' && $_POST['pix'] != '' && $_POST['email'] != '' && $_POST['cel'] != '' && $_POST['tel'] != '' && $_POST['leadtime'] != '' && $_POST['responsavel'] != '') {

		$cliente = new Cliente();
		$conexao = new Conexao();
		$clienteService = new clienteService($conexao, $cliente);	

		$cliente->__set('cliente', $_POST['cliente']);
		$cliente->__set('endereco', $_POST['endereco']);
		$cliente->__set('cidade', $_POST['cidade']);
		$cliente->__set('pix', $_POST['pix']);
		$cliente->__set('email', $_POST['email']);
		$cliente->__set('obs', $_POST['obs']);
		$cliente->__set('tel', $_POST['tel']);
		$cliente->__set('cel', $_POST['cel']);
		$cliente->__set('responsavel', $_POST['responsavel']);
		$cliente->__set('leadtime', $_POST['leadtime']);

		$clienteService->inserirCliente();
		header('Location: ../views/novo_cliente.php?status=ok');
		} else {
		header('Location: ../views/novo_cliente.php?erro=6');	
		} 		
} else if($acao == 'recuperarClientes') {
		$cliente = new Cliente();
		$conexao = new Conexao();
		$clienteService = new clienteService($conexao, $cliente);
		$clientes_bd = $clienteService->recuperarClientes();		
} 	
?>