<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("Location:index.php");
	}
	$con = mysqli_connect("localhost","root","","software_project");
	$sql = "SELECT * FROM children_account ORDER BY Id ASC";
	$result = mysqli_query($con,$sql);
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
  width: 260px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
  margin-top: 52px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
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
	<form style="background-color:#808080">
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
  <a href="#about">Home</a>
  <a href="#services">Profile</a>
  <a href="#clients">View Tutor</a>
  <a href="#contact">View Mentor</a>
</div>

		<form action="UpdateQues.php" method="POST">
			<div class="main">
				
				<div class="right">
					<h3>View All Child</h3>
				</div>
				<div class="text">
					<select name="emloyee_list" id="emloyee_list">
						<option value="">SELECT question</option>
						<?php
							while($row = mysqli_fetch_array($result))
							{
								echo '<option value="'.$row['Id'].'">'.$row["Id"].'</option>';
							}
						?>
					</select>
					<input type="button" id="search" value="Search">
				</div>
				<hr>
				<div class="ques">
					<h3 style="margin-top:20px">Name:
					<textarea name="ques" id="Question" style="width:300px;height:30px;margin-top:-80px;margin-left:60px"></textarea>
					
					<h3>Option 1: 
					<textarea id="Option1" name="Opt1" style="width:300px;height:30px; margin-left: 110px; margin-top: -65px;"></textarea>
				</div>
				<div class="opt2">
					<h3>Option 2: 
					<textarea id="Option2" name="opt2" style="width:300px;height:30px; margin-left: 110px; margin-top: -45px;"></textarea>    
				</div>
				<div class="opt3">
					<h3>Option 3: 
					<textarea id="Option3" name="opt3" style="width:300px;height:30px; margin-left: 110px; margin-top: -45px;"></textarea>
				</div>
				<div class="opt4">
					<h3>Option 4: 
					<textarea id="Option4" name="opt4" style="width:300px;height:30px; margin-left: 110px; margin-top: -45px;"></textarea>
				</div>
				<div class="crrct">
					<h3>Correct Answer: 
					<textarea id="Answer" name="ans"style="width:400px;height:30px; margin-left: 170px; margin-top: -50px;"></textarea>	
				</div>
				<div class="add">
					<input type="submit" name="add" value="Update">
				</div>
				<div class="footer">
					
				</div>	
			</div>
		</form>
	</body>
</html>
<script>
$(document).ready(function(){
	$('#search').click(function(){
		var id = $('#emloyee_list').val();
		if(id !="")
		{
			$.ajax({
				url:"getInfoforchild.php",
				method:"POST",
				data:{id:id},
				dataType:"JSON",
				success:function(data)
				{
					$('#Question').text(data.Question);
					$('#Option1').text(data.Option1);
					$('#Option2').text(data.Option2);
					$('#Option3').text(data.Option3);
					$('#Option4').text(data.Option4);
					$('#Answer').text(data.Answer);
				}
			})
		}
		else
		{
			alert("Plz select the question");
			
		}
	});
});
</script>