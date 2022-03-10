<?php
	require_once ('DBAbstractModel.php');
	
class ValetModel extends DBAbstractModel{
	
	private $id;
	public $id_valet;
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
			.(isset($this->costo) ? " and paterno = '".$this->paterno."'" : "")
			.(isset($this->servicios) ? " and materno = '".$this->materno."'" : "")
			.(isset($this->aviso) ? " and correo_electronico = '".$this->correo_electronico."'" : "")
			.(isset($this->cancelaciones) ? " and usuario = '".$this->usuario."'" : "")
			
			." group by id order by id asc";
			$this->getResultsFromQuery();
		}
		}
	
	
	///Insertar ticket
	public function set(){			
		$this->query = "INSERT INTO creditos
									(id,
									 nombre, 
									 costo,
									servicios,
									   aviso, 
									   cancelaciones,
									    estatus) values 
            			             ("."'".$this->id_pin."',"
									."'".$this->nombre."', "
									."'".$this->costo."', "
                                    .$this->servicios.", "
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
    $this->query = "UPDATE valet set "
    .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')
    .(isset($this->id_pin) ? "id_pin = '".$this->id_pin."', " : '')
    .(isset($this->nombre) ? "nombre = '".$this->nombre."', " : '')
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
