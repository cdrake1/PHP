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
            require ("connect_db.php");
            require ("error_handler.php");

            define('FILE_AUTHOR', 'COLLIN DRAKE');
            echo "<br>";
            echo "<h1> Lab 11- Collin D Login For PrintUsers Table </h1>";
            echo FILE_AUTHOR;
            echo "<hr>";

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


            echo "<form action= '". $_SERVER['SCRIPT_NAME'] ."' method='POST'>";
            echo "<br> Enter your Username <input type='text' value='$username' >";
            echo "<br> Enter your Password <input type='password' value='$password' >";
            echo "<br><input type='submit' value='Submit!' style='color: blue;'>";
            echo "</form>";
            echo "<br>";

            $error_message = "";
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

            }
            echo $error_message;

            validation($dbc. $username, $password);
            
            function validation($dbc, $username1, $password1)
            {
                $q = "SELECT * FROM PrintUsers";
                $r = mysqli_query ( $dbc , $q );
                if($r)
                {
                    $row_count = $r->num_rows;

                    if($row_count != 0)
                    {
                        $error_message = "This entry already exists";
                    }
                }
                else
                {
                    echo "<br> Error: " . mysqli_error($dbc);
                }

            }

            require ("footer.php");
        ?>

        
        
    </body>
</html>