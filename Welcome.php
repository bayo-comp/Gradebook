<html>
<head><link href="Style.css" rel="stylesheet"/></head>
	<body>
		<div class=welcome>
			<?php
            function isAdmin($user_data) {
                return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'Admin';
                }
            function isStudent($user_data) {
                return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'student';
                }
			function isParent($user_data) {
                return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'Parent';
                }
			function isTeacher($user_data) {
                return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'teacher';
                }
            ob_start();
            session_start();
            if (isset($_SESSION['role'])) 
            {
                echo '<p> Welcome ', $_SESSION["username"], '</p>';
                echo '<p> You are a ', $_SESSION['role'],'</p>';
                if (isAdmin($_SESSION)) 
                {
                    echo '<p>Please Select What Information You Want to See. </p>';
                    echo '<a href="Admin.php"><input type=submit value=Admin Info name=adminpage></a>';
		    echo '<a href="teachTable.php"><input type=submit value=Teacher Info name=teacherpage></a>';
		    echo '<a href="sTable.php"><input type=submit value=Student Info name=studentpage></a>';
                }
	if (isTeacher($_SESSION)) 
                {
                    //echo '<a href="/create_account.php"><input type=submit value="Create Account"></a>';
                    echo '<a href="teacher.php"><input type=submit value="View Students" name=teacherpage></a>';
                    echo '<a href="StudentGrades.php"><input type=submit value="View Student Grades" name=teacherpage></a>';
                    echo '<a href="TStudentGrades.php"><input type=submit value="Edit Student Grades" name=teacherpage></a>';
					echo '<a href="Tagenda.php"><input type=submit value="Assign Due Dates"></a>';
                }
                if (isStudent($_SESSION)) 
                {
		        <link rel="stylesheet" href="Style.css">
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
                            <a href="/StudentClass.php"><button class="button button1">Classes</button></a>
                            <a href="/StudentGrades.php"><button class="button button2">Grades</button></a> 
                            <a href="/login.php"><button class="button button3" type=submit value=logout>Logout</button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
                  </body

					
                }
                 if (isParent($_SESSION)) 
                {
					echo '<a href="child.html"><input type=submit value="Child Info"></a>';
                    echo '<a href="childGrades.html"><input type=submit value="Grades"></a>';
					echo '<a href="childClass.html"><input type=submit value="Classes"></a>';
					echo '<a href="Agenda.php"><input type=submit value="Agenda"></a>';
				}
			echo '<a href="logout.php"><input type=submit value=Logout></a>';
	    } 
			
            else 
            {
                echo "Not logged in";
                echo '<a href="Login.php"><input type=submit value="Login"></a>';
            }
        ?>
</div>
	</body>
</html>


