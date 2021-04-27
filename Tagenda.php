
<!DOCTYPE html>
<html lang="en">
  
<head>
    <title>Agenda</title>
	<link href="Stylesheet.css" rel="stylesheet"/>
</head>
  
<body>
<?php
	session_start();
	require_once "config.php";
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
	echo "<h2>Please enter upcoming due dates:</h2>";
	if(isset($_POST['submit'])){	
		$Exams = $_POST ['Exams'];
		$Assignments = $_POST['Assignments'];
		$Quizzes = $_POST['Quizzes'];
		$Username  = $_POST['username'];
		$sql = $conn->query("INSERT INTO agenda_table (Exams, Assignments, Quizzes, username) 
    VALUES ('$Exams','$Assignments','$Quizzes','$Username')");
    // trying to update the teacher value based on who inut the grades for a student
    // $sql1 = $connection->query("UPDATE grades SET Tusername={$_SESSION["username"]} 
    // WHERE Susername = '$Susername");
    if ($sql == false) { // an error occured with the sql querry
        echo $conn->error;
    }
    else{
        // if ($sql1) {
        //     echo "Record updated successfully";
        // } 
        echo "Records have been added";
    }
		//$resultmode = MYSQLI_STORE_RESULT;
		//$conn -> query($sql, $resultmode);
		//"INSERT INTO agenda_table VALUES '$Exams','$Assignments','$Quizzes','$Username'"
	}
?>
    <center>
		<form method = "POST">
			Assignments : <input type="text" name="Assignments" Required>
			<br/>
			Exams : <input type="text" name="Exams" Required>
			<br/>
			Quizzes : <input type="text" name="Quizzes" Required>
			<br/>
			Student Username : <input type="text" name="username" Required>
			<br/>
			<input type="submit" name="submit" value="Submit">
        </form>
    </center>
</body>
  
</html>