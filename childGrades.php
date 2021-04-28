<?php

{
session_start();

$conn = mysqli_connect('localhost','root','','projectDB');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "<table border='1' >

<tr>
<td align=center><b>Username</b></td></td>
<td align=center> <b>Math </b></td>
<td align=center><b>Reading</b></td>
<td align=center><b>Science</b></td>
<td align=center><b>Social Studies</b></td></td>";





$username  = $_SESSION['username'];
$sql="SELECT Math, Reading,Science,SocialStudies,Susername FROM grades Where Pusername='$username'";
$result = $conn->query($sql);
//the problem was the query code didn't work for some reason.
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
echo"<tr>";
		echo "<td align=center> " .$row["Susername"]."<br></td>";

    echo "<td align=center> ".$row["Math"]."<br></td>";
	echo "<td align=center> " .$row["Reading"]."<br></td>";
	echo "<td align=center> " .$row["Science"]."<br></td>";
		echo "<td align=center> " .$row["SocialStudies"]."<br></td>";
	//place in each table. 
		//figure out the the problem to the code above. 
  


  }
} else {
  echo "0 results";
}
$conn->close();
}