<?php

class ClienteService{

	private $conexao;
	private $cliente;

	public function __construct(Conexao $conexao, Cliente $cliente) {

		$this->conexao = $conexao->conectar();
		$this->cliente = $cliente;
	}
	public function inserirCliente(){
		$query = "insert into tb_clientes(cliente, endereco, cidade, pix, email, obs, tel, cel, leadtime, responsavel)values(:cliente, :endereco, :cidade, :pix, :email, :obs, :tel, :cel, :leadtime, :responsavel)";
		$stmt = $this->conexao->prepare($query);
		$stmt->bindValue(':cliente', $this->cliente->__get('cliente'));
		$stmt->bindValue(':endereco', $this->cliente->__get('endereco'));
		$stmt->bindValue(':cidade', $this->cliente->__get('cidade'));
		$stmt->bindValue(':pix', $this->cliente->__get('pix'));
		$stmt->bindValue(':email', $this->cliente->__get('email'));
		$stmt->bindValue(':obs', $this->cliente->__get('obs'));
		$stmt->bindValue(':tel', $this->cliente->__get('tel'));
		$stmt->bindValue(':cel', $this->cliente->__get('cel'));
		$stmt->bindValue(':leadtime', $this->cliente->__get('leadtime'));
		$stmt->bindValue(':responsavel', $this->cliente->__get('responsavel'));		
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function recuperarClientes(){
		$query = "select cliente, endereco, cidade, pix, email, obs, tel, cel, leadtime, responsavel from tb_clientes";
		$stmt = $this->conexao->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
}

?>