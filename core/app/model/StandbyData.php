<?php
	class StandbyData {
		public static $tablename = "standby";

		public function __construct(){
			$this->user_id = "";
			$this->user_dni = "";
            $this->user_equipo = "";
            $this->user_cdgequipo = "";
            $this->user_celular = "";
            $this->st_observation = "";                    
            $this->created_at = "NOW()";
		}
		public function getUser(){ return UserData::getById($this->user_id);}

		public function add(){
			$sql = "insert into standby (user_id,user_dni,user_equipo,user_cdgequipo,user_celular,st_observation,created_at) ";
			$sql .= "value (\"$this->user_id\",\"$this->user_dni\",\"$this->user_equipo\",\"$this->user_cdgequipo\",\"$this->user_celular\",\"$this->st_observation\",$this->created_at)";
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

	// partiendo de que ya tenemos creado un objecto StandbyData previamente utilizamos el contexto
		// public function update(){
		// 	$sql = "update ".self::$tablename." set horometro_end=\"$this->horometro_end\",horometro_result=\"$this->horometro_result\",km_end=\"$this->km_end\",km_result=\"$this->km_result\",fuel=\"$this->fuel\",hk_fuel=\"$this->hk_fuel\",front_work=\"$this->front_work\",observation=\"$this->observation\" where id=$this->id";
		// 	Executor::doit($sql);
		// }

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new StandbyData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new StandbyData());
		}

		public static function getAllUser($id){
			$sql = "select * from ".self::$tablename." where user_id=$id order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new StandbyData());
		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new StandbyData());
		}

	}

?>