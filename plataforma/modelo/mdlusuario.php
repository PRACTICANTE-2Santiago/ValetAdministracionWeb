<?php 
require_once ('DBAbstractModel.php');

class UsuarioModel extends DBAbstractModel{
	
	private $id;
	public $id_valet;
	public $tipo_usuario;
    public $usuario;
	public $contrasena;
    public $nombre;
	public $apellido_paterno;
	public $apellido_materno;
	public $calle;
	public $num_ext;
	public $num_int;
	public $colonia;
	public $municipio;
	public $estado;
	public $pais;
	public $codigo_postal;
	public $telefono;
	public $correo_electronico;
	public $fecha_registro;
	public $estatus;

	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM usuarios where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM usuarios where "
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet : ' id_valet > 0 ')
        .(isset($this->tipo_usuario) ? " and tipo_usuario = ".$this->tipo_usuario : '')
        .(isset($this->usuario) ? " and usuario = '".$this->usuario."'" : "")	
		.(isset($this->contrasena) ? " and contrasena = '".$this->contrasena."'" : "")	
        .(isset($this->nombre) ? " and nombre  '".$this->nombre."'" : "")
		.(isset($this->apellido_paterno) ? " and apellido_paterno  '".$this->apellido_paterno."'" : "")
		.(isset($this->apellido_materno) ? " and apellido_materno  '".$this->apellido_materno."'" : "")
        .(isset($this->calle) ? " and calle = '".$this->calle."'" : "")
        .(isset($this->num_ext) ? " and num_ext = ".$this->num_ext : "")
        .(isset($this->num_int) ? " and num_int = ".$this->num_int : "")
        .(isset($this->colonia) ? " and colonia = '".$this->colonia."'" : "")
        .(isset($this->municipio) ? " and municipio = '".$this->municipio."'" : "")
        .(isset($this->estado) ? " and estado = '".$this->estado."'" : "")
        .(isset($this->pais) ? " and pais = '".$this->pais."'" : "")
        .(isset($this->codigo_postal) ? " and codigo_postal = ".$this->codigo_postal : "")
        .(isset($this->telefono) ? " and telefono = ".$this->telefono : "")
		.(isset($this->correo_electronico) ? " and correo_electronico like '%".$this->correo_electronico."%'" : "")
        .(isset($this->fecha_registro) ? "and fecha_registro = '".$this->fecha_registro."', " : '')
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO usuarios
						(id_valet,
						tipo_usuario,
                        usuario,
						contrasena,
                        nombre,
                        apellido_paterno,
						apellido_materno,
                        calle,
                        num_ext,
                        num_int,
                        colonia,
                        municipio,
                        estado,
                        pais,
                        codigo_postal,
						telefono,
						correo_electronico,
                        fecha_registro,
						estatus
						)values
                        (".$this->id_valet.", "
						.$this->tipo_usuario.", "
                        ."'".$this->usuario."',"
                        ."'".$this->contrasena."', "
						."'".$this->nombre."', "
						."'".$this->apellido_paterno."', "
						."'".$this->apellido_materno."', "
                        ."'".$this->calle."', "
                        .$this->num_ext.", "
                        .$this->num_int.", "
                        ."'".$this->colonia."', "
                        ."'".$this->municipio."', "
                        ."'".$this->estado."', "
                        ."'".$this->pais."', "
                        .$this->codigo_postal.", "						
                        .$this->telefono.", "						
					    ."'".$this->correo_electronico."', "
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
		$this->query = "UPDATE usuarios set "
						 .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')
						 .(isset($this->tipo_usuario) ? " tipo_usuario = ".$this->tipo_usuario.", " : '')
                        .(isset($this->usuario) ? "usuario = '".$this->usuario."', " : '')
						.(isset($this->contrasena) ? "contrasena = '".$this->contrasena."', " : '')
            
                        .(isset($this->nombre) ? "nombre = '".$this->nombre."', " : '')
						.(isset($this->apellido_paterno) ? "apellido_paterno = '".$this->apellido_paterno."', " : '')
						.(isset($this->apellido_materno) ? "apellido_materno = '".$this->apellido_materno."', ": '')
            
                         .(isset($this->calle) ? " calle = '".$this->calle."', " : '')
						 .(isset($this->num_ext) ? " num_ext = ".$this->num_ext.", " : '')
						 .(isset($this->num_int) ? " num_int = ".$this->num_int.", " : '')
                         .(isset($this->colonia) ? " colonia = '".$this->colonia."', " : '')
						 .(isset($this->municipio) ? " municipio = '".$this->municipio."', " : '')
						 .(isset($this->estado) ? " estado = '".$this->estado."', " : '')
						 .(isset($this->pais) ? " pais = '".$this->pais."', " : '')
						 .(isset($this->codigo_postal) ? " codigo_postal = ".$this->codigo_postal.", " : '')
						 .(isset($this->telefono) ? " telefono = ".$this->telefono.", " : '')
                         .(isset($this->correo_electronico) ? " correo_electronico = '".$this->correo_electronico."', " : '')
                         .(isset($this->fecha_registro) ? " fecha_registro = '".$this->fecha_registro."', " : '')
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
    
	
	
	public function delete(){
		$this->query = "DELETE FROM usuarios where id = ".$this->id;
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
