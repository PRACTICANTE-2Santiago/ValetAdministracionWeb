<?php 
require_once ('DBAbstractModel.php');

class CompraModel extends DBAbstractModel{
	
	public $id;
	public $id_valet; 
    public $plan;
	public $costo;
	public $servicios;
	public $cancelaciones;
	public $comporbante;
	public $estatus;

	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM pedidos where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM pedidos where "
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet : ' id_valet > 0 ')
         .(isset($this->plan) ? " and plan  '".$this->plan."'" : "")
		 .(isset($this->costo) ? " and costo  '".$this->costo."'" : "")
        .(isset($this->servicios) ? " and servicios  '".$this->servicios."'" : "")
        .(isset($this->cancelaciones) ? " and cancelaciones = '".$this->cancelaciones."'" : "")
		.(isset($this->comporbante) ? " and comporbante  '".$this->comporbante."'" : "")
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO pedidos
						(id_valet,	
						plan,					
						costo,
                        servicios,
                        cancelaciones,  
						comporbante,
						estatus
						)values
                        (
						
						".$this->id_valet.", "						
						."'".$this->plan."', "
						."'".$this->costo."', "
                        ."'".$this->servicios."', "                      
                        ."'".$this->cancelaciones."', "
						."'".$this->comporbante."', "                      										
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
		$this->query = "UPDATE pedidos set "
						 .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')						 
                         .(isset($this->plan) ? "plan = '".$this->plan."', " : '')
						 .(isset($this->costo) ? "costo = '".$this->costo."', " : '')
                         .(isset($this->servicios) ? " servicios = '".$this->servicios."', " : '')						
                         .(isset($this->cancelaciones) ? " cancelaciones = '".$this->cancelaciones."', " : '')						
						 .(isset($this->comporbante) ? " comporbante = '".$this->comporbante."', " : '')						
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
   
	
	
	public function delete(){
		$this->query = "DELETE FROM pedidos where id = ".$this->id;
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
