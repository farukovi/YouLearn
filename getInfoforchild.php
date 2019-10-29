<?php
if(isset($_POST['id']))
{
	$x = $_POST['id'];
	$con = mysqli_connect("localhost","root","","software_project");
	$sql = "SELECT * FROM children_account WHERE Id = '$x'";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result))
	{
		$data['Question'] = $row['Name'];
		$data['Option1'] = $row['Fathers_Name'];
		$data['Option2'] = $row['Mothers_Name'];
		$data['Option3'] = $row['Birthday'];
		$data['Option4'] = $row['Address'];
		$data['Answer'] = $row['Email'];
	}
	echo json_encode($data);
	mysqli_close($con);
}
?>