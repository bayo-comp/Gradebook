
<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','projectDB');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM admin WHERE ID = '".$q."'";
if($q == -1){
$sql="SELECT * FROM admin WHERE ID >= 0";
}
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>First name</th>
<th>Last name</th>
<th>Gender</th>
<th>School Name</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['firstName'] . "</td>";
  echo "<td>" . $row['lastName'] . "</td>";
  echo "<td>" . $row['Gender'] . "</td>";
  echo "<td>" . $row['SchoolName'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html> 