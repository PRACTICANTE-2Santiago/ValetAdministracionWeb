<?php 
require_once ('DBAbstractModel.php');

class TarifaModel extends DBAbstractModel{
	
	private $id;
	public $id_valet;
	public $tarifa;
	public $fecha_registro;
	public $estatus;

	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM tarifa where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM tarifa where "
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet : ' id_valet > 0 ')
        .(isset($this->tarifa) ? " and tarifa = '".$this->tarifa."'" : "")	
        .(isset($this->fecha_registro) ? "and fecha_registro = '".$this->fecha_registro."', " : '')	
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO tarifa
						(id_valet,
						tarifa,
						fecha_registro,
						estatus
						)values
                        (".$this->id_valet.", "
                        ."'".$this->tarifa."',"
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
		$this->query = "UPDATE tarifa set "
						 .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')
                         .(isset($this->tarifa) ? " tarifa = '".$this->tarifa."', " : '')
						 .(isset($this->fecha_registro) ? "fecha_registro = '".$this->fecha_registro."', " : '')
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
    
	
	
	public function delete(){
		$this->query = "DELETE FROM tarifa where id = ".$this->id;
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
