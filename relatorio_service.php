<?php

class RelatorioService{

	private $conexao;
	private $relatorio;

	public function __construct(Conexao $conexao, Relatorio $relatorio) {

		$this->conexao = $conexao->conectar();
		$this->relatorio = $relatorio;
	}
	public function recuperarRelatorio(){
		$query = "select t.id, t.id_user, t.id_status, t.tarefa, t.data_coleta, t.litros, t.cidade, t.obs, t.endereco, DATE_FORMAT(t.data_cadastrado, '%d/%m/%Y') as data_cadastrado from tb_tarefas as t where t.data_cadastrado";
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':data_inicio', $this->relatorio->__get('data_inicio'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function coletasPendentes(){
		$query = "select count(id_status) from tb_tarefas where id_urgencia = 1 and id_status = 1";
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':data_inicio', $this->relatorio->__get('data_inicio'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function coletasUrgentes(){
		$query = "select count(id_status) from tb_tarefas where id_urgencia = 2 and id_status = 1";
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':data_inicio', $this->relatorio->__get('data_inicio'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function coletasConcluidas(){
		$query = "select count(id_status) from tb_tarefas where id_status = 2";
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':data_inicio', $this->relatorio->__get('data_inicio'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function oleoColetado(){
		$query = "select sum(litros) as litros from tb_tarefas where id_status = 2";
		$stmt = $this->conexao->prepare($query);
		//$stmt->bindValue(':data_inicio', $this->relatorio->__get('data_inicio'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function updateDataPesquisa(){
		$query = "update tb_pesquisa set data = :data_pesquisa where id = 1";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));				
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function updateDataPesquisaCarro(){
		$query = "update tb_pesquisa_carro set data = :data_pesquisa where id = 1;update tb_pesquisa_carro set id_user = :id_user where id = 1";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		$stmt->bindValue(':id_user', $this->relatorio->__get('id_user'));		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getDataPesquisa(){
		$query = "select data from tb_pesquisa where id = 1";
		$stmt = $this->conexao->prepare($query);				
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function getDataPesquisaCarro(){
		$query = "select data, id_user from tb_pesquisa_carro where id = 1";
		$stmt = $this->conexao->prepare($query);				
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	public function getRelatorioColetado(){
		$query = "select t.id, t.obs, t.id_user, t.id_status, t.tarefa, t.litros, t.cidade, t.data_remarcada, t.endereco, DATE_FORMAT(t.data_coleta, '%d/%m/%Y') as data_coleta, DATE_FORMAT(t.data_cadastrado, '%d/%m/%Y') as data_cadastrado from tb_tarefas as t where t.data_coleta = :data_pesquisa and t.id_status = 2 order by t.cidade asc, t.endereco asc"; 
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getRelatorioRegistrado(){
		$query = "select t.id, t.obs, t.id_user, t.id_status, t.tarefa, t.litros, t.cidade, t.data_remarcada, t.endereco, DATE_FORMAT(t.data_coleta, '%d/%m/%Y') as data_coleta, DATE_FORMAT(t.data_cadastrado, '%d/%m/%Y') as data_cadastrado from tb_tarefas as t where t.data_cadastrado = :data_pesquisa order by t.cidade asc, t.endereco asc";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getRelatorioCarro(){
		$query = "select t.id, t.obs, t.id_user, t.id_status, t.tarefa, t.litros, t.cidade, t.data_remarcada, t.endereco, DATE_FORMAT(t.data_coleta, '%d/%m/%Y') as data_coleta, DATE_FORMAT(t.data_cadastrado, '%d/%m/%Y') as data_cadastrado from tb_tarefas as t where t.data_coleta = :data_pesquisa and t.id_user = :id_user";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		$stmt->bindValue(':id_user', $this->relatorio->__get('id_user'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getContagemRelatorioColetado(){
		$query = "select count(t.id) as qtdColeta from tb_tarefas as t where t.data_coleta = :data_pesquisa and t.id_status = 2";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getSomaRelatorioColetado(){
		$query = "select sum(t.litros) as litrosColeta from tb_tarefas as t where t.data_coleta = :data_pesquisa and t.id_status = 2";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getContagemRelatorioRegistrado(){
		$query = "select count(t.id) as qtdColeta from tb_tarefas as t where t.data_cadastrado = :data_pesquisa";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getSomaRelatorioRegistrado(){
		$query = "select sum(t.litros) as litrosColeta from tb_tarefas as t where t.data_cadastrado = :data_pesquisa";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getContagemRelatorioCarro(){
		$query = "select count(t.id) as qtdColeta from tb_tarefas as t where t.data_coleta = :data_pesquisa and t.id_user = :id_user";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		$stmt->bindValue(':id_user', $this->relatorio->__get('id_user'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getSomaRelatorioCarro(){
		$query = "select sum(t.litros) as litrosColeta from tb_tarefas as t where t.data_coleta = :data_pesquisa and t.id_user = :id_user";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_pesquisa', $this->relatorio->__get('data_pesquisa'));
		$stmt->bindValue(':id_user', $this->relatorio->__get('id_user'));
		//$stmt->bindValue(':data_fim', $this->relatorio->__get('data_fim'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getTotalPendenteKombi(){
		$query = "select count(t.id_status) as total_pendente_kombi from tb_tarefas as t where t.id_status = 1 and t.id_urgencia = 1 and id_user = 2;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getTotalUrgenteKombi(){
		$query = "select count(t.id_urgencia) as total_urgente_kombi from tb_tarefas as t where t.id_status = 1 and t.id_urgencia = 2 and id_user = 2;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getTotalPendenteStrada(){
		$query = "select count(t.id_status) as total_pendente_strada from tb_tarefas as t where t.id_status = 1 and t.id_urgencia = 1 and id_user = 3;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getTotalUrgenteStrada(){
		$query = "select count(t.id_urgencia) as total_urgente_strada from tb_tarefas as t where t.id_status = 1 and t.id_urgencia = 2 and id_user = 3;";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}	
}

?>