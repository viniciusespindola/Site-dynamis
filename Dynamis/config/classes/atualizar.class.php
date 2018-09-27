<?php 
	/**
	* 
	*/
	class atualizar extends conecta
	{
		private $Update;
		private $Resultados;
		private $Atualizar;
		private $Conecta;
		private $conn;

		public function Query($Tabela, $Dados, $Termos = null){
			$this->conn = new conecta;
			$this->Update = "UPDATE {$Tabela} SET {$Dados} {$Termos}";
			$this->Conecta = parent::Conn();
			$this->Atualizar = $this->Conecta->prepare($this->Update);
			$this->Atualizar->setFetchMode(PDO::FETCH_ASSOC);

			try {
				$this->Atualizar->execute();
				$this->Resultados = $this->Atualizar->rowCount();
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