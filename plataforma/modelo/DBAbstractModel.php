<?php

abstract class DBAbstractModel{
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
	private static $dbPass = ''; 
	protected $dbName = 'valet_parking';
	protected $query;
	public $rows = array();
	private $conn;
	public $liid;
	public $errorText = '';
	
	
	//Metodos abstractos para las clases que la hereden
	abstract protected function get();
	abstract protected function set();
	abstract protected function edit();
	abstract protected function delete();
	
	//los siguientes metodos se pueden definir con exactitud y no son abstractos
	//conectar a la base de datos
	private function openConnection(){
		$this->conn = new mysqli(self::$dbHost, self::$dbUser, self::$dbPass, $this->dbName);
	}
	
	
	//desconectar la base de datos
	private function closeConnection(){
		$this->conn->close();
	}
	
	//ejecutar una consulta simple con retorno de id
	protected function executeSingleQuery(){
		$this->openConnection();
		if(!$this->conn->query($this->query)){
			$this->errorText = $this->conn->error;
			$this->liid = 0;
			$this->closeConnection();
			return FALSE;
		}else{
			$this->liid = $this->conn->insert_id; //devuelve el ultimo id insertado de la base de datos
			$this->closeConnection();
			return TRUE;	
		}
	}
	//ejecutar una consulta simple
	protected function executeSingleQuery2(){
		$this->openConnection();
		if(!$this->conn->query($this->query)){
			$this->errorText = $this->conn->error;
			$this->closeConnection();
			return FALSE;
		}else{
			$this->closeConnection();
			return TRUE;
		}		
	}
	
	//traer resultados de una consulta en un array
	protected function getResultsFromQuery(){
		$this->openConnection();
		$result = $this->conn->query($this->query);
		while($this->rows[] = $result->fetch_assoc());
		$result->close();
		$this->closeConnection();
		array_pop($this->rows);
	}
	
}
	
?>
