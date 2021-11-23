<?php

	class Cliente{

		private $id;
		private $cliente;
		private $endereco;
		private $cidade;
		private $pix;
		private $email;
		private $obs;
		private $tel;
		private $cel;
		private $responsavel;
		private $leadtime;
		

		public function __get($atributo) {
			return $this->$atributo;
		}
		public function __set($atributo, $valor) {
			$this->$atributo = $valor;
		}
	}

?>