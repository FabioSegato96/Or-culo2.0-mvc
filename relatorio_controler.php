<?php
require "../models/relatorio_model.php";
require "../models/relatorio_service.php";
require "../config/conexao.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if ($acao == 'getDataPesquisaCadastrado') {

		$relatorio = new Relatorio();
		$conexao = new Conexao();
		$relatorioService = new RelatorioService($conexao, $relatorio);	

		if (isset($_POST['data_pesquisa'])) {
			$data_pesquisa = $_POST['data_pesquisa'];				
		} else {
			$data_pesquisa = $relatorioService->getDataPesquisa();			
		}	

		$relatorio->__set('data_pesquisa', $data_pesquisa);		

		$relatorioService->updateDataPesquisa();
		header('Location: ../views/relatorio_cadastrado.php');		
		
} else if ($acao == 'getDataPesquisaConcluido') {

		$relatorio = new Relatorio();
		$conexao = new Conexao();
		$relatorioService = new RelatorioService($conexao, $relatorio);	

		if (isset($_POST['data_pesquisa'])) {
			$data_pesquisa = $_POST['data_pesquisa'];				
		} else {
			$data_pesquisa = $relatorioService->getDataPesquisa();			
		}	

		$relatorio->__set('data_pesquisa', $data_pesquisa);		

		$relatorioService->updateDataPesquisa();
		header('Location: ../views/relatorio_coletado.php');
	
}  else if ($acao == 'getDataPesquisaCarro') {		

		$relatorio = new Relatorio();
		$conexao = new Conexao();
		$relatorioService = new RelatorioService($conexao, $relatorio);	

		if (isset($_POST['data_pesquisa'])) {
			$data_pesquisa = $_POST['data_pesquisa'];				
		} else {
			$data_pesquisa = $relatorioService->getDataPesquisaCarro();		
		}

		if(isset($_POST['id_user'])){
			$id_user = $_POST['id_user'];
		} else {
			$id_user = 0;
		}

		$relatorio->__set('data_pesquisa', $data_pesquisa);
		$relatorio->__set('id_user', $id_user);

		
		
		$relatorioService->updateDataPesquisaCarro();
		header('Location: ../views/relatorio_carro.php');
		
} else if ($acao == 'pesquisarRelatorioColetado') {		

		$relatorio = new Relatorio();
		$conexao = new Conexao();
		$relatorioService = new RelatorioService($conexao, $relatorio);	
		$data_pesquisa = $relatorioService->getDataPesquisa()['data'];	
		$relatorio->__set('data_pesquisa', $data_pesquisa);

		$relatorio_coletado = $relatorioService->getRelatorioColetado();
		$relatorio_contagem = $relatorioService->getContagemRelatorioColetado();
		$relatorio_soma = $relatorioService->getSomaRelatorioColetado();
		
} else if ($acao == 'pesquisarRelatorioRegistrado') {		

		$relatorio = new Relatorio();
		$conexao = new Conexao();
		$relatorioService = new RelatorioService($conexao, $relatorio);	
		$data_pesquisa = $relatorioService->getDataPesquisa()['data'];	
		$relatorio->__set('data_pesquisa', $data_pesquisa);			
		$relatorio_coletado = $relatorioService->getRelatorioRegistrado();
		$relatorio_contagem = $relatorioService->getContagemRelatorioRegistrado();
		$relatorio_soma = $relatorioService->getSomaRelatorioRegistrado();
		
} else if ($acao == 'pesquisarRelatorioCarro') {		

		$relatorio = new Relatorio();
		$conexao = new Conexao();
		$relatorioService = new RelatorioService($conexao, $relatorio);	
		$data_pesquisa = $relatorioService->getDataPesquisaCarro()['data'];
		$id_user = $relatorioService->getDataPesquisaCarro()['id_user'];	
		$relatorio->__set('id_user', $id_user);
		$relatorio->__set('data_pesquisa', $data_pesquisa);

		$total_pendente_strada = $relatorioService->getTotalPendenteStrada();
		$total_urgente_strada = $relatorioService->getTotalUrgenteStrada();
		$total_pendente_kombi = $relatorioService->getTotalPendenteKombi();
		$total_urgente_kombi = $relatorioService->getTotalUrgenteKombi();
		
		$relatorio_coletado = $relatorioService->getRelatorioCarro();
		$relatorio_contagem = $relatorioService->getContagemRelatorioCarro();
		$relatorio_soma = $relatorioService->getSomaRelatorioCarro();
		
} else if ($acao == 'recuperarTotais') {		

		$relatorio = new Relatorio();
		$conexao = new Conexao();
		$relatorioService = new RelatorioService($conexao, $relatorio);		
		
		$total_pendente = $relatorioService->coletasPendentes();
		$total_urgente = $relatorioService->coletasUrgentes();
		
}
?>