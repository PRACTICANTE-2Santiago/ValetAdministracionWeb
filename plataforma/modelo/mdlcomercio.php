<?php 
require_once ('DBAbstractModel.php');

class ComercioModel extends DBAbstractModel{
	
	private $id;
	public $id_valet;
	
   
    public $nombre;
	
	public $calle;
	
	
	public $codigo_postal;
	public $representante;
	public $correo_electronico;
	public $tarifa;
	public $estatus;

	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM Comercios where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM Comercios where "
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet : ' id_valet > 0 ')
        
        
        .(isset($this->nombre) ? " and nombre  '".$this->nombre."'" : "")
        .(isset($this->calle) ? " and calle  '".$this->calle."'" : "")
        .(isset($this->representante) ? " and representante  '".$this->representante."'" : "")
        .(isset($this->codigo_postal) ? " and codigo_postal = '".$this->codigo_postal."'" : "")
        .(isset($this->tarifa) ? " and tarifa = ".$this->tarifa : "")
		.(isset($this->correo_electronico) ? " and correo_electronico like '%".$this->correo_electronico."%'" : "")
        .(isset($this->token) ? "and token = '".$this->token."', " : '')
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO Comercios
						(id_valet,						
                       
                        nombre,
                       
                        calle,
                        codigo_postal,                      
						representante,
						correo_electronico,
                        tarifa,
                        token,
						estatus
						)values
                        (".$this->id_valet.", "						
                        
						."'".$this->nombre."', "
						
                        ."'".$this->calle."', "                      
                        ."'".$this->codigo_postal."', "                       					
                        .$this->representante.", "						
					    ."'".$this->correo_electronico."', "
					    ."'".$this->tarifa."', "
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
		$this->query = "UPDATE Comercios set "
						 .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')						 
                                   
                        .(isset($this->nombre) ? "nombre = '".$this->nombre."', " : '')
						     
                         .(isset($this->calle) ? " calle = '".$this->calle."', " : '')						
                         .(isset($this->codigo_postal) ? " codigo_postal = '".$this->codigo_postal."', " : '')						
						 .(isset($this->representante) ? " representante = ".$this->representante.", " : '')
                         .(isset($this->correo_electronico) ? " correo_electronico = '".$this->correo_electronico."', " : '')
                         .(isset($this->tarifa) ? " tarifa = '".$this->tarifa."', " : '')
                         .(isset($this->token) ? " token = '".$this->token."', " : '')
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
    
	
	
	public function delete(){
		$this->query = "DELETE FROM Comercios where id = ".$this->id;
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
