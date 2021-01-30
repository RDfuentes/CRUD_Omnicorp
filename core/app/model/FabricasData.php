<?php
class FabricasData {
	public static $tablename = "fabricas";

	public function FabricasData(){
		$this->nombre = "";
		$this->telefono1 = "";
		$this->telefono2 = "";
		$this->created_at = "NOW()";
	}


	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,telefono1,telefono2,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->telefono1\",\"$this->telefono2\",NOW())"; // sino funciona quitar la contradiagonal que sigue de unit
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

	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",telefono1=\"$this->telefono1\",telefono2=\"$this->telefono2\",is_active=\"$this->is_active\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new FabricasData());

	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new FabricasData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FabricasData());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where barcode like '%$p%' or name like '%$p%' or id like '%$p%' or description like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new FabricasData());
	}

}

?>