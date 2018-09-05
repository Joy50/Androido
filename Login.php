<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="login-box">
	<img src="av.png" class="avatar">
	<h1>Login here</h1>
	<form method="POST" action="">
			<p>
				<label>Email</label>
				<input type="text" name="emaila" placeholder="Enter your Email">
			</p>
			<p>
				<label>password</label>
				<input type="password" name="psw" placeholder="Enter Your Password">
			</p>
			<p>
				<input type="submit" name="submit" value="Login">
			</p>
		<a href="#">Forgot Password</a>
	</form>
	<?php
		
	    if(isset($_POST['submit'])){
	    	if(! empty($_POST['emaila'])&& ! empty($_POST['psw'])){
	    		
	    		$email = $_POST['emaila'];
	            $pass = $_POST['psw'];

	            $conn=new mysqli('localhost','root','')or die(mysqli_error());
	            $db=mysqli_select_db($conn,'androido') or die("DB error");
	            
	            $query=mysqli_query($conn,"SELECT * FROM signup WHERE email='$email' AND password='$pass'");
	            $numrows=mysqli_num_rows($query);
	            if($numrows!= 0){
	            	while ($row=mysqli_fetch_assoc($query)) {
	            		$username=$row['name'];
	            		$useremail=$row['email'];
	            		$userpass=$row['password'];
	            	}
	            	if($useremail==$email&&$userpass=$pass){
	            		session_start();
	            		$_SESSION['sess_user']=$useremail;
	            		$_SESSION['sess_name']=$username;
	            		header("Location: Welcome.php");
	            	}
	            	else{
	            		echo "Invalid Email or Password";
	            	}
	            }
	    	}
	    	else{
	    		echo "Fullfill all fields";
	    	}
		}
 	?>
</div>
</body>
</html>