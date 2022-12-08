<?php 
  include 'config/database.php';
  try{
	  $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found');
	  $query = "DELETE FROM traveltbl WHERE id = ?";
	  $stmt = $con->prepare($query);
	  $stmt->bindParam(1, $id);
	  
	  if($stmt->execute()) {
		  header('Location: attractionsites.php?action=deleted');
	  }else{
		  die('Unable to delete record');
	  }
  }catch(PODException $exception){
	 die('ERROR: ' . $exception->getMessage()); 
  }
?>