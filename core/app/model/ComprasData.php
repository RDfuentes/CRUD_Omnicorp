<?php
class ComprasData {
	public static $tablename = "compras";

	public function ComprasData(){
		$this->id_cliente = "";
		$this->id_envio = "";
		$this->id_articulo = "";
		$this->cantidad = "";
		$this->total = "";
		$this->nota = "";
		$this->created_at = "NOW()";
	}

	//ATENCION PARA CLIENTES, ENVIOS Y ARTICULOS
	public function getCliente(){ return ClientesData::getById($this->id_cliente);}
	public function getEnvio(){ return DireccionesData::getById($this->id_envio);}
	public function getArticulo(){ return ArticulosData::getById($this->id_articulo);}

	public function add(){
		$sql = "insert into ".self::$tablename." (id_cliente,id_envio,id_articulo,cantidad,total,nota,created_at) ";
		$sql .= "value (\"$this->id_cliente\",\"$this->id_envio\",\"$this->id_articulo\",\"$this->cantidad\",\"$this->total\",\"$this->nota\",NOW())";
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

	//ATENCION PARA CLIENTES, ENVIOS Y ARTICULOS
	public function update(){
		$sql = "update ".self::$tablename." set id_cliente=\"$this->id_cliente\",id_envio=\"$this->id_envio\",id_articulo=\"$this->id_articulo\",cantidad=\"$this->cantidad\",total=\"$this->total\",nota=\"$this->nota\",is_active=\"$this->is_active\" where id=$this->id";
		Executor::doit($sql);
	}

	//ATENCION PARA CLIENTES, ENVIOS Y ARTICULOS
	public function del_cliente(){
		$sql = "update ".self::$tablename." set id_cliente=NULL where id=$this->id";
		Executor::doit($sql);
	}
	public function del_envio(){
		$sql = "update ".self::$tablename." set id_envio=NULL where id=$this->id";
		Executor::doit($sql);
	}
	public function del_articulo(){
		$sql = "update ".self::$tablename." set id_articulo=NULL where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ComprasData());

	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprasData());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprasData());
	}


	//FUNCION QUE SIRVE PARA BUSCAR, EN ESTE CASO SE DESTITUYE
	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where cantidad like '%$p%' or total like '%$p%' or id like '%$p%' or nota like '%$p%' or id like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprasData());
	}


	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprasData());
	}

	//ATENCION PARA CLIENTES, ENVIOS Y ARTICULOS
	public static function getAllByClienteId($cliente_id){
		$sql = "select * from ".self::$tablename." where cliente_id=$cliente_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ComprasData());
	}







}

?>