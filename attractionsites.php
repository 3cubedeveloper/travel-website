<?php
  include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Travel - Share your travels</title>
        <link rel="icon" type="image/x-icon" href="images/logo.ico">
        <link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrap.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <style>
            body{ background-color:whitesmoke ;}
            h3{color: aqua;}
			.m-r-1em{ margin-right: 1em;}
			.m-b-1em{ margin-bottom: 1em;}
			.m-1-1em{ margin-left: 1em;}
			.mt0{ margin-top: 0;}
        </style>
    </head>
    <body>
        <!-- this page looks at Colosseum tourist attraction-->
        <nav class="navigation">
            <ul>
                <li><a href="#">Colosseum</a></li> 
                <li><a href="grandcanal.html">Grand Canal</a></li> 
                <li><a href="leaningtower.html">Leaning Tower</a></li>
                <li><a href="touristattraction.html">Tourist Attraction Sites</a></li>
                <!--<li><a href="#">Common Sites</a>-->
                <li><a href="contactme.html">Contact me</a></li>
				<li><a href="logout.php" id="logout">Logout</a></li>
            </ul>
            </nav>
        <hr>
        <div class="container">
          <div class="page-header">
		    <h1>Display Tourist Sites</h1>
		  </div>
		  <?php
		    include 'config/database.php';
			?>
			<p style="font-size: 2.5em; margin-left: 10px; font-weight: bold;">Hello, <?php echo $_SESSION['username']; ?>!</p>
			<?php
			$action = isset($_GET['action']) ? $_GET['action'] : "";
		    if($action=='deleted'){
			  echo "<div class='alert alert-success'>Record was deleted.</div>";
		    }
			
			//select data
			$query = "SELECT id, site, city, country FROM traveltbl ORDER BY id DESC";
			$stmt = $con->prepare($query);
			$stmt->execute();
			$num = $stmt->rowCount();
			echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Tourist Site</a>";
			if($num>0){
			   //add table for storing data
			   echo "<table class='table table-hover table-responsive table-bordered'>";
			   echo "<tr>
			          <th>ID</th>
					  <th>Site</th>
					  <th>City</th>
					  <th>Country</th>
					</tr>";
					
					while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					  extract($row);
					  echo "<tr>
					         <td>{$id}</td>
							 <td>{$site}</td>
							 <td>{$city}</td>
							 <td>{$country}</td>
							 <td>";
							 echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
							 echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
							 echo "<a href='#' onclick='delete_user({$id});' class='btn btn-danger'>Delete</a>";
						echo "</td>";
					   echo "</tr>";
					}
			   echo "</table>";
			}else{
			  echo "<div class='alert alert-danger'>No records found.</div>";
			}
		  ?>
        </div>
        <p id="footer">&copy; Travel - Share your travels</p>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script>
            function delete_user(id){
	            var answer = confirm('Are you sure you want to delete?');
	            if(answer){
		            window.location = 'delete.php?id=' + id;
	            }
            }
        </script>
 
    </body>
</html>

