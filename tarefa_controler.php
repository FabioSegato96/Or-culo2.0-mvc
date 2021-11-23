<?php
require "../models/tarefa_model.php";
require "../models/tarefa_service.php";
require "../config/conexao.php";
require "../config/validador_acesso.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if ($acao == 'inserir') {

	if ($_POST['tarefa'] != '' && $_POST['endereco'] != '' && $_POST['id_user'] != '' && $_POST['cidade'] != '') {

		$dataAtual = date('Y-m-d');

		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', ucfirst($_POST['tarefa']));
		$tarefa->__set('endereco', ucfirst($_POST['endereco']));		
		$tarefa->__set('obs', ucfirst($_POST['obs']));
		$tarefa->__set('id_user', ucfirst($_POST['id_user']));
		$tarefa->__set('cidade', ucfirst($_POST['cidade']));
		$tarefa->__set('data_cadastro', $dataAtual);
		if(isset($_POST['id_urgencia'])){
		$tarefa->__set('id_urgencia', $_POST['id_urgencia']);
		} else {
		$tarefa->__set('id_urgencia', 1);	
		}
		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa);
		$tarefaService->inserir();

		header('Location: ../views/nova_tarefa.php?inclusao=1');
	}else{ 
		header('Location: ../views/nova_tarefa.php?erro=6');
	}
} else if ($acao == 'recuperar') {
	$tarefa = new Tarefa();
	$conexao = new Conexao();
	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefa->__set('id_user', $_SESSION['id']);
	$tarefas_bd = $tarefaService->recuperar();
	$contadorPendente = $tarefaService->getTotalPendente();
	$contadorUrgente = $tarefaService->getTotalUrgente();


} elseif ($acao == 'atualizar') {	
	$dataAtual = date('Y-m-d');
	$tarefa = new Tarefa();
	$tarefa->__set('id', $_POST['id']);
	$tarefa->__set('litros', $_POST['litros']);
	$tarefa->__set('id_status', 2);
	$tarefa->__set('data_coleta', $dataAtual);

	$conexao = new Conexao();
	$tarefaService = new TarefaService($conexao, $tarefa);
	if ($tarefaService->atualizar()) {
		header('Location: ../views/pendente_tarefa.php');
	}
} elseif ($acao == 'remover') {

	$tarefa = new Tarefa();
	$tarefa->__set('id', $_GET['id']);

	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefaService->remover();
	header('Location: ../views/concluida_tarefa.php');
} elseif ($acao == 'recuperarTarefasPendentes') {
	
	$tarefa = new Tarefa();
	$tarefa->__set('id_status', 1);
	$conexao = new Conexao();
	$tarefa->__set('id_user', $_SESSION['id']);

	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefas = $tarefaService->recuperarTarefasPendentes();
	$contadorPendente = $tarefaService->getTotalPendente();
	$contadorUrgente = $tarefaService->getTotalUrgente();
	
} elseif ($acao == 'atualizarObs') {
	
	$tarefa = new Tarefa();
	$tarefa->__set('id', $_POST['id']);
	$tarefa->__set('obs', $_POST['obs']);

	$conexao = new Conexao();
	$tarefaService = new TarefaService($conexao, $tarefa);
	if ($tarefaService->atualizarObs()) {
		header('Location: ../views/pendente_tarefa.php');
	} 
} elseif ($acao == 'updateData') {
	$dataAtual = date('Y-m-d');
	$data_remarcada = str_replace('-', '/', $_POST['data_remarcada']);
	$divisor = explode('/', $data_remarcada);
	$divisor = array_reverse($divisor);
	$divisor = implode('/', $divisor);
	$tarefa = new Tarefa();
	$tarefa->__set('id', $_POST['id']);
	$tarefa->__set('data_remarcada', $divisor);
	$tarefa->__set('id_status', 2);
	$tarefa->__set('data_coleta', $dataAtual);
	
	$conexao = new Conexao();
	$tarefaService = new TarefaService($conexao, $tarefa);
	if ($tarefaService->atualizarRemarcada()) {
		header('Location: ../views/pendente_tarefa.php');
	}
} elseif ($acao == 'marcarUrgencia') {	
	$tarefa = new Tarefa();
	$tarefa->__set('id', $_GET['id']);	
	$tarefa->__set('id_urgencia', 2);
	$conexao = new Conexao();

	$tarefaService = new TarefaService($conexao, $tarefa);
	$tarefaService->marcarUrgencia();

	header('Location: ../views/urgencia_tarefa.php');
} 
?>