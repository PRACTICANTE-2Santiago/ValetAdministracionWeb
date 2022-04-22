<?php 
require_once ('DBAbstractModel.php');

class ComercioModel extends DBAbstractModel{
	

	private $id;
	public $id_valet; 
    public $nombre;
	public $razonsocial;
	public $calle;
	public $codigo_postal;
	public $telefono;
	public $correo_electronico;
	public $logotipo;
	public $representante;
	public $tarifa;
	public $estatus;

	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM comercios where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM comercios where "
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet : ' id_valet > 0 ')
         .(isset($this->nombre) ? " and nombre  '".$this->nombre."'" : "")
		 .(isset($this->razonsocial) ? " and razonsocial  '".$this->razonsocial."'" : "")
        .(isset($this->calle) ? " and calle  '".$this->calle."'" : "")
        .(isset($this->codigo_postal) ? " and codigo_postal = '".$this->codigo_postal."'" : "")
		.(isset($this->telefono) ? " and telefono  '".$this->telefono."'" : "")
		.(isset($this->correo_electronico) ? " and correo_electronico like '%".$this->correo_electronico."%'" : "")
		.(isset($this->logotipo) ? " and logotipo = ".$this->logotipo : "")
		.(isset($this->representante) ? " and representante = ".$this->representante : "")
		.(isset($this->tarifa) ? " and tarifa = ".$this->tarifa : "")
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO comercios
						(
						id_valet,	
						nombre,					
						razonsocial,
                        calle,
                        codigo_postal,  
						telefono,
						correo_electronico,
						logotipo,
						representante,
                        tarifa,
						estatus
						)values
                        (".$this->id_valet.", "						
						."'".$this->nombre."', "
						."'".$this->razonsocial."', "
                        ."'".$this->calle."', "                      
                        ."'".$this->codigo_postal."', "
						."'".$this->telefono."', "                      										
					    ."'".$this->correo_electronico."', "
						."'".$this->logotipo."', "
						."'".$this->representante."', "
            			."'".$this->tarifa."', "
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
		$this->query = "UPDATE comercios set "
		.(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')					 
                         .(isset($this->nombre) ? "nombre = '".$this->nombre."', " : '')
						 .(isset($this->razonsocial) ? "razonsocial = '".$this->razonsocial."', " : '')
                         .(isset($this->calle) ? " calle = '".$this->calle."', " : '')						
                         .(isset($this->codigo_postal) ? " codigo_postal = '".$this->codigo_postal."', " : '')						
						 .(isset($this->telefono) ? " telefono = '".$this->telefono."', " : '')						
                         .(isset($this->correo_electronico) ? " correo_electronico = '".$this->correo_electronico."', " : '')
						 .(isset($this->representante) ? " representante = ".$this->representante.", " : '')
						 .(isset($this->tarifa) ? " tarifa = '".$this->tarifa."', " : '')
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
   
	
	
	public function delete(){
		$this->query = "DELETE FROM comercios where id = ".$this->id;
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
