
<?php 
require_once ('DBAbstractModel.php');

class AutoModel extends DBAbstractModel{
	
	private $id;
	public $id_valet;
	public $placas;
    public $descripcion;
	public $foto1;
    public $foto2;
	public $foto3;
	public $id_registro;
	public $fecha_registro;
	public $fecha_nu;
	public $id_ubicacion;
	public $latitud;
	public $longitud;
	public $comentarios;
	public $fecha_ubicacion;
	public $fecha_pedir;
	public $id_entrega;
	public $fecha_entregado;
	public $fecha_notificado;
	public $comentarios_entregado;
	public $comentarios_cliente;
	public $token;
	public $condiciones;
	public $estatus;

	
	public function get(){
	if(isset ($this->id)){
		if($this->id >0){
			$this->query = "SELECT * FROM automovil where id = ".$this->id;
			$this->getResultsFromQuery();
		}
	}else{
        $this->query = "SELECT * FROM automovil where "
        .(isset($this->id_valet) ? " id_valet = ".$this->id_valet : ' id_valet > 0 ')
        .(isset($this->placas) ? " and placas = '".$this->placas."'" : "")	
        .(isset($this->descripcion) ? " and descripcion = '".$this->descripcion."'" : "")	
        .(isset($this->foto1) ? " and foto1 = '".$this->foto1."'" : "")	
        .(isset($this->foto2) ? " and foto2 = '".$this->foto2."'" : "")	
        .(isset($this->foto3) ? " and foto3 = '".$this->foto3."'" : "")	
        .(isset($this->id_registro) ? " and id_registro = ".$this->id_registro : '')
        .(isset($this->fecha_registro) ? "and fecha_registro = '".$this->fecha_registro."', " : '')
        .(isset($this->mes) ? " and date(fecha_registro) = '".$this->mes."'" : "")
        .(isset($this->id_ubicacion) ? " and id_ubicacion = ".$this->id_ubicacion : '')
        .(isset($this->latitud) ? " and latitud = '".$this->latitud."'" : "")	
        .(isset($this->longitud) ? " and longitud = '".$this->longitud."'" : "")	
        .(isset($this->comentarios) ? " and comentarios = '".$this->comentarios."'" : "")	
        .(isset($this->fecha_ubicacion) ? "and fecha_ubicacion = '".$this->fecha_ubicacion."', " : '')
        .(isset($this->fecha_pedir) ? "and fecha_pedir = '".$this->fecha_pedir."', " : '')
        .(isset($this->id_entrega) ? " and id_entrega = ".$this->id_entrega : '')
        .(isset($this->fecha_entregado) ? "and fecha_entregado = '".$this->fecha_entregado."', " : '')
        .(isset($this->fecha_notificado) ? "and fecha_notificado = '".$this->fecha_notificado."', " : '')
        .(isset($this->comentarios_entregado) ? " and comentarios_entregado = '".$this->comentarios_entregado."'" : "")	
        .(isset($this->comentarios_cliente) ? " and comentarios_cliente = '".$this->comentarios_cliente."'" : "")	
        .(isset($this->token) ? " and token = '".$this->token."'" : "")	
		.(isset($this->condiciones) ? " and condiciones = ".$this->condiciones : "")
		.(isset($this->estatus) ? " and estatus = ".$this->estatus : "")
		." group by id order by id asc";
        $this->getResultsFromQuery();
	}
	}
	
	public function set(){
		$this->query = "INSERT INTO automovil
						(id_valet,
						placas,
                        descripcion,
						foto1,
                        foto2,
                        foto3,
						id_registro,
                        fecha_registro,
                        id_ubicacion,
                        latitud,
                        longitud,
                        comentarios,
                        fecha_ubicacion,
                        fecha_pedir,
                        id_entrega,
						fecha_entregado,
						comentarios_entregado,
                        fecha_notificado,
                        comentarios_cliente,
                        token,
                        condiciones,
						estatus
						)values
                        (".$this->id_valet.", "
                        ."'".$this->placas."',"
                        ."'".$this->descripcion."',"
                        ."'".$this->foto1."',"
                        ."'".$this->foto2."',"
                        ."'".$this->foto3."',"
                        .$this->id_registro.", "
						."'".$this->fecha_registro."', "
                        .$this->id_ubicacion.", "
						."'".$this->latitud."', "
                        ."'".$this->longitud."', "
                        ."'".$this->comentarios."', "
                        ."'".$this->fecha_ubicacion."', "
                        ."'".$this->fecha_pedir."', "
                        .$this->id_entrega.", "
                        ."'".$this->fecha_entregado."', "
                        ."'".$this->comentarios_entregado."', "
                        ."'".$this->fecha_notificado."', "
                        ."'".$this->comentarios_cliente."', "
                        ."'".$this->token."', "
                        .$this->condiciones.", "
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
		$this->query = "UPDATE automovil set "
						 .(isset($this->id_valet) ? " id_valet = ".$this->id_valet.", " : '')
                         .(isset($this->placas) ? "placas = '".$this->placas."', " : '')
                         .(isset($this->descripcion) ? "descripcion = '".$this->descripcion."', " : '')
                         .(isset($this->foto1) ? "foto1 = '".$this->foto1."', " : '')
                         .(isset($this->foto2) ? "foto2 = '".$this->foto2."', " : '')
                         .(isset($this->foto3) ? "foto3 = '".$this->foto3."', " : '')
						 .(isset($this->id_registro) ? " id_registro = ".$this->id_registro.", " : '')
						 .(isset($this->fecha_registro) ? "fecha_registro = '".$this->fecha_registro."', " : '')
						 .(isset($this->id_ubicacion) ? " id_ubicacion = ".$this->id_ubicacion.", " : '')
                         .(isset($this->latitud) ? "latitud = '".$this->latitud."', " : '')
                         .(isset($this->longitud) ? "longitud = '".$this->longitud."', " : '')
                         .(isset($this->comentarios) ? "comentarios = '".$this->comentarios."', " : '')
                         .(isset($this->fecha_ubicacion) ? "fecha_ubicacion = '".$this->fecha_ubicacion."', " : '')
                         .(isset($this->fecha_pedir) ? "fecha_pedir = '".$this->fecha_pedir."', " : '')
						 .(isset($this->id_entrega) ? " id_entrega = ".$this->id_entrega.", " : '')
                         .(isset($this->fecha_entregado) ? "fecha_entregado = '".$this->fecha_entregado."', " : '')
                         .(isset($this->fecha_notificado) ? "fecha_notificado = '".$this->fecha_notificado."', " : '')
                         .(isset($this->comentarios_entregado) ? "comentarios_entregado = '".$this->comentarios_entregado."', " : '')
                         .(isset($this->comentarios_cliente) ? "comentarios_cliente = '".$this->comentarios_cliente."', " : '')
                         .(isset($this->token) ? "token = '".$this->token."', " : '')
						 .(isset($this->condiciones) ? " condiciones = ".$this->condiciones.", " : '')
						."estatus = ".$this->estatus." "
						."where id = ".$this->id;
			return $this->executeSingleQuery2();
	}
    
	
	
	public function delete(){
		$this->query = "DELETE FROM automovil where id = ".$this->id;
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
