<?php
class DBOperation{
	private $host = 'mysql';
	private $user = 'vnc';
	private $db = 'vncDb';
	private $pass = 'Newtech@2022';
	private $conn;
	
	public function __construct() {
		$this->conn = new PDO("mysql:host=".$this -> host.";dbname=".$this -> db, $this -> user, $this -> pass);
	}
	
	public function query($sql){
		try{
			foreach ($this->conn->query($sql) as $row)
			{
				$result[]=$row;
			}
			
			if(empty($result)){
				$response["success"] = "failure";
				$response["message"] = "";
				return json_encode($response);
			}
			else{
				$response["success"] = "success";
				$response["message"] = "";
				$response["data"] = $result;
				
				return json_encode($response);
			}
		}
		catch(PDOException $e) {
			//echo "Error: " . $e->getMessage();
			$response["success"] = "failure";
			$response["message"] = "Sorry, Invalid username or password";
			return json_encode($response);
		}
	}
	
	public function insert($sql){
		try{
			$this->conn->exec($sql);
			
			$response["success"] = "success";
			$response["message"] = "";
			return json_encode($response);
		}
		catch(PDOException $e) {
			//echo "Error: " . $e->getMessage();
			$response["success"] = "failure";
			$response["message"] = "Sorry, An error occurred";
			return json_encode($response);
		}
	}
}