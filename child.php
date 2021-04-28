<?php

{
session_start();

$conn = mysqli_connect('localhost','root','','projectDB');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "<table border='10' >
<tr>
<td align=center> <b>Student First Name </b></td>
<td align=center><b>Student Last Name</b></td>
<td align=center> <b>username </b></td>
<td align=center><b>Your First Name</b></td>
<td align=center><b>Your Last Name</b></td>";




$username  = $_SESSION['username'];
$sql="SELECT SFirstName,SLastName,username, firstname, lastname FROM parent Where username='$username'";
$result = $conn->query($sql);

//the problem was the query code didn't work for some reason.
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  echo"<tr>";
	      echo "<td align=center> ".$row["SFirstName"]."<br></td>";
    echo "<td align=center> ".$row["SLastName"]."<br></td>";
    echo "<td align=center> ".$row["username"]."<br></td>";
	echo "<td align=center> " .$row["lastname"]."<br></td>";
	echo "<td align=center> " .$row["firstname"]."<br></td>";
	//place in each table. 
		//figure out the the problem to the code above. 
   }
} else {
  echo "0 results";
}
$conn->close();
}
echo "</table>";
?>


