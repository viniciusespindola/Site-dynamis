<?php 
	/**
	* 
	*/
	class ler extends conecta	{
		private $Select;
		private $Resultados;
		private $Ler;
		private $Conecta;
		private $conn;
		private $dados;

		public function Query($Campo, $Tabela, $Termos = null){
			$this->conn = new conecta;
			$this->Select = "SELECT {$Campo} FROM {$Tabela} {$Termos}";
			$this->Conecta = parent::Conn();
			$this->Ler = $this->Conecta->prepare($this->Select);
			$this->Ler->setFetchMode(PDO::FETCH_ASSOC);

			try {
				$this->Ler->execute();
				$this->Resultados = $this->Ler->fetchAll();
			} catch (PDOException $e) {
				$this->Resultados = null;
				echo $e->getMessage();
			}
		}

		public function getResultados(){
			return $this->Resultados;
		}
	}

?>