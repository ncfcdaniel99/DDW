
<?php
require 'db.php';
if(isset($_POST['make_id']))
   {

		$db = new DbConnect;
		$conn = $db->connect();
		$stmt = $conn->prepare("SELECT  * FROM cars WHERE make = " . $_POST['make_id']);
		$stmt->execute();
        $models = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($models as $model) 
        {
          echo "<option id='".$model['model']."' value='".$model['model']."'>".$model['model']."</option>";
        }



     }
 else {
  header('location: ./');
}
?>