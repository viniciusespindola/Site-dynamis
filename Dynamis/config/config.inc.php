<?php
//Informações da conexão com o banco de dados
define('USUARIO','root');
define('SENHA','');
define('BANCO_DE_DADOS','dynamis');
define('LOCAL','localhost:3307');

//AUTOLOD de classes
spl_autoload_register(
	function($classe)
	{
		require_once __DIR__.'/classes/'.$classe.'.class.php';
	}
)
?>