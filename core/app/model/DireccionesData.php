<?php

class DireccionesData {
	public static $tablename = "direcciones";

	public function DireccionesData(){
		$this->nombre = "";
		$this->calle = "";
		$this->comuna = "";
		$this->ciudad = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,calle,comuna,ciudad,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->calle\",\"$this->comuna\",\"$this->ciudad\",NOW())"; // sino funciona quitar la contradiagonal que sigue de unit
		return Executor::doit($sql);
	}
	
	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto DireccionesData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",calle=\"$this->calle\",comuna=\"$this->comuna\",ciudad=\"$this->ciudad\",is_active=\"$this->is_active\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new DireccionesData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new DireccionesData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DireccionesData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where barcode like '%$p%' or name like '%$p%' or id like '%$p%' or description like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new DireccionesData());
	}

}

?>