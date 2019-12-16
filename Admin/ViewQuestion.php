<?php
session_start();
if(!isset($_SESSION['name']))
{
	header("Location:YouLearn.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin DashBoard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="css/Account.css" rel="stylesheet" type="text/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 220px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #808080;
  overflow-x: hidden;
  padding-top: 20px;
  margin-top: 52px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

</style>
</head>
<body>
<form action="#" method="post" style="background-color:#808080">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-size:30px;">YouLearn: Admin Panel</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="Logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="sidenav">
 <a href="Admin.php"><center>Home</center></a>
  <a href="ViewTutor.php"><center>View Tutor</center></a>
  <a href="ViewMentor.php"><center>View Mentor</center></a>
</div>

<div class="main">
<h2><center>View Question Set</center></h2>
<div class="alert alert-info">
    <strong>Hello Faruk:</strong> This is Admin Home.Here You can complete all your admin work.
 </div>
 	<?php
		$con = mysqli_connect("localhost","root","","software_project");
		$sql = "SELECT * FROM setquestion Limit 1";
		$res = mysqli_query($con,$sql);
		if(mysqli_num_rows($res) > 0)
		{
			$row = mysqli_fetch_array($res);
			$id = $row['Id'];
			$src = $row['Name'];
			$src1 = $row['Name1'];
			$src2 = $row['Name2'];
			$cls = $row['Class'];
			$sub = $row['Subject'];
		}	
	?>
	<h2>Class: <strong><?php echo $cls; ?></strong></h2>
	<h3>Subject: <strong><?php echo $sub; ?></strong></h3>
	<hr>
	<input type="radio" name="src" value=<?php echo $src; ?>><?php echo '<a download='.$src.' href='.$src.'.docx>FileNo-1</a>'; ?><br>
	<input type="radio" name="src" value=<?php echo $src1; ?>><?php echo '<a download='.$src1.' href='.$src1.'.docx>FileNo-2</a>'; ?><br>
	<input type="radio" name="src" value=<?php echo $src2; ?>><?php echo '<a download='.$src2.' href='.$src2.'.docx>FileNo-3</a>'; ?>
	<hr>
	<input type="submit" name="sub" value="Submit">
	<hr>
</div>
</div>
</form>
</body>
</html>
<?php
	if(isset($_POST['sub'])){
		$name = $_POST['src'];
		$sql = "insert into exam_detaiils(Id,Name,Subject,Class) Values('','$name','$sub','$cls')";
		mysqli_query($con,$sql);
		$query = "DElETE FROM setquestion WHERE Id= '$id'";
		if(mysqli_query($con,$query)){
			echo '<script language="javascript">';
			echo 'alert("Done!!!!"); 
			location.href="Admin.php"';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
			echo 'alert("Done!!!!"); 
			location.href="Admin.php"';
			echo '</script>';
		}
	}
?>