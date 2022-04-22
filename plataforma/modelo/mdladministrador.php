<?php 
require_once ('DBAbstractModel.php');

class AdminModel extends DBAbstractModel {
	
	private $id;
	public $nombre;
	public $paterno;
	public $materno;
	public $telefono;
	public $correo_electronico;
	public $estatus;
	public $usuario;
	public $contrasenia;
	public $mes;
	public $anio;
	public $fecha_registro;
	public $limit;
	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM administradores where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM administradores where "
		.(isset($this->estatus) ? " estatus = ".$this->estatus : " estatus > -1 ")	
		.(isset($this->nombre) ? " and nombre = '".$this->nombre."'" : "")	
		.(isset($this->paterno) ? " and paterno = '".$this->paterno."'" : "")
        .(isset($this->materno) ? " and materno = '".$this->materno."'" : "")
		.(isset($this->correo_electronico) ? " and correo_electronico = '".$this->correo_electronico."'" : "")
		.(isset($this->telefono) ? " and telefono = '".$this->telefono."'" : "")
		.(isset($this->usuario) ? " and usuario = '".$this->usuario."'" : "")
		.(isset($this->contrasenia) ? " and contrasenia = '".$this->contrasenia."'" : "")
        .(isset($this->fecha_registro) ? " and fecha_registro = '".$this->fecha_registro."'" : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO administradores
                        (nombre,
						paterno,
						materno,
						correo_electronico,
                        telefono,
                        usuario,
                        contrasenia,
						fecha_registro,
						estatus
						)values
            			("."'".$this->nombre."',"
                        ."'".$this->paterno."', "
						."'".$this->materno."', "
                        ."'".$this->correo_electronico."', "
						."'".$this->telefono."', "	
                        ."'".$this->usuario."', "
                        ."'".$this->contrasenia."', "
                        ."'".$this->fecha_registro."', "
						.$this->estatus.")";
			if($this->executeSingleQuery()){
		$this->id = $this->liid;
		return true;	
	}else{
		$this->id = 0;
		return false;
	}
	}
	
	public function edit(){
		$this->query = "UPDATE administradores set " 
                        
						.(isset($this->nombre) ? "nombre = '".$this->nombre."', " : '')
						.(isset($this->paterno) ? "paterno = '".$this->paterno."', " : '')
						.(isset($this->materno) ? "materno = '".$this->materno."', ": '')
						.(isset($this->correo_electronico) ? "correo_electronico = '".$this->correo_electronico."', " : '')
						.(isset($this->telefono) ? "telefono = '".$this->telefono."', ": '')
						.(isset($this->usuario) ? "usuario = '".$this->usuario."', " : '')
						.(isset($this->contrasenia) ? "contrasenia = '".$this->contrasenia."', " : '')
						.(isset($this->fecha_registro) ? "fecha_registro = '".$this->fecha_registro."', " : '')
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
	
	public function delete(){
		$this->query = "DELETE FROM administradores where id = ".$this->id;
		return $this->executeSingleQuery2();
	}
	
	function _destruct(){
		unset ($this);
	}
	
	function getId(){
		return $this->id;
	}
	
	function setId($ident){
		$this->id = $ident;
	}
}//fin de clase usuario

?>
