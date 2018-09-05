<?php 
	session_start();
	if (!isset($_SESSION['sess_user'])&&!isset($_SESSION['sess_name'])) {
		header("Location: Login.php");
	}
	else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Android Hub</title>
	<link rel="stylesheet" type="text/css" href="ws.css">
</head>
<body>
<div class="navbar">
	<ul>
		<li><a href="#">Home</a></li>
		<li><a href="#">Notifications</a></li>
		<li><a href="#">Tutorials</a>
		<ul>
			<li><a href="file:///C:/xampp/htdocs/Androido/Ide.html">Install IDE</a></li>
			<li><a href="#">Layouts</a></li>
			<li><a href="#">UI Widgets</a></li>
			<li><a href="#">Activities and Fragments</a></li>
			<li><a href="#">Android Services</a></li>
			<li><a href="#">Android Menu</a></li>
			<li><a href="#">Android Datastorage</a></li>
		</ul>
		</li>
		<li><a href="#">Projects</a>
		<ul>
			<li><a href="#">Basic projects</a></li>
			<li><a href="#">Management Application</a></li>
			<li><a href="#">Web Application</a></li>
			<li><a href="#">AI Based Application</a></li>
		</ul>
		</li>
		<li><a href="#">Contacts</a></li>
		<li><a href="#">About Us</a></li>
		<li>
            <a href="Login.php">
            	<?=$_SESSION['sess_name'];?>
            	Logout
            </a>
        </li>
	</ul>
</div>
<div class="c1">
        <div class="c2">
            <form method="POST" action="welcome.php">
                <input type="text" name="post" placeholder="Enter your Post">
                <br>
                <input type="submit" name="submit" value="Post">
            </form>
            <?php
            	if (isset($_POST['submit'])) {
					if(!empty($_POST['post'])){
			            		$conn=new mysqli('localhost','root','')or die(mysqli_error());
						        $db=mysqli_select_db($conn,'androido') or die("DB error");

					        	$name=$_SESSION['sess_name'];
					        	$postdata=$_POST['post'];
					        	
						        $sql="INSERT INTO posttable(name,postdata) VALUES ('$name','$postdata')";
						        if ($conn->query($sql) === TRUE) {
								    echo "Posted";
								}
					}
				}
            ?>
        </div>
		<div class="c2">
			<h2>10 min</h2>
			<p>I am Joy.I have a problem.</p>
			<input type="text" name="comment" placeholder="Enter Your comment">
			<br>
			<input type="submit" name="submit" value="comment">
		</div>
	</div>
</body>
</html>
<?php
	}
?>