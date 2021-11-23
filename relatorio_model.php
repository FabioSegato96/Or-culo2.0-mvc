<?php

	class Relatorio{

		private $id;
		private $id_status;
		private $id_user;
		private $tarefa;
		private $data_cadastro;		
		private $litros;		
		private $data_coleta;
		private $data_pesquisa;
		private $coletasPendentes;
		private $coletasConcluidas;
		private $oleoColetado;				

		public function __get($atributo) {
			return $this->$atributo;
		}
		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}
	}

?>