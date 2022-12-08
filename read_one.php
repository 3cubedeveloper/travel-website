<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="icon" type="image/x-icon" href="images/logo.ico">
  <link rel="stylesheet" href="style.css">
  <title>Read One Record</title>
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
	    <h1>Read Tourist Site</h1>
	  </div>
	  <?php
	    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID nor found.');
		include 'config/database.php';
		try{
			$query = "SELECT id, site, city, country FROM traveltbl WHERE id = ? LIMIT 0,1";
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
	  <table class='table table-hover table-responsive table-bordered'>
	    <tr>
		  <td>Site</td>
		  <td><?php echo htmlspecialchars($site, ENT_QUOTES); ?></td>
		</tr>
		<tr>
		  <td>City</td>
		  <td><?php echo htmlspecialchars($city, ENT_QUOTES); ?></td>
		</tr>
		<tr>
		  <td>Country</td>
		  <td><?php echo htmlspecialchars($country, ENT_QUOTES); ?></td>
		</tr>
		<tr>
		  <td></td>
		  <td>
		    <a href='attractionsites.php' class='btn btn-danger'>Back to all Attraction Sites</a>
		  </td>
		</tr>
	  </table>
	</div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>