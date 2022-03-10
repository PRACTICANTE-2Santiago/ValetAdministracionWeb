<?php 
require_once ('DBAbstractModel.php');

class ChoferModel extends DBAbstractModel{
	
	private $id;
	public $id_valet;	
    public $usuario;
	public $contrasena;
    public $nombre;
	public $apellido_paterno;
	public $apellido_materno;
	public $ine;
	public $licencia;
	public $telefono;
	public $correo_electronico;
	public $fecha_registro;
	public $token;
	public $estatus;

	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM choferes where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM choferes where "
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet : ' id_valet > 0 ')
        
        .(isset($this->usuario) ? " and usuario = '".$this->usuario."'" : "")	
		.(isset($this->contrasena) ? " and contrasena = '".$this->contrasena."'" : "")	
        .(isset($this->nombre) ? " and nombre  '".$this->nombre."'" : "")
		.(isset($this->apellido_paterno) ? " and apellido_paterno  '".$this->apellido_paterno."'" : "")
		.(isset($this->apellido_materno) ? " and apellido_materno  '".$this->apellido_materno."'" : "")
        .(isset($this->ine) ? " and ine = '".$this->ine."'" : "")
        .(isset($this->licencia) ? " and licencia = '".$this->licencia."'" : "")
        .(isset($this->telefono) ? " and telefono = ".$this->telefono : "")
		.(isset($this->correo_electronico) ? " and correo_electronico like '%".$this->correo_electronico."%'" : "")
        .(isset($this->fecha_registro) ? "and fecha_registro = '".$this->fecha_registro."', " : '')
        .(isset($this->token) ? "and token = '".$this->token."', " : '')
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO choferes
						(id_valet,						
                        usuario,
						contrasenia,
                        nombre,
                        apellido_paterno,
						apellido_materno,
                        ine,
                        licencia,                      
						telefono,
						correo_electronico,
                        fecha_registro,
                        token,
						estatus
						)values
                        (".$this->id_valet.", "						
                        ."'".$this->usuario."',"
                        ."'".$this->contrasenia."', "
						."'".$this->nombre."', "
						."'".$this->apellido_paterno."', "
						."'".$this->apellido_materno."', "
                        ."'".$this->ine."', "                      
                        ."'".$this->licencia."', "                       					
                        .$this->telefono.", "						
					    ."'".$this->correo_electronico."', "
					    ."'".$this->fecha_registro."', "
            			."'".$this->token."', "
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
		$this->query = "UPDATE choferes set "
						 .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')						 
                        .(isset($this->usuario) ? "usuario = '".$this->usuario."', " : '')
						.(isset($this->contrasena) ? "contrasena = '".$this->contrasena."', " : '')            
                        .(isset($this->nombre) ? "nombre = '".$this->nombre."', " : '')
						.(isset($this->apellido_paterno) ? "apellido_paterno = '".$this->apellido_paterno."', " : '')
						.(isset($this->apellido_materno) ? "apellido_materno = '".$this->apellido_materno."', ": '')            
                         .(isset($this->ine) ? " ine = '".$this->ine."', " : '')						
                         .(isset($this->licencia) ? " licencia = '".$this->licencia."', " : '')						
						 .(isset($this->telefono) ? " telefono = ".$this->telefono.", " : '')
                         .(isset($this->correo_electronico) ? " correo_electronico = '".$this->correo_electronico."', " : '')
                         .(isset($this->fecha_registro) ? " fecha_registro = '".$this->fecha_registro."', " : '')
                         .(isset($this->token) ? " token = '".$this->token."', " : '')
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
    
	
	
	public function delete(){
		$this->query = "DELETE FROM choferes where id = ".$this->id;
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
