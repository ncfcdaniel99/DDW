<?php
require 'config.php';
session_start(); 

$sql = "UPDATE cars SET make = :make, model = :model, 
            Reg = :Reg,  
            colour = :colour, 
            miles = :miles,  
            price = :price,  
            dealer = :dealer,
			town = :town, 
            telephone = :telephone,  
            description = :description,  
            region = :region,  
            picture = :picture,
			            purchased = :purchased

            WHERE carIndex = :carIndex"
			;
			
$sqlQuery = $pdo->prepare($sql);                                  
$sqlQuery->bindParam(':make', $_POST['make']);       
$sqlQuery->bindParam(':model', $_POST['model']);    
$sqlQuery->bindParam(':Reg', $_POST['Reg']);
$sqlQuery->bindParam(':colour', $_POST['colour']); 
$sqlQuery->bindParam(':miles', $_POST['miles']);   
$sqlQuery->bindParam(':price', $_POST['price']);   
$sqlQuery->bindParam(':dealer', $_POST['dealer']); 
$sqlQuery->bindParam(':town', $_POST['town']); 
$sqlQuery->bindParam(':telephone', $_POST['telephone']); 
$sqlQuery->bindParam(':description', $_POST['description']);   
$sqlQuery->bindParam(':region', $_POST['region']);   
$sqlQuery->bindParam(':picture', $_POST['picture']); 
$sqlQuery->bindParam(':purchased', $_POST['purchased']); 
$sqlQuery->bindParam(':carIndex',$carIndex); 
$sqlQuery->execute(); 
?>
