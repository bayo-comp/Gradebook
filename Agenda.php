<?php
	session_start();
	$conn = mysqli_connect('localhost', 'username', 'password', 'webdesign');
	if(!$conn){
		die('Connection Failed! Error: ' . mysqli_error($conn));
	}
	$link_address1 = 'Welcome.php';
	echo "<a href='$link_address1'>Welcome</a>";
	$link_address2 = 'Login.php';
	echo "<a href='$link_address2'>Login</a>";
	echo "<table border='1' >

<tr>
<td align=center> <b> Exams </b></td>
<td align=center><b> Assignments </b></td>
<td align=center><b> Quizzes </b></td>
</tr>";

$username  = $_SESSION['username'];
$sql="SELECT Exams, Assignments, Quizzes FROM webDesign.agenda_table Where Pusername='$username'";
$result = $conn->query($sql);
//the problem was the query code didn't work for some reason.
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo"<tr>";
    echo "<td align=center> ".$row["Exams"]."<br></td>";
    echo "<td align=center> " .$row["Assignments"]."<br></td>";
    echo "<td align=center> " .$row["Quizzes"]."<br></td>";
    //place in each table. 
        //figure out the the problem to the code above. 
  }
} else {
  echo "0 results";
}
$conn->close();
/*
<!DOCTYPE html> 
<html lang="en"> 
	<head>
		<meta charset="utf-8">
		<title>Agenda</title>
	</head>
	<body> 
		<h1>Agenda</h1>
		<h2>Here are your upcoming due dates!</h2>
		
		<table  style="color:red;border-collapse:collapse;" border = 1px;>
			<tr>Exams</tr>
				<td></td>
		</table>
		<table style="color:red;border-collapse:collapse;" border = 1px;>
			<tr>Quizzes</tr>
				<td></td>
		</table>
		<table style="color:red;border-collapse:collapse;" border = 1px;>
			<tr>Assignments</tr>
				<td></td>
		</table>
		
	</body>

</html>*/