<?php
class ArticulosData {
	public static $tablename = "articulos";

	public function ArticulosData(){
		$this->nombre = "";
		$this->id_fabrica = "";
		$this->precio_costo = "";
		$this->precio_venta = "";
		$this->existencias = "";
		$this->descripcion = "";
		$this->created_at = "NOW()";
	}

	//ATENCION PARA FABRICAS
	public function getFabrica(){ return FabricasData::getById($this->id_fabrica);}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,id_fabrica,precio_costo,precio_venta,existencias,descripcion,created_at) ";
		$sql .= "value (\"$this->nombre\",\"$this->id_fabrica\",\"$this->precio_costo\",\"$this->precio_venta\",\"$this->existencias\",\"$this->descripcion\",NOW())";
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

	// ATENCION PARA FABRICAS
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",id_fabrica=\"$this->id_fabrica\",precio_costo=\"$this->precio_costo\",precio_venta=\"$this->precio_venta\",existencias=\"$this->existencias\",descripcion=\"$this->descripcion\",is_active=\"$this->is_active\" where id=$this->id";
		Executor::doit($sql);
	}

	//ATENCION PARA FABRICAS
	public function del_fabrica(){
		$sql = "update ".self::$tablename." set id_fabrica=NULL where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ArticulosData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArticulosData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArticulosData());
	}


	//FUNCION QUE SIRVE PARA BUSCAR, EN ESTE CASO SE DESTITUYE
	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where nombre like '%$p%' or precio_venta like '%$p%' or id like '%$p%' or descripcion like '%$p%' or precio_compra like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArticulosData());
	}


	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArticulosData());
	}

	//ATENCION PARA FABRICAS
	public static function getAllByFabricaId($fabrica_id){
		$sql = "select * from ".self::$tablename." where fabrica_id=$fabrica_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ArticulosData());
	}







}

?>