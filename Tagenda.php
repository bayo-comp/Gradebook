<!DOCTYPE html>
<html lang="en">
  //
<head>
    <title>Agenda</title>
	<link href="Style.css" rel="stylesheet"/>
</head>
  
<body>
<?php
	session_start();
	require_once "config.php";
	$conn = mysqli_connect('localhost','root','','projectDB');
	echo '<style>
                    #page-wrap {
                        width: 800px;
                        margin: 0 auto;
                    }

                    .button {
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 4px 2px;
                        transition-duration: 0.4s;
                        cursor: pointer;
                    }
                      
                      .button1 {
                        background-color: white; 
                        color: black; 
                        border: 2px solid #4CAF50;
                    }
                      
                      .button1:hover {
                        background-color: #4CAF50;
                        color: white;
                      }
                      
                      .button2 {
                        background-color: white; 
                        color: black; 
                        border: 2px solid #008CBA;
                      }
                      
                      .button2:hover {
                        background-color: #008CBA;
                        color: white;
                      }

                      .button3 {
                        background-color: white; 
                        color: black; 
                        border: 2px solid #FF0000;
                      }
                      
                      .button3:hover {
                        background-color: #FF0000;
                        color: white;
                      }

                      .button4 {
                        background-color: white; 
                        color: black; 
                        border: 2px solid #0000FF;
                      }
                      
                      .button4:hover {
                        background-color: #0000FF;
                        color: white;
                      }
                      
                </style>';
echo'<style>
                table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }

                        td, th {
                          border: 1px solid #dddddd;
                          text-align: left;
                          padding: 8px;
                        }

                        tr:nth-child(even) {
                          background-color: #dddddd;
                        }
                        </style>';
echo'<div class="card shadow-sm" style="text-align:center">
    <a href="Welcome.php"><button class="button button4" type=submit value=Back>Go Back</button></a>
    <a href="logout.php"><button class="button button3" type=submit value=logout>Logout</button></a>
	<h1>Add Assignments to Agenda</h1>
</div>';
	if(isset($_POST['submit'])){	
		$Exams = $_POST ['Exams'];
		$Assignments = $_POST['Assignments'];
		$Quizzes = $_POST['Quizzes'];
		$Username  = $_POST['username'];
		$Tusername  = $_SESSION['username'];
		$sql = $conn->query("UPDATE agenda_table SET Exams ='$Exams', Assignments='$Assignments', Quizzes='$Quizzes', 
		username='$Username', TeacherUsername='$Tusername'");
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
