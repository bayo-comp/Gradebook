<?php
	session_start();
	$conn = mysqli_connect('localhost','root','','webdesigndb');
	if(!$conn){
		die('Connection Failed! Error: ' . mysqli_error($conn));
	}
	echo '<a href="Welcome.php"><input type=submit value=Welcome Info name=welcomepage></a>';
	echo " ";
	echo '<a href="Login.php"><input type=submit value=Login Info name=loginpage></a>';
	echo "<h1>Admins</h1>";
	echo "<h2>Here is the list of Admins:</h2>";
	echo "<table border='1' >
	<tr>
	<td align=center> <b> First Name </b></td>
	<td align=center><b> Last Name </b></td>
	<td align=center><b> Gender </b></td>
	<td align=center><b> School Name </b></td>
	</tr>";
	
	$username  = $_SESSION['username'];
	$sqlp="SELECT firstName, lastName, Gender, SchoolName FROM admin";
	$result = $conn->query($sqlp);
	//the problem was the query code didn't work for some reason.
	if ($result && $result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo"<tr>";
		echo "<td align=center> " .$row["firstName"]."<br></td>";
		echo "<td align=center> " .$row["lastName"]."<br></td>";
		echo "<td align=center> " .$row["Gender"]."<br></td>";
		echo "<td align=center> " .$row["SchoolName"]."<br></td>";
		//place in each table. 
			//figure out the the problem to the code above. 
	}
	} else {
	echo "0 results";
	}
	$conn->close();
?>
