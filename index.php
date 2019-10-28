<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home | YouLearn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<style>
.container {
  position: relative;
  width: 50%;
}
</style>
<div class="container">
	<form  method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" style="background:#92a8d1">
		<div class="jumbotron"style="background:#92a8d1">
			<h1 class="text-center" class="text-success">YouLearn</h1>      
			<p>An online platform to promote education. Education is not a need, it's a right. This is where you get the quality education. Spread knowledge and love!</p>
			<div class="form-group">
			  <label for="usr">Email:</label>
			  <input type="text" class="form-control" id="usr" name="usr">
			</div>
			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" class="form-control" id="pwd" name="pwd">
			</div>
			<input type="Submit" class="btn"  name="login" value="Login">
		</div>
	</form>
</div>

</body>
</html>		
<?php
if(isset($_POST['login']))
{
	$con=mysqli_connect("localhost","root","","software_project");
	if(!$con)
	{
		die("Connection Error: ".mysqli_connect_error()."<br/>");
	}
	//Retrieve Data

	$password=$_POST['pwd'];
	$email=$_POST['usr'];
	$sql="SELECT * FROM login WHERE Email='$email' AND Password='$password'";
	$result=mysqli_query($con,$sql);	
	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_array($result);
		$type = $row['Type'];
		$_SESSION['name'] = $row['Id'];
		if($type=="Admin")
		{
			header("Location:Admin.php");
		}
		else if($type=="Tutor")
		{
			header("Location:Tutor.php");
		}
		else if($type=="Mentor")
		{
			header("Location:Mentor.php");
		}
		else if($type=="Child")
		{
			header("Location:Child.php");
		}
	}
	else
	{
		echo "No data found.<br/>";
	}

	
mysqli_close($con);		
}

?>