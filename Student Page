<html>
    <body>

        <div class=welcome>
            <?php
                include_once "$_SERVER[DOCUMENT_ROOT]/php1/config0.php";
                function isAdmin($user_data) {
                    return isset($user_data) && isset($user_data['user_type']) && $user_data['user_type'] == 'Admin';
                    }
                function isCashier($user_data) {
                    return isset($user_data) && isset($user_data['user_type']) && $user_data['user_type'] == 'Cashier';
                    }
                ob_start();
                session_start();
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
                      
                </style>

                <body>
                <div id="page-wrap">
                <div class="student-profile py-4">
                <div class="center-container">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center" style="text-align:center">
                          <img class="profile_img" src="https://source.unsplash.com/500x200/?student" alt="Avatar" style="border-radius: 50%">
                          <h3 style="text-align:center">',$_SESSION["username"],'</h3>
                        </div>
                        <div class="card-body" style="text-align:center">
                          <p class="mb-0"><strong class="pr-1">Student ID:</strong>',$_SESSION["id"],'</p>
                          <p class="mb-0"><strong class="pr-1">Class:</strong>',$_SESSION["NumberofClasses"],'</p>
                          <p class="mb-0"><strong class="pr-1">Section:</strong>A</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0" style="text-align:center">
                          <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
                        </div>
                        <div class="card-body pt-0" style="text-align:center">
                        <span><label style="font-weight:bold;">Academic Year: </label><p>2021</p></span>
                        </div>
                      </div>
                        <div style="height: 20px"></div>
                      <div class="card shadow-sm" style="text-align:center">
                        <a href="/php1/AddClass.php"><button class="button button1">Classes</button></a>
                        <a href="/php1/grades.php"><button class="button button2">Grades</button></a> 
                        <a href="/index.php"><button class="button button3" type=submit value=logout>Logout</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </body';
                
                if (isset($_POST['logout'])) 
                {
                    logout('Location:/index.php');
                }
            ?>
        </div>
    </body>
</html>
