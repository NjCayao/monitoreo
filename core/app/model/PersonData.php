<?php
	class PersonData {
		public static $tablename = "person";

		public function __construct(){
			$this->id = "";
			$this->image = "";
			$this->dni = "";
			$this->name = "";
			$this->lastname = "";
			$this->address = "";
			$this->phone = "";
			$this->email = "";
			$this->kind = "";
			$this->user_id = "";
			$this->created_at = "NOW()";
		}

		public function add_client(){
			$sql = "insert into person (dni,name,lastname,address,phone,email,kind,user_id,created_at) ";
			$sql .= "value (\"$this->dni\",\"$this->name\",\"$this->lastname\",\"$this->address\",\"$this->phone\",\"$this->email\",1,$this->user_id,$this->created_at)";
			Executor::doit($sql);
		}

		public function add_provider(){
			$sql = "insert into person (dni,name,lastname,address,phone,email,kind,user_id,created_at) ";
			$sql .= "value (\"$this->dni\",\"$this->name\",\"$this->lastname\",\"$this->address\",\"$this->phone\",\"$this->email\",2,$this->user_id,$this->created_at)";
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

	// partiendo de que ya tenemos creado un objecto PersonData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",address=\"$this->address\",lastname=\"$this->lastname\",phone=\"$this->phone\" where id=$this->id";
			Executor::doit($sql);
		}

		public function update_client(){
			$sql = "update ".self::$tablename." set dni=\"$this->dni\",name=\"$this->name\",email=\"$this->email\",address=\"$this->address\",lastname=\"$this->lastname\",phone=\"$this->phone\",is_active_access=\"$this->is_active_access\",password=\"$this->password\",has_credit=\"$this->has_credit\",credit_limit=\"$this->credit_limit\" where id=$this->id";
			Executor::doit($sql);
		}

		public function update_provider(){
			$sql = "update ".self::$tablename." set dni=\"$this->dni\",name=\"$this->name\",email=\"$this->email\",address=\"$this->address\",lastname=\"$this->lastname\",phone=\"$this->phone\" where id=$this->id";
			Executor::doit($sql);
		}

		public function update_contact(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",email=\"$this->email\",address=\"$this->address\",lastname=\"$this->lastname\",phone=\"$this->phone\" where id=$this->id";
			Executor::doit($sql);
		}


		public function update_passwd(){
			$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
			Executor::doit($sql);
		}


		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new PersonData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData());
		}

		public static function getAllByLast(){
			$sql = "select * from ".self::$tablename." order by id desc limit 1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData
			());
		}

		public static function getAllCount(){
			$sql = "select * from ".self::$tablename. " where kind=1 order by id desc limit 1";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData());
		}

		public static function getClients(){
			$sql = "select * from ".self::$tablename." where kind=1 order by name,lastname";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData());
		}

		public static function getClientsWithCredit(){
			$sql = "select * from ".self::$tablename." where kind=1 and has_credit=1 order by name,lastname";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData());
		}

		public static function getContacts(){
			$sql = "select * from ".self::$tablename." where kind=3 order by name,lastname";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData());
		}

		public static function getProviders(){
			$sql = "select * from ".self::$tablename." where kind=2 order by name,lastname";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData());

		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new PersonData());

		}

	}

?>