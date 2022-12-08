<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
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
  require("config/db.php");
  if(isset($_REQUEST['username'])){
	  $username = stripslashes($_REQUEST['username']);
	  $username = mysqli_real_escape_string($con, $username);
	  $email = stripslashes($_REQUEST['email']);
	  $email = mysqli_real_escape_string($con, $email);
	  $password = stripslashes($_REQUEST['password']);
	  $password = mysqli_real_escape_string($con, $password);
	  $create_datetime = date("Y-m-d H:i:s");
	  $query = "INSERT INTO `users` (username, password, email, create_datetime) VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
	  $result = mysqli_query($con, $query);
	  if($result) {
		  echo "<div class='form'>
		       <h3>You have registered sucessfully.</h3><br>
			   <pclass='link'>You can now <a href='login.php'>Login</a></p>
			   </div>";
	  } else {
		  echo "<div class='form'>
		       <h3>Required fields are missing.</h3><br>
			   <p class='link'>Click here to <a href='registration.php'>register</a> again.</p>
			   </div>";
	  }
  } else {
?>
  <div id="container-form">
    <form id="signup-form" class="form" action="" method="post">
      <h1 class="login-title">Registration</h1>
	  <input type="text" class="login-input" name="username" placeholder="Username" required/>
	  <input type="text" class="login-input" name="email" placeholder="Email Address">
	  <input type="password" class="login-input" name="password" placeholder="Password">
	  <input type="submit" name="submit" value="Register" class="login-button">
	  <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
  </div>
<?php	  
  }
?>
</body>
</html>