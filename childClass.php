<?php

{
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webdesign";


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "<table border='1' >
<tr>
<td align=center> <b>Child Username  </b></td>
<td align=center> <b> Course Name </b></td>
<td align=center><b>Start Date</b></td>
<td align=center><b>End Date</b></td>";





$username  = $_SESSION['username'];
$sql="SELECT Susername,name, start_date,end_date FROM webDesign.classes Where Pusername='$username'";
$result = $conn->query($sql);
//the problem was the query code didn't work for some reason.
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  	 echo"<tr>";
	echo "<td align=center> " .$row["Susername"]."<br></td>";
    echo "<td align=center> ".$row["name"]."<br></td>";
	echo "<td align=center> " .$row["start_date"]."<br></td>";
	echo "<td align=center> " .$row["end_date"]."<br></td>";
		
	//place in each table. 
		//figure out the the problem to the code above. 
  
  
  
  }
  
} else {
  echo "0 results";
}
$conn->close();
}
echo "</table>";
