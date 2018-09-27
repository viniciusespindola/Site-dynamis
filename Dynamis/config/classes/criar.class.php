<?php 
	/**
	* 
	*/
	class criar extends conecta
	{
		private $Insert;
		private $Resultados;
		private $Criar;
		private $Conecta;
		private $conn;

		public function Query($Tabela, $Colunas, $Valores){
			$this->conn = new conecta;
			$this->Insert = "INSERT INTO {$Tabela} ({$Colunas}) VALUES ({$Valores})";
			$this->Conecta = parent::Conn();
			$this->Criar = $this->Conecta->prepare($this->Insert);
			$this->Criar->setFetchMode(PDO::FETCH_ASSOC);

			try {
				$this->Criar->execute();
				$this->Resultados = true;
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