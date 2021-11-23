<?php

class TarefaService{

	private $conexao;
	private $tarefa;

	public function __construct(Conexao $conexao, Tarefa $tarefa) {

		$this->conexao = $conexao->conectar();
		$this->tarefa = $tarefa;
	}
	
	public function inserir() {
		$query = 'insert into tb_tarefas(tarefa, endereco, obs, id_user, cidade, data_cadastrado, id_urgencia)values(:tarefa, :endereco, :obs, :id_user, :cidade, :data_cadastrado, :id_urgencia)';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
		$stmt->bindValue(':endereco', $this->tarefa->__get('endereco'));
		$stmt->bindValue(':obs', $this->tarefa->__get('obs'));
		$stmt->bindValue(':id_user', $this->tarefa->__get('id_user'));
		$stmt->bindValue(':cidade', $this->tarefa->__get('cidade'));
		$stmt->bindValue(':data_cadastrado', $this->tarefa->__get('data_cadastro'));
		$stmt->bindValue(':id_urgencia', $this->tarefa->__get('id_urgencia'));
		$stmt->execute();
	}
	public function recuperar() {
		$query = "select t.id, t.id_user, t.id_urgencia, t.id_status, t.tarefa, t.endereco, t.litros, t.obs, t.data_remarcada, t.cidade, DATE_FORMAT(t.data_coleta, '%d/%m/%Y') as data_coleta, DATE_FORMAT(t.data_cadastrado, '%d/%m/%Y') as data_cadastrado from tb_tarefas as t order by t.data_coleta desc limit 20";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function atualizar() {
		$query = 'update tb_tarefas set litros = :litros where id = :id; 
					update tb_tarefas set id_status = :id_status where id = :id; 
					update tb_tarefas set data_coleta = :data_coleta where id = :id;';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':litros', $this->tarefa->__get('litros'));	
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->bindValue(':data_coleta', $this->tarefa->__get('data_coleta'));
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		return $stmt->execute();
	}
	
	public function remover() {
		$query = 'delete from tb_tarefas where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->execute();
	}
	public function recuperarTarefasPendentes(){
		$query = "select t.id, t.id_user, t.id_urgencia, t.id_status, t.tarefa, t.litros, t.endereco, t.obs, t.data_remarcada, t.cidade, DATE_FORMAT(t.data_cadastrado,  '%d/%m/%Y') as data_cadastrado from tb_tarefas as t where id_status = :id_status order by t.cidade asc, t.endereco asc;
			select count(t.id_status) as total_pendente from tb_tarefas as t where t.id_status = :id_status;";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getTotalPendente(){
		$query = "select count(t.id_status) as total_pendente from tb_tarefas as t where t.id_status = 1 and t.id_urgencia = 1 and id_user = :id_user;";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_user', $this->tarefa->__get('id_user'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function getTotalUrgente(){
		$query = "select count(t.id_urgencia) as total_urgente from tb_tarefas as t where t.id_status = 1 and t.id_urgencia = 2 and id_user = :id_user;";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_user', $this->tarefa->__get('id_user'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function atualizarObs() {
		$query = 'update tb_tarefas set obs = :obs where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':obs', $this->tarefa->__get('obs'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}
	public function atualizarRemarcada() {
		$query = 'update tb_tarefas set data_remarcada = :data_remarcada where id = :id;
					update tb_tarefas set id_status = :id_status where id = :id; 
					update tb_tarefas set data_coleta = :data_coleta where id = :id;';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':data_remarcada', $this->tarefa->__get('data_remarcada'));
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));			
		$stmt->bindValue(':data_coleta', $this->tarefa->__get('data_coleta'));
		return $stmt->execute();
	}
	public function marcarUrgencia() {
		$query = 'update tb_tarefas set id_urgencia = :id_urgencia where id = :id';
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':id_urgencia', $this->tarefa->__get('id_urgencia'));	
		$stmt->bindValue(':id', $this->tarefa->__get('id'));
		return $stmt->execute();
	}
}

?>