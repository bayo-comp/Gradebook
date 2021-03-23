<html>

    <body>

    <div class=welcome>
        <?php
            function isAdmin($user_data) {
                return isset($user_data) && isset($user_data['user_type']) && $user_data['user_type'] == 'Admin';
                }
            function isCashier($user_data) {
                return isset($user_data) && isset($user_data['user_type']) && $user_data['user_type'] == 'Cashier';
                }
            ob_start();
            session_start();
            if (isset($_SESSION['user_type'])) 
            {
                echo '<p> Welcome ', $_SESSION["username"], '</p>';
                echo '<p> You are a(n) ', $_SESSION['user_type'],'</p>';
                if (isAdmin($_SESSION)) 
                {
                    echo '<a href="/php/create_account.php"><input type=submit value="Create Account"></a>';
                    echo '<a href="/php/admin.php"><input type=submit value=Administration name=adminpage></a>';
                }
                if (isCashier($_SESSION)) 
                {
                    echo '<a href="/php/cashier.php"><input type=submit value="POS Service"></a>';
                }
                    echo '<a href="/php/client.php"><input type=submit value="Online Store"></a>';
                    echo '<a href="/index.php"><input type=submit value=Logout></a>';
            } 
            else 
            {
                echo "Not logged in";
                // header('Location:/index.php');
            }
        ?>
    </div>

    </body>

</html>