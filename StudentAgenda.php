<html>
    <body>
        <div class=Add>
            <?php

                session_start();
                include_once "$_SERVER[DOCUMENT_ROOT]/php1/config0.php";

                $query = 'SELECT * FROM agenda_table';

                echo'<link rel="stylesheet" href="style.css">';

                echo'<table class="center"; border="0"; cellspacing="4"; cellpadding="4";>
                        <tr>
                            <th><font face="Arial">Exams</font></th>
                            <th><font face="Arial">Assignments</font></th>
                            <th><font face="Arial">Quizzes</font></th>
                        </tr>';
                
                $i = 0;
                
                if($result = $connection->query($query))
                {
                    while ($row = $result->fetch_assoc())
                    {
                        $N1 = $row["Exams"];
                        $N2 = $row["Assignments"];
                        $N3 = $row["Quizzes"];
                        $N4 = $row["username"];
                        if($N4 == $_SESSION["username"])
                        {
                          echo'<tr>
                                  <td>'.$N1.'</td>
                                  <td>'.$N2.'</td>
                                  <td>'.$N3.'</td>
                              <tr>';
                        }
                    }
                    echo'<link rel="stylesheet" href="style.css">
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