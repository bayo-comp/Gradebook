<!-- <!DOCTYPE html> -->
<!-- The main login page -->
<html>
    <title> Login Page </title>
    <body>
        <?php
            ob_start();
            session_start();
                echo '
                    <form method=POST class=login>
                        <p>
                            Username:
                            <input type=text name=user>
                        </p>
                        <p>
                            Password:
                            <input type=text name=pass>
                        </p>
                ';
                if (isset($_SESSION['login_fail'])) {
                    echo '<p>Username or password is incorrect</p>';
                }
                echo '
                        <input name=login type=submit value="Submit">
                        <p>
                            No Account?
                            <input name=create type=submit value="Create an account!">
                        </p>
                        <br>
                    </form>
                ';
        ?>

        <?php
            include_once "$_SERVER[DOCUMENT_ROOT]/php/config.php";

            $username = $password = "";
            $username_err = $password_err = "";

            if (isset($_POST['login']))
            {
                $user = $_POST['user'];
                $pass = $_POST['pass'];

                if(empty(trim($user)))
                {
                    $username_err = "Please enter username.";
                } 
                else
                {
                    $username = trim($user);
                }
                
                // Check if password is empty
                if(empty(trim($pass)))
                {
                    $password_err = "Please enter your password.";
                } 
                else
                {
                    $password = trim($pass);
                }
                
                // Validate credentials
                if(empty($username_err) && empty($password_err))
                {
                    // Prepare a select statement
                    $sql = "SELECT Id,Username,Password,UserType FROM users WHERE username = ?";
                    
                    if($stmt = mysqli_prepare($connection, $sql))
                    {
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt, "s", $param_username);
                        
                        // Set parameters
                        $param_username = $username;
                        
                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt))
                        {
                            // Store result
                            mysqli_stmt_store_result($stmt);
                            
                            // Check if username exists, if yes then verify password
                            if(mysqli_stmt_num_rows($stmt) == 1)
                            {                    
                                // Bind result variables
                                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $usertype);
                                if(mysqli_stmt_fetch($stmt))
                                {
                                    if(password_verify($pass, $hashed_password))
                                    {
                                        // Password is correct, so start a new session
                                        session_start();
                                        
                                        // Store data in session variables
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $id;
                                        $_SESSION["username"] = $username;  
                                        $_SESSION["user_type"] = $usertype;                       
                                        
                                        // Redirect user to welcome page
                                        header('Location:/php/Welcome.php');
                                    } 
                                    else
                                    {
                                        // Display an error message if password is not valid
                                        $password_err = "The password you entered was not valid.";
                                    }
                                }
                            } 
                            else
                            {
                                // Display an error message if username doesn't exist
                                $username_err = "No account found with that username.";
                            }
                        } 
                        else
                        {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
            
                        // Close statement
                        mysqli_stmt_close($stmt);
                        echo "Invalid Credentials";
                    }
                }
                
                // Close connection
                mysqli_close($connection);
            } elseif (isset($_POST['create'])) {
                header('Location:/php/create_account.php');
            } elseif (isset($_POST['pos'])) {
                header('Location:/php/cashier.php');
            } elseif (isset($_POST['adminpage'])) {
                header('Location:/php/admin.php');
            } elseif (isset($_POST['store'])) {
                header('Location:/php/BookLibrary.php');
            } elseif (isset($_POST['logout'])) {
                logout('Location:/index.php');
            }    
        ?>

    </body>
</html>