<?php

include "config.php";

$request = 0;

if(isset($_POST['request'])){
   $request = $_POST['request'];
}

// Fetch state list by countryid
if($request == 1){
   $make = $_POST['make'];

   $stmt = $conn->prepare("SELECT * FROM cars WHERE make=:make ORDER BY name");
   $stmt->bindValue(':make', (int)$make, PDO::PARAM_INT);

   $stmt->execute();
   $model = $stmt->fetchAll();

   $response = array();
   foreach($model as $model){
      $response[] = array(
        "model" => $model['model'],
      );
   }

   echo json_encode($response);
   exit;
}

// Fetch city list by stateid
if($request == 2){
   $model = $_POST['model'];

   $stmt = $conn->prepare("SELECT * FROM cars WHERE model=:model ORDER BY name");
   $stmt->bindValue(':model', (int)$model, PDO::PARAM_INT);

   $stmt->execute();
   $model = $stmt->fetchAll();

   $response = array();
   foreach($model as $model){
      $response[] = array(
         "model" => $state['model'],

      );
   }

   echo json_encode($response);
   exit;
}