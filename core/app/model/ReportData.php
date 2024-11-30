<?php
	class ReportData {
		public static $tablename = "report";

		public function __construct(){
			$this->user_id = "";
			$this->code_equipo = "";
            $this->horometro_start = "";
            $this->horometro_end = "";
            $this->horometro_result = "";
            $this->km_start = "";
            $this->km_end = "";
            $this->km_result = "";
			$this->fuel = "";
			$this->hk_fuel = "";
			$this->front_work = "";
			$this->description_work = "";
			$this->front_work_2 = "";
			$this->description_work_2 = "";
			$this->front_work_3 = "";
			$this->description_work_3 = "";
			$this->front_work_4 = "";
			$this->description_work_4 = "";
			$this->front_work_5 = "";
			$this->description_work_5 = "";
            $this->observation = "";
            $this->turno = "";         
            $this->created_at = "NOW()";
		}
		public function getUser(){ return UserData::getById($this->user_id);}

		public function add(){
			$sql = "insert into report (user_id,code_equipo,horometro_start,horometro_end,horometro_result,km_start,km_end,km_result,fuel,hk_fuel,front_work,front_work_2,front_work_3,front_work_4,front_work_5,observation,turno,created_at) ";
			$sql .= "value (\"$this->user_id\",\"$this->code_equipo\",\"$this->horometro_start\",\"$this->horometro_end\",\"$this->horometro_result\",\"$this->km_start\",\"$this->km_end\",\"$this->km_result\",\"$this->fuel\",\"$this->hk_fuel\",\"$this->front_work\",\"$this->front_work_2\",\"$this->front_work_3\",\"$this->front_work_4\",\"$this->front_work_5\",\"$this->observation\",\"$this->turno\",$this->created_at)";
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

	// partiendo de que ya tenemos creado un objecto ReportData previamente utilizamos el contexto
		public function update(){
			$sql = "update ".self::$tablename." set horometro_end=\"$this->horometro_end\",horometro_result=\"$this->horometro_result\",km_end=\"$this->km_end\",km_result=\"$this->km_result\",fuel=\"$this->fuel\",hk_fuel=\"$this->hk_fuel\",front_work=\"$this->front_work\",description_work=\"$this->description_work\",front_work_2=\"$this->front_work_2\",description_work_2=\"$this->description_work_2\",front_work_3=\"$this->front_work_3\",description_work_3=\"$this->description_work_3\",front_work_4=\"$this->front_work_4\",description_work_4=\"$this->description_work_4\",front_work_5=\"$this->front_work_5\",description_work_5=\"$this->description_work_5\",observation=\"$this->observation\" where id=$this->id";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ReportData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ReportData());
		}

		public static function getAllUser($id){
			$sql = "select * from ".self::$tablename." where user_id=$id order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ReportData());
		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ReportData());
		}

	}

?>