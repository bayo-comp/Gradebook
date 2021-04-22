<html>
    <body>
        <div class=Add>
            <?php

                session_start();
                include_once "$_SERVER[DOCUMENT_ROOT]/php1/config0.php";

                $query = "SELECT * FROM classes";

                echo'<style>
                table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
                }
                
                </style>';

                echo'<table class="center"; border="0"; cellspacing="4"; cellpadding="4";>
                        <tr>
                            <th><font face="Arial">Math</font></th>
                            <th><font face="Arial">Reading</font></th>
                            <th><font face="Arial">Science</font></th>
                            <th><font face="Arial">Social Studies</font></th>
                        </tr>';
                
                if($result = $connection->query($query))
                {
                    while ($row = $result->fetch_assoc())
                    {
                        $N1 = $row["Math"];
                        $N2 = $row["Reading"];
                        $N3 = $row["Science"];
                        $N4 = $row["Social Studies"];
                        $N5 = $row["username"];
                        if($N5 == $_SESSION["username"])
                        {
                          echo'<style>
              
                          td, th {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                          }
                          
                          tr:nth-child(even) {
                            background-color: #dddddd;
                          }
                          </style>';

                          echo'<tr>
                                  <td>'.$N1.'</td>
                                  <td>'.$N2.'</td>
                                  <td>'.$N3.'</td>
                                  <td>'.$N4.'</td>
                              <tr>';
                        }
                    }
                    echo '
                    <style>
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
                      
                </style>

                        <div class="card shadow-sm" style="text-align:center">
                            <a href="/php1/student.php"><button class="button button4" type=submit value=Back>Go Back</button></a>
                            <a href="/index.php"><button class="button button3" type=submit value=logout>Logout</button></a>
                        </div>';
                    }
                
                $result->free();

                if (isset($_POST['logout'])) 
                {
                    logout('Location:/index.php');
                } 
            ?>
        </div>
    </body>
</html>
