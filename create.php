<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add a travel site</title>
  <link rel="icon" type="image/x-icon" href="images/logo.ico">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
</head>
<body>
 <nav class="navigation">
            <ul>
                <li><a href="#">Colosseum</a></li> 
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
	  <h1>Add tourist attraction site</h1>
	</div>
	<!-- PHP insert code will be here -->
	<?php 
	if($_POST){
		include 'config/database.php';
		try{
			$query = "INSERT INTO traveltbl SET site=:site, city=:city, country=:country";
			$stmt = $con->prepare($query);
			
			// posted values 
			$site=htmlspecialchars(strip_tags($_POST['site']));
			$city=htmlspecialchars(strip_tags($_POST['city']));
			$country=htmlspecialchars(strip_tags($_POST['country']));
			
			//binding the parameters
			$stmt->bindParam(':site', $site);
			$stmt->bindParam(':city', $city);
			$stmt->bindParam(':country', $country);
			
			if($stmt->execute()) {
			  echo "<div class='alert alert-success'>Site record was saved successfully.</div>";
			}else{
			  echo "<div class='alert alert-danger'>Unable to save the site record.</div>";
			}
		}catch(PDOException $exception){
			die('ERROR: ' .$exception->getMessage());
		}
	}
	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	  <table class='table table-hover table-responsive table-bordered'>
	    <tr>
		  <td>Attraction Site</td>
		  <td><input type="text" name="site" class="form-control"/></td>
		</tr>
		<tr>
		  <td>City</td>
		  <td><input type="text" name="city" class="form-control"/></td>
		</tr>
		<tr>
		  <td>Country</td>
		  <td><input type="text" name="country" class="form-control"/></td>
		</tr>
		<tr>
		  <td></td>
		  <td>
		     <input type="submit" value="Save Site" class="btn btn-primary"/>
			 <a href="attractionsites.php" class="btn btn-danger">Back to All Sites</a>
		  </td>
		</tr>
	  </table>
	</form>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>