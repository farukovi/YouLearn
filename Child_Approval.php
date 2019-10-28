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
  <title>Child Approved | YouLearn</title>
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
	<form method="post">
		<div class="jumbotron" style="background:#92a8d1">
			<h1 class="text-center">Child Approval</h1><div class="form-group">
			  <label for="usr">Name:</label>
			  <input type="text" class="form-control" id="usr">
			  <label for="email">Father's Name:</label>
			  <input type="text" class="form-control" id="usr_email">
			  <label for="email">Mother's Name:</label>
			  <input type="text" class="form-control" id="usr_email">          
			  <label for="usr">Age:</label>
			  <input type="text" class="form-control" id="usr_age">
			  <label for="pwd">Birth id no.:</label>
			  <input type="text" class="form-control" id="usr_nid">
			  <label for="usr">Address:</label>
			  <input type="text" class="form-control" id="usr_address">
			  <br>
			  <label for="pwd">Religion:</label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Islam
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Hindu
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Christian
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Other
			  </label>
			  <br><br>
			  <label for="email">Mentor's Email:</label>
			  <input type="text" class="form-control" id="usr_email">
			  <h3>Gender:</h3>
			  <label class="checkbox-inline">
				<input type="radio" value="">Male
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Female
			  </label>
			  <h3>Class:</h3>
			  <label class="checkbox-inline">
				<input type="radio" value="">Play
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Nursery-1
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Nursery-2
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Class-1
			  </label>
			  <label class="checkbox-inline">
				<input type="radio" value="">Class-2
			  </label>
			  
			  <br><br>
			  <label for="email">Mentor's Id:</label>
			  <input type="text" class="form-control" id="usr_email">
			  <br>
			<button type="button" class="btn">Create</button>
		</div>
	</form>
</div>

</body>
</html>
