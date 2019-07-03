<?php 

namespace App;
use PDO;

class Connection{

	public $conn;

	public function __construct()
	{
		$this->conn = new PDO('mysql:host=localhost;dbname=ctg219-oop','root','');
	}


	public function insertAvenger($name,$power,$is_died)
	{
		try{
			$statement = $this->conn->prepare("INSERT INTO avenger (name,power,is_died) VALUES (:name,:power,:is_died)");
					$statement->execute(
						array(
							':name' => $name,
							':power' => $power,
							':is_died' => $is_died
						)
					);
					echo "Inserted";
		}catch(\Exception $e){
			echo "error: ".$e->getMessage();
		}
		
	}

	public function getAll($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
		return $statement->fetchAll();
	}


	public function update($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
	}


}


?>