<!DOCTYPE html>
<html>
<body>
<?php 
session_start();
include_once "config.php";
$mysqli = new mysqli('localhost','root','','webdesigndb'); 
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
</div>';
if(isset($_POST['submit']))
{
    if ($connection->connect_errno) {
        $_SESSION['error'] = 'Connection failed '.$connection->error;
    }
    $Math = $_POST ['Math'];
    $Reading = $_POST['Reading'];
    $Science = $_POST['Science'];
    $SocialStudies = $_POST['SocialStudies'];
    $Susername = $_POST['Susername'];
    $field1name=$_SESSION["username"];
    $sql = $connection->query("INSERT INTO grades (Math ,Reading ,Science ,SocialStudies ,Susername, Tusername) 
    VALUES ('$Math','$Reading','$Science','$SocialStudies','$Susername','$field1name')");
    // $sql1 = $connection->query("UPDATE grades SET Tusername={$_SESSION["username"]} 
    // WHERE Susername = '$Susername");
    if ($sql == false) { // an error occured with the sql querry
        echo $connection->error;
    }
    else{
        // if ($sql1) {
        //     echo "Record updated successfully";
        // } 
        echo "Records have been added";
    }

}

?>
<form method="POST">
  Math Grade : <input type="text" name="Math" placeholder="Enter Math grade" Required>
  <br/>
  Reading Grade : <input type="text" name="Reading" placeholder="Enter Reading grade" Required>
  <br/>
  Science Grade : <input type="text" name="Science" placeholder="Enter Science grade" Required>
  <br/>
  SocialStudies Grade : <input type="text" name="SocialStudies" placeholder="Enter SocialStudies grade" Required>
  <br/>
  Student Username : <input type="text" name="Susername" placeholder="Enter Student username" Required>
  <br/>
  <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
