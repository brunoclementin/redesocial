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

$db = new Conexao;
?>