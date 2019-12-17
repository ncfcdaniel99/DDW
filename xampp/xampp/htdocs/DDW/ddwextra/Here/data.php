<?php
require 'db.php';

if(isset($_POST['makeid'])) 
	{
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT model FROM cars WHERE make = " . $_POST['makeid']);
		$stmt->execute();
		$models = $stmt->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($models);
	}
	


function loadMakes() 
{
		$db = new DbConnect;
		$conn = $db->connect();

		$stmt = $conn->prepare("SELECT DISTINCT make FROM cars");
		$stmt->execute();
		$makes = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $makes;
	}

?>