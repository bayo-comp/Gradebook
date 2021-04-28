<?php
	session_start();
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
	<h1>Parents</h1>
	<h2>Here is the list of Parents:</h2>
	<table class="center"; border="0"; cellspacing="4"; cellpadding="4";>
	<tr>
	<td align=center> <b> First Name </b></td>
	<td align=center><b> Last Name </b></td>
	<td align=center><b> Gender </b></td>
	<td align=center><b> Teacher Username </b></td>
	<td align=center><b> Student Username </b></td>
	<td align=center><b> Student First Name </b></td>
	<td align=center><b> Student Last Name </b></td>
	</tr>
</div>';
	
	$username  = $_SESSION['username'];
	$sqlp="SELECT firstName, lastName, Gender, Tusername, Susername, SFirstName, SLastName FROM parent";
	$result = $conn->query($sqlp);
	//the problem was the query code didn't work for some reason.
	if ($result && $result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		echo"<tr>";
		echo "<td align=center> " .$row["firstName"]."<br></td>";
		echo "<td align=center> " .$row["lastName"]."<br></td>";
		echo "<td align=center> " .$row["Gender"]."<br></td>";
		echo "<td align=center> " .$row["Tusername"]."<br></td>";
		echo "<td align=center> " .$row["Susername"]."<br></td>";
		echo "<td align=center> " .$row["SFirstName"]."<br></td>";
		echo "<td align=center> " .$row["SLastName"]."<br></td>";
		//place in each table. 
			//figure out the the problem to the code above. 
	}
	} else {
	echo "0 results";
	}
	$conn->close();
?>