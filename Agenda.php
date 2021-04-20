<?php
	session_start();
	$conn = mysqli_connect('localhost', 'username', 'password', 'webdesign');
	if(!$conn){
		die('Connection Failed! Error: ' . mysqli_error($conn));
	}
	$link_address1 = 'Welcome.php';
	echo "<a href='$link_address1'>Welcome</a>";
	echo " ";
	$link_address2 = 'Login.php';
	echo "<a href='$link_address2'>Login</a>";
	echo "<h1>Agenda</h1>";
	echo "<h2>Here are your upcoming due dates:</h2>";
	echo "<table border='1' >
	<tr>
	<td align=center> <b> Exams </b></td>
	<td align=center><b> Assignments </b></td>
	<td align=center><b> Quizzes </b></td>
	</tr>";
	
	$username  = $_SESSION['username'];
	#if($_SESSION['role']== teacher) { //select from teacher table where username=$_SESSION['username'] 
	#}
	#if($_SESSION['role']== parent || student) { //select from Parent table where username=$_SESSION['username'] 
	$sqlp="SELECT Exams, Assignments, Quizzes FROM webDesign.agenda_table WHERE username='$username'";
	#}
	$result = $conn->query($sqlp);
	//the problem was the query code didn't work for some reason.
	if ($result && $result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo"<tr>";
		echo "<td align=center> " .$row["Exams"]."<br></td>";
		echo "<td align=center> " .$row["Assignments"]."<br></td>";
		echo "<td align=center> " .$row["Quizzes"]."<br></td>";
		//place in each table. 
			//figure out the the problem to the code above. 
	}
	} else {
	echo "0 results";
	}
	$conn->close();
?>


