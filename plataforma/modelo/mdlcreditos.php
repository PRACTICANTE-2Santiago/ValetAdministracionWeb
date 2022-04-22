<?php
	require_once ('DBAbstractModel.php');
	
class ValetModel extends DBAbstractModel{
	
	public $id;
	public $nombre;
    public $costo;
	public $servicios;
	public $aviso;
	public $cancelaciones;
	public $estatus;
		
	///consultar residencial
	public function get(){
		if(isset ($this->id)){
			if($this->id >0){
				$this->query = "SELECT * FROM creditos where id = ".$this->id;
				$this->getResultsFromQuery();
			}
		}else{
			$this->query = "SELECT * FROM creditos where "
			.(isset($this->id) ? " estatus = ".$this->estatus : " estatus > -1 ")	
			.(isset($this->nombre) ? " and nombre = '".$this->nombre."'" : "")	
			.(isset($this->costo) ? " and costo = '".$this->costo."'" : "")
			.(isset($this->servicios) ? " and servicios = '".$this->servicios."'" : "")
			.(isset($this->aviso) ? " and aviso = '".$this->aviso."'" : "")
			.(isset($this->cancelaciones) ? " and cancelaciones = '".$this->cancelaciones."'" : "")
			
			." group by id order by id asc";
			$this->getResultsFromQuery();
		}
		}

		
	
	
	///Insertar ticket
	public function set(){			
		$this->query = "INSERT INTO creditos
									(nombre, 
									costo, 
								servicios, 
									aviso, 
									cancelaciones,
									 estatus
									) values 
									
            			             ("."'".$this->nombre."',"
										."'".$this->costo."', "
									."'".$this->servicios."', "
														
                                    .$this->aviso.", "						
									."'".$this->cancelaciones."', "
								
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
    $this->query = "UPDATE creditos set "
    .(isset($this->nombre) ? " nombre = ".$this->nombre.", " : '')
    .(isset($this->costo) ? "costo = '".$this->costo."', " : '')
    .(isset($this->servicios) ? "servicios = '".$this->servicios."', " : '')
    .(isset($this->aviso) ? " aviso = '".$this->aviso."', " : '')
    .(isset($this->cancelaciones) ? " cancelaciones = ".$this->cancelaciones.", " : '')
    
    ."estatus = ".$this->estatus." "
    ."where id = ".$this->id;
    return $this->executeSingleQuery2();
    }
    
	
	//eliminar residencial
	public function delete (){
		$this->query = "DELETE FROM creditos where id = ".$this->id;
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
