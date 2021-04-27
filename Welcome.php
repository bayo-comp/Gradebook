<html>
    <body>

        <div class=welcome>
            <?php
                include_once "$_SERVER[DOCUMENT_ROOT]/php1/config0.php";
                function isAdmin($user_data) {
                    return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'Admin';
                    }
                function isTeacher($user_data) {
                    return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'teacher';
                    }
                function isStudent($user_data){
                    return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'student';
                    }
                function isParent($user_data){
                    return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'parent';
                    }
                ob_start();
                session_start();
                if (isset($_SESSION['role']))
                {
                  if (isStudent($_SESSION))
                  {
                    echo '
                    <link rel="stylesheet" href="style.css">
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
                            <a href="/php1/StudentAgenda.php"><button class="button button4">Agenda</button></a>
                            <a href="/index.php"><button class="button button3" value=logout>Logout</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  </body';
                  }
                  else if(isTeacher($_SESSION))
                  {
                        echo'<link rel="stylesheet" href="Style.css">
                            <div class="card shadow-sm" style="text-align:center">
                                      <h2> Welcome ', $_SESSION["username"], '<h2>
                                      <h4> You are a(n) ', $_SESSION['role'],'</h4>
                                      <a href="/create_account.php"><button class="button button7" value="Create Account">Create Account</button></a>
                                      <a href="/teacher.php"><button class="button button2" value="View Students">View Students</button></a>
                                      <a href="/StudentGrades.php"><button class="button button6" value="View Student Grades">View Student Grades</button></a>
                                      <a href="/EditStudentGrades.php"><button class="button button1" value="Edit Student Grades">Edit Student Grades</button></a>
                                      <a href="Tagenda.php"><button class="button button5" value="Assignment Due Dates">Assignment Due Dates</button></a>
                                      <a href="/index.php"><button class="button button3" type=submit value=logout>Logout</button></a>
                            </div>';
                  }
                  else if(isAdmin($_SESSION))
                  {
                    echo '<link rel="stylesheet" href="style.css">
                          <div class="card shadow-sm" style="text-align:center">
                            <h2> Welcome ', $_SESSION["username"], '</h2>
                            <h4> You are a(n) ', $_SESSION['role'],'</h4>
                            <a href="Admin.php"><button class="button button4" value="Admin Info">Admin Info</button></a>
                            <a href="teachTable.php"><button class="button button1" value="Teacher Info">Teacher Info</button></a>
                            <a href="Admin.php"><button class="button button4" value="Admin Info">Admin Info</button></a>
                            <a href="sTable.php"><button class="button button2" value="Student Info">Student Info</button></a>
                            <a href="Register.php"><button class="button button6" value="Register Info">Register Info</button></a>
                            <a href="/index.php"><button class="button button3" type=submit value=logout>Logout</button></a>
                          </div>';
                  } 
                  else if(isParent($_SESSION))
                  {
                    echo '<link rel="stylesheet" href="style.css">
                          <div class="card shadow-sm" style="text-align:center">
                            <h2> Welcome ', $_SESSION["username"], '</h2>
                            <h4> You are a(n) ', $_SESSION['role'],'</h4>
                            <a href="child.html"><button class="button button5" value="Child Info">Child Info</button></a>
                            <a href="childGrades.html"><button class="button button7" value="Grades">Grades</button></a>
                            <a href="childClass.html"><button class="button button4" value="Classes">Classes</button></a>
                            <a href="Agenda.php"><button class="button button2" value="Agenda">Agenda</button></a>
                            <a href="/index.php"><button class="button button3" type=submit value=logout>Logout</button></a>
                          </div>';
                  }

                  else
                  {
                    echo "Not logged in";
                  }
                }
            ?>
        </div>
    </body>
</html>

