<!DOCTYPE html>
<html>
<body>
<?php 
session_start();
include_once "C:/xampp/htdocs/config.php";
$mysqli = new mysqli("localhost", $username, $pass, $dbname); 
$query = "SELECT * FROM student";
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
    <a href="/welcome.php"><button class="button button4" type=submit value=Back>Go Back</button></a>
    <a href="/index.php"><button class="button button3" type=submit value=logout>Logout</button></a>
</div>';

echo '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr>
          <td> <font face="Arial">ID</font> </td>
          <td> <font face="Arial">username</font> </td>
          <td> <font face="Arial">firstname</font> </td> 
          <td> <font face="Arial">lastname</font> </td> 
          <td> <font face="Arial">Gender</font> </td>
          <td> <font face="Arial">MotherUsername</font> </td>
          <td> <font face="Arial">FatherUsername</font> </td>
          
      </tr>';

echo '<p> Welcome ', $_SESSION["username"], '</p>';
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $field1name = $row["ID"];
        $field2name = $row["username"];
        $field3name = $row["firstName"];
        $field4name = $row["lastName"];
        $field5name = $row["Gender"]; 
        $field6name = $row["MotherUsername"];
        $field7name = $row["FatherUsername"]; 
        $field8name = $row["Tusername"]; 
      if($field8name==$_SESSION["username"] ){
        echo '<tr> 
                  <td>'.$field1name.'</td>  
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td>
                  <td>'.$field5name.'</td> 
                  <td>'.$field6name.'</td> 
                  <td>'.$field7name.'</td> 
              </tr>';
       }
    }
    $result->free();
} 
?>
</body>
</html>