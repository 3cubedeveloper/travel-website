<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <nav class="navigation">
            <ul>
                <li><a href="#">Colosseum</a></li> 
                <li><a href="grandcanal.html">Grand Canal</a></li> 
                <li><a href="leaningtower.html">Leaning Tower</a></li>
                <li><a href="touristattraction.html">Tourist Attraction Sites</a></li>
				<!--<li><a href="attractionsites.php">Common Sites</a>-->
				<li><a href="contactme.html">Contact me</a></li>
                <li><a href="registration.php" id="register">Register</a></li>
				<li><a href="login.php" id="login">Login</a></li>
                
            </ul>
   </nav>
<?php
   require('config/db.php');
   session_start();
   if(isset($_POST['username'])) {
	   $username = stripslashes($_REQUEST['username']);
	   $username = mysqli_real_escape_string($con, $username);
	   $password = stripslashes($_REQUEST['password']);
	   $password = mysqli_real_escape_string($con, $password);
	   
	   $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
	   
	   $result = mysqli_query($con, $query) or die(mysqli_error());
	   $rows = mysqli_num_rows($result);
	   if($rows == 1) {
		  $_SESSION['username'] = $username;
          //redirect to attractionsites.php
          header("Location: attractionsites.php");		  
	   } else {
		   echo "<div class='form'>
		         <h3>Incorrect Username/ Password.</h3><br/>
				 <p class='link'>Please <a href='login.php'>Login</a> again.</p>
				 </div>";
	   }
   } else {
?>
   <div id="container-form">
     <form id="login-form" class="form" method="post" name="login">
       <h1 class="login-title">Login</h1>
	   <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true">
	   <input type="password" class="login-input" name="password" placeholder="Password">
	   <input type="submit" value="Login" name="submit" class="login-button">
	   <p class="link"><a href="registration.php">New Registration</a></p>
     </form>
   </div>
<?php	   
   }
?>
</body>
</html>