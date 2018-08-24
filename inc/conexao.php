<?php

class Conexao extends PDO {
	private $database ="mysql:host=localhost:3307; dbname=redesocial; charset=utf8;";
	private $user ="root";
	private $password = "usbw";
	public static $handle = null;
	function __construct() {
		try {
			if(self::$handle == null) {
				$connection_data = parent::__construct($this->database, $this->user, $this->password);
				self::$handle = $connection_data;
				$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return self::$handle;
			}
			
		}
		catch(PDOException $e) {
			echo "Falha na conexão: " . $e->getMessage();
			return false;
		}
		
	}
	function __destruct() {
		self::$handle = null;
	}
}
?> 


 <?php
define('DB_SERVER', 'localhost:3307');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'usbw');
define('DB_DATABASE', 'redesocial');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);   //Variável usada no sistema de likes
?>