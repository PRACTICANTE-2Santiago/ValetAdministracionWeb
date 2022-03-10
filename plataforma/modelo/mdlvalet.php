<?php
	require_once ('DBAbstractModel.php');
	
class ValetModel extends DBAbstractModel{
	
	private $id;
	public $id_valet;
	public $id_contador;
	public $id_pin;
	public $nombre;
    
	public $telefono;
	public $correo_electronico;
	
	public $representante;
	public $estatus;
		
	///consultar residencial
	public function get(){
	if(isset ($this->id)){
		if($this->id > 0){
			$this->query = "SELECT * FROM valet where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}	else{
		$this->query = "SELECT * FROM valet where "
        .(isset($this->id_pin) ? " id_pin = ".$this->id_pin : 'id_pin > -1')
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet: '')
		.(isset($this->nombre) ? " and nombre = '".$this->nombre."'" : "")
      
        .(isset($this->telefono) ? " and telefono = ".$this->telefono : "")
		
		.(isset($this->correo_electronico) ? " and correo_electronico like '%".$this->correo_electronico."%'" : "")
		.(isset($this->representante) ? " and representante like '%".$this->representante."%'" : "")
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
		$this->getResultsFromQuery();
	}
	}
	
	
	///Insertar ticket
	public function set(){			
		$this->query = "INSERT INTO valet
									(
										id_contador,
									id_pin,
									
									nombre,
									
									telefono,
									correo_electronico,
								
									representante,
									estatus
									) values 
									
            			             ("."'".$this->id_contador."',"
										."'".$this->id_pin."', "
									."'".$this->nombre."', "
														
                                    .$this->telefono.", "						
									."'".$this->correo_electronico."', "
								
                                    ."'".$this->representante."', "
									.$this->estatus.')';
		if($this->executeSingleQuery()){
		$this->id = $this->liid;
		return true;	
	}else{
		$this->id = 0;
		return false;
	}
	}
	
    
    public function edit(){
    $this->query = "UPDATE valet set "
    .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')
    .(isset($this->id_pin) ? "id_pin = '".$this->id_pin."', " : '')
    .(isset($this->nombre) ? "nombre = '".$this->nombre."', " : '')
   
    .(isset($this->telefono) ? " telefono = ".$this->telefono.", " : '')
    .(isset($this->logotipo) ? " logotipo = '".$this->logotipo."', " : '')
    .(isset($this->representante) ? " representante = '".$this->representante."', " : '')

    ."estatus = ".$this->estatus." "
    ."where id = ".$this->id;
    return $this->executeSingleQuery2();
    }
    
	
	//eliminar residencial
	public function delete (){
		$this->query = "DELETE FROM valet where id = ".$this->id;
		$this->executeSingleQuery();
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
}
?>
