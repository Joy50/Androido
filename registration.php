<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="rs.css">
	<title>Sign Up</title>
</head>
<body>
<div class="reg-box">
	<h1>Sign Up</h1>
	<form method="POST" action="">
		<p>Name</p>
		<input type="text" name="uname" placeholder="Enter Your Name">
		<p>Email</p>
		<input type="text" name="emaila" placeholder="Enter Your Email Address">
		<p>Password</p>
		<input type="password" name="psw" placeholder="Choose A Password">
		<p>Interest</p>
		<input type="text" name="inte" placeholder="Choose Your Interest">
		<input type="submit" name="submit" value="Sign Up" onclick="alert('Registration Successfull')">
		<a href="file:///C:/Users/Joy/Desktop/Website/Login.html">Have An Account?Sign In</a>
	</form>
	<?php
	    if(isset($_POST['submit']))
	    {   

	        if(!empty($_POST['uname'])&&!empty($_POST['emaila'])&&!empty($_POST['psw'])&&!empty($_POST['inte'])){
	        	$name=$_POST['uname'];
		        $email=$_POST['emaila'];
		        $pass=$_POST['psw'];
		        $interest=$_POST['inte'];
		        $conn=new mysqli('localhost','root','')or die(mysqli_error());
		        $db=mysqli_select_db($conn,'androido') or die("DB error");
		        $query=mysqli_query($conn, "SELECT * FROM SIGNUP WHERE email='$email'");
		        $numrows=mysqli_num_rows($query);
		        if($numrows==0){
		        	$sql="insert into signup(name,email,password,interest) values ('$name','$email','$pass','$interest')";
		        	$result=mysqli_query($conn, $sql);
		        	if($result){
		        		header("Location: Login.php?loginsuccess");
		        	}
		        	else{
		        		echo "Failed";
		        	}
		        }
		        else{
		        	echo "Email already Used";
		        }
	        }
	        else{
	        	echo "Required All fields";
	        }
	    }
	?>
</div>
</body>
</html>