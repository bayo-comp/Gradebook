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
                    echo '<a href="/php/create_account.php"><input type=submit value="Create Account"></a>';
                    echo '<a href="/php/admin.php"><input type=submit value=Administration name=adminpage></a>';
					echo '<a href="Agenda.php"><input type=submit value="Agenda"></a>';
					// echo '<a href="logout.php"><input type=submit value=Logout></a>';
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
