<html>
    <body>
        <div class=Add>
            <?php
//
                session_start();
                require_once "config.php";
		$connection = mysqli_connect('localhost','root','','projectDB');

                $query = "SELECT * FROM classes";

                echo'<style>
                table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }

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

			td, th {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                          }
                          
                          tr:nth-child(even) {
                            background-color: #dddddd;
                          }
                
                </style>';

                echo '

		<div class="card shadow-sm" style="text-align:center">
                            <a href="Welcome.php"><button class="button button4" type=submit value=Back>Go Back</button></a>
                            <a href="logout.php"><button class="button button3" type=submit value=logout>Logout</button></a>
                </div>
		<table class="center"; border="0"; cellspacing="4"; cellpadding="4";>
                        <tr>
                            <th><font face="Arial">Name</font></th>
                            <th><font face="Arial">Start Date</font></th>
                            <th><font face="Arial">End date</font></th>
                            <th><font face="Arial">Teacher Username</font></th>
                            <th><font face="Arial">Student Username</font></th>
				<th><font face="Arial">Parent Username</font></th>
                        </tr>';
                
                $i = 0;
                
                if($result = $connection->query($query))
                {
                    while ($row = $result->fetch_assoc())
                    {
                        
                        $N2 = $row["name"];
                        $N3 = $row["start_date"];
                        $N4 = $row["end_date"];
                        $N5 = $row["TeacherUsername"];
                        $N6 = $row["Susername"];
                        $N7 = $row["Pusername"];
                        if($N6 == $_SESSION["username"])
                        {
          
                          echo'<tr>
                                  
                                  <td>'.$N2.'</td>
                                  <td>'.$N3.'</td>
                                  <td>'.$N4.'</td>
                                  <td>'.$N5.'</td>
                                  <td>'.$N6.'</td>
				<td>'.$N7.'</td>
                              <tr>';

                              $i+=1;
                        }
                    }
                    $_SESSION["NumberofClasses"] = $i;
                        
                    }
                
                
            ?>
        </div>
    </body>
</html>
