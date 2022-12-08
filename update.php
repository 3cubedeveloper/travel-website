<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update a record</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
   <link rel="icon" type="image/x-icon" href="images/logo.ico">
   <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navigation">
        <ul>
            <li><a href="index.html">Colosseum</a></li> 
            <li><a href="grandcanal.html">Grand Canal</a></li> 
            <li><a href="leaningtower.html">Leaning Tower</a></li>
            <li><a href="touristattraction.html">Tourist Attraction Sites</a></li>
            <li><a href="attractionsites.php">Common Sites</a>
            <li><a href="signup.html">Signup</a></li>
            <li><a href="contactme.html">Contact me</a></li>
        </ul>
    </nav>
	<div class="container">
	   <div class="page-header">
	      <h1>Update a site</h1>  
	   </div>
	   <?php
	      $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID is not found.');
		  include 'config/database.php';
		  
		  try{
			 $query = "SELECT id, site, city, country FROM traveltbl WHERe id = ? LIMIT 0,1";
             $stmt = $con->prepare($query);
             $stmt->bindParam(1, $id);
             $stmt->execute();
             $row = $stmt->fetch(PDO::FETCH_ASSOC);

             $site = $row['site'];
             $city = $row['city'];
             $country = $row['country'];
			 
		  }catch(PDOException $exception){
			  die('ERROR: ' .$exception->getMessage());
		  }
	   ?>
 
        <?php
          if($_POST){
			  try{
				 $query = "UPDATE traveltbl SET site=:site, city=:city, country=:country WHERE id = :id"; 
				 $stmt = $con->prepare($query);
				 $site=htmlspecialchars(strip_tags($_POST['site']));
				 $city=htmlspecialchars(strip_tags($_POST['city']));
				 $country=htmlspecialchars(strip_tags($_POST['country']));
				 
				 $stmt->bindParam(':site', $site);
				 $stmt->bindParam(':city', $city);
				 $stmt->bindParam(':country', $country);
				 $stmt->bindParam(':id', $id);
				 
				 if($stmt->execute()) {
					 echo "<div class='alert alert-success'>Record was updated successfully.</div>";
				 }else{
					 echo "<div class='alert alert-danger'>Unable to update the record.</div>";
				 }
			  }catch(PDOException $exception){
				  die('ERROR: ' . $exception->getMessage());
			  }
		  }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
		  <table class='table table-hover table-responsive table-bordered'>
		    <tr>
			  <td>Site</td>
			  <td><input type="text" name='site' value="<?php echo htmlspecialchars($site, ENT_QUOTES); ?>" class='form-control'/></td>
			</tr>
			<tr>
			  <td>City</td>
			  <td><input type='text' name='city' value="<?php echo htmlspecialchars($city, ENT_QUOTES);  ?>" class='form-control' /></td>
			</tr>
			<tr>
			  <td>Country</td>
			  <td><input type='text' name='country' value="<?php echo htmlspecialchars($country, ENT_QUOTES);  ?>" class='form-control' /></td>
			</tr>
			<tr>
			   <td></td>
			   <td>
			     <input type='submit' value='Save Changes' class='btn btn-primary' />
                <a href='attractionsites.php' class='btn btn-danger'>Back to all tourist sites</a>
			   </td>
			</tr>
		  </table>
		</form>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</body>