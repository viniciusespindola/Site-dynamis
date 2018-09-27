<?php 
	/**
	* 
	*/
	class conecta
	{
		private static $USUARIO;
		private static $SENHA;
		private static $BANCO_DE_DADOS;
		private static $LOCAL;
		//conecxão
		private static $conecxão;
		function __construct()
		{
			self::$USUARIO = USUARIO;
			self::$SENHA = SENHA;
			self::$BANCO_DE_DADOS = BANCO_DE_DADOS;
			self::$LOCAL = LOCAL;
		}

		public static function Conn()
		{
			if (!isset(self::$conecxão)):
				$dsn = "mysql:host=".self::$LOCAL."; dbname=".self::$BANCO_DE_DADOS."";
				
				try {
					self::$conecxão = new PDO($dsn, self::$USUARIO, self::$SENHA);	
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			endif;
			return self::$conecxão;
			
		}
	}


?>