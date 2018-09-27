<?php
	class deletar extends conecta
	{
		private $Delete;
		private $Resultados;
		private $Excluir;
		private $Conecta;
		private $conn;

		public function Query($Tabela, $Termos = null){
			$this->conn = new conecta;
			$this->Delete = "DELETE FROM {$Tabela} WHERE {$Termos}";
			$this->Conecta = parent::Conn();
			$this->Excluir = $this->Conecta->prepare($this->Delete);
			$this->Excluir->setFetchMode(PDO::FETCH_ASSOC);

			try {
				$this->Excluir->execute();
				$this->Resultados = $this->Excluir->rowCount();
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