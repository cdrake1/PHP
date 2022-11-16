<!DOCTYPE html>
<!-- 
    Lab 11
    Collin Drake
    Friday November 11th 2022
-->
<html lang="en">
    <head>
        <title> Lab 11- drake </title>

    </head>

    <body>
        <?php

            session_start();
            require ("connect_db.php");
            include ("error_handler.php");

            # We want to make sure this lab displays that it is registered under my name. A constant variable is the best way to do this.
            define('FILE_AUTHOR', 'COLLIN DRAKE');
            echo "<br>";
            echo "<h1> Lab 11- Collin D Login For PrintUsers Table </h1>";
            echo FILE_AUTHOR;
            echo "<hr>";

            #show we are not logged in
            if(ISSET($_SESSION['login_status']))
            {
                $login_status = $_SESSION['login_status'];
            }
            else
            {
                $login_status = "Not Logged In";
            }


            #we want to check to see if the username and password are already set
            $error_message = "";
            if (ISSET($_POST['username']))
            {
                $username = $_POST['username'];
            }
            else
            {
                $username = "";
            }

            if (ISSET($_POST['password']))
            {
                $password = $_POST['password'];
            }
            else
            {
                $password = "";
            }

            #error message checking if left blank
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                if($username = "")
                {
                    $error_message =  " No Username provided";
                }
                else if($password = "")
                {
                    $error_message = " No Password provided";
                }
                if($error_message == "")
                {
                    echo "<br> Welcome $username";
                    $_SESSION["Login_status"] = "Logged In";
                    $login_status = $_SESSION["Login_status"];
                }
            }
            echo $error_message;
            echo "<br>" . $login_status;

            if($_SERVER['REQUEST_METHOD'] == 'GET' || $error_message != " " || $_SESSION['Login_status']!= "Logged In")
            {
                #this form is used as a login for a username and password so we can implement this later into our project
                echo "<form action= '". $_SERVER['SCRIPT_NAME'] ."' method='POST'>";
                echo "<br> Enter your Username <input type='text' name= 'username' value='$username' >";
                echo "<br> Enter your Password <input type='password' name= 'password' value='$password' >";
                echo "<br><input type='submit' value='Submit!' style='color: blue;'>";
                echo "</form>";
                echo "<br>";
            }

            validation($dbc. $username, $password);

            #for some reason lets user in for any username and password
            #function to determine if the form entry was a valid entry.  We check this way using our sql database and if the entry already exists
            function validation($dbc, $username1, $password1)
            {
                $q = "SELECT * FROM PrintUsers WHERE user_name = '$username1' AND user_password = '$password1' ";
                $r = mysqli_query ( $dbc , $q );
                if($r)
                {
                    if(mysqli_num_rows($r) == 0)
                    {
                        $error_message = "Invalid username/password combination";
                    }
                }
                else
                {
                    echo "<br> Error: " . mysqli_error($dbc);
                }

            }
        
            #logged in using POST method
            if($_SERVER['REQUEST_METHOD'] == 'POST' & $error_message != " ")
            {
                echo "<br> User $user_name successfully logged in";
                $_SESSION["Login_status"] = "LOGGED IN";

            }
            # a footer file to distinguish this as my work
            require ("footer.php");
        ?>

        
        
    </body>
</html>