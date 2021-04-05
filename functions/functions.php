<?php 
	
	class webApps{
		public $localhost = "localhost";
		public $user = "root";
		public $password = "";
		public $db = "ecommerce_project";
		public $con;
		
		public function __construct(){
			$this->con = new mysqli($this->localhost,$this->user,$this->password,$this->db);
		}

		public function insert($sql){
			$insert = $this->con->query($sql);
			$insert_id = mysqli_insert_id($this->con);
			if($insert){
				return $insert_id;
			}
		}

		public function Select($sql){
			$select = $this->con->query($sql);
			if($select){
				return $select;
			}
		}

		public function login($sql){
			$select = mysqli_num_rows($this->con->query($sql));
			if($select > 0){
				throw new Exception();
			}
		}
	}

	$webApps = new webApps;
	
?>