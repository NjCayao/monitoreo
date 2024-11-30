<?php
class UserData {
	public static $tablename = "user";

	public function getStock(){ return StockData::getById($this->stock_id); }

	public function __construct(){
		$this->name = "";
		$this->lastname = "";
		$this->username = "";
		$this->dni = "";
		$this->email = "";
		$this->image = "";
		$this->counter = "";
		$this->password = "";

		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into user (name,lastname,username,dni,equipo,cdgequipo,frente_trabajo,celular,email,image,kind,stock_id,password,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->dni\",\"$this->equipo\",\"$this->cdgequipo\",\"$this->frente_trabajo\",\"$this->celular\",\"$this->email\",\"$this->image\",\"$this->kind\",$this->stock_id,\"$this->password\",$this->created_at)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",username=\"$this->username\",lastname=\"$this->lastname\",dni=\"$this->dni\",equipo=\"$this->equipo\",cdgequipo=\"$this->cdgequipo\",celular=\"$this->celular\",image=\"$this->image\",status=\"$this->status\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_counter(){
		$sql = "update ".self::$tablename." set counter=\"$this->counter\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UserData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by id desc";		
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getAllOperators(){
		$sql = "select * from ".self::$tablename." where kind=3 order by id desc";		
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UserData());
	}

	public static function getByDNI($dni) {
		$sql = "SELECT * FROM " . self::$tablename . " WHERE dni = '$dni'";
		$query = Executor::doit($sql);
		return Model::one($query[0], new UserData());
	}
}

?>