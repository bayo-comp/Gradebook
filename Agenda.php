<?php
//
    session_start();
    require_once "config.php";
    $conn = mysqli_connect('localhost', 'root', '', 'projectdb');
    if(!$conn){
        die('Connection Failed! Error: ' . mysqli_error($conn));
    }
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
    echo "<table border='1' >
    <tr>
    <td align=center><b> Exams </b></td>
    <td align=center><b> Assignments </b></td>
    <td align=center><b> Quizzes </b></td>
    <td align=center><b> Teacher </b></td>
    </tr>";
    
    $username  = $_SESSION['username'];
    #if($_SESSION['role']== Teacher) { //select from teacher table where username=$_SESSION['username'] 
    #}
    #if($_SESSION['role']== Parent || student) { //select from Parent table where username=$_SESSION['username'] 
    $sqlp="SELECT Exams, Assignments, Quizzes, TeacherUsername FROM agenda_table WHERE username='$username'";
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
        echo "<td align=center> " .$row["TeacherUsername"]."<br></td>";
        //place in each table. 
            //figure out the the problem to the code above. 
    }
    } else {
    echo "0 results";
    }
    $conn->close();
?>

