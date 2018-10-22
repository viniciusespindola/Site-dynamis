<?php 

	/**
	* 
	*/
	class HitCounter extends conecta
	{	
		private $conn;
		private $mysql;

		private $hitData;

		public function __construct()
		{
			$this->conn =  new conecta;
			$this->mysql = parent::Conn();
			$this->hitData = new stdClass();
			$this->hitData->total = 0;
			$this->hitData->unique = 0;
		}

		private function getData()
		{
			$data = new stdClass();

			$results = $this->mysql->query( 'SELECT * FROM hit_counter' );
			if ( $results->rowCount() === 0) {

				$data->total = 0;
				$data->unique = 0;

				$stmt = $this->mysql->prepare( 'INSERT INTO hit_counter( `total_hits`, `unique_hits` ) VALUES(:total, :unique)' );
				$stmt->bindParam( ':total',$data->total );
				$stmt->bindParam( ':unique',$data->unique );
				$stmt->execute();
			} else {
				$rows = $results->fetchAll( PDO::FETCH_OBJ );
				$data->total = $rows[0]->total_hits;
				$data->unique = $rows[0]->unique_hits;
			}

			return $data;
		}

		public function processViews()
		{
			session_start();

			$this->hitData = $this->getData();
			$this->visit();
		}

		public function getTotalHits()
		{
			return $this->hitData->total;
		}

		public function getUniqueHits()
		{
			return $this->hitData->unique;
		}

		

		private function isNewVisitor() 
		{
			return !array_key_exists( 'visited', $_SESSION ) && $_SESSION['visited'] !== true; 
		}

		private function visit() 
		{
			$this->mysql->query( "UPDATE hit_counter SET total_hits = total_hits + 1" );

			if ( $this->isNewVisitor() ) 
			{
				$this->mysql->query( "UPDATE hit_counter SET unique_hits = unique_hits + 1" );
				$_SESSION['visited'] = true;
			}
		}
	}
?>