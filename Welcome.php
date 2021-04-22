<html>
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
                return isset($user_data) && isset($user_data['role']) && $user_data['role'] == 'Teacher';
                }
            ob_start();
            session_start();
            if (isset($_SESSION['role'])) 
            {
                echo '<p> Welcome ', $_SESSION["username"], '</p>';
                echo '<p> You are a(n) ', $_SESSION['role'],'</p>';
				if (isTeacher($_SESSION)) 
                {
					echo '<a href="child.html"><input type=submit value="Child Info"></a>';
                    echo '<a href="Grades.html"><input type=submit value="Grades"></a>';
					echo '<a href="Classes.html"><input type=submit value="Classes"></a>';
					echo '<a href="Agenda.php"><input type=submit value="Agenda"></a>';
			   //echo '<a href="logout.php"><input type=submit value=Logout></a>';
				}
                if (isAdmin($_SESSION)) 
                {
                    echo '<p>Please Select What Information You Want to See. </p>';
                    echo '<a href="Admin.php"><input type=submit value=Admin Info name=adminpage></a>';
		    echo '<a href="teachTable.php"><input type=submit value=Teacher Info name=teacherpage></a>';
		    echo '<a href="sTable.php"><input type=submit value=Student Info name=studentpage></a>';
		    echo '<a href="Register.php"><input type=submit value=Register Info name=regpage></a>';
                }
		    if (isTeacher($_SESSION)) 
                {
                    echo '<a href="/create_account.php"><input type=submit value="Create Account"></a>';
                    echo '<a href="/teacher.php"><input type=submit value="View Students" name=teacherpage></a>';
                    echo '<a href="/StudentGrades.php"><input type=submit value="View Student Grades" name=teacherpage></a>';
                    echo '<a href="/EditStudentGrades.php"><input type=submit value="Edit Student Grades" name=teacherpage></a>';
                }
                if (isStudent($_SESSION)) 
                {
                    echo '<a href="Grades.html"><input type=submit value="Grades"></a>';
					echo '<a href="Classes.html"><input type=submit value="Classes"></a>';
					echo '<a href="Agenda.php"><input type=submit value="Agenda"></a>';
					 //echo '<a href="logout.php"><input type=submit value=Logout></a>';
                }
                  if (isParent($_SESSION)) 
                {
				  echo '<a href="child.html"><input type=submit value="Child Info"></a>';
                    echo '<a href="childGrades.html"><input type=submit value="Grades"></a>';
			   echo '<a href="childClass.html"><input type=submit value="Classes"></a>';
					echo '<a href="Agenda.php"><input type=submit value="Agenda"></a>';
			   //echo '<a href="logout.php"><input type=submit value=Logout></a>';
				}
			echo '<a href="logout.php"><input type=submit value=Logout></a>';
	    } 
			
            else 
            {
                echo "Not logged in";
                // header('Location:/login.php');
            }
        ?>
</div>
	</body>
</html>
