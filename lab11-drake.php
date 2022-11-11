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
            require ("footer.php");
            require ("error_handler.php");

            define('FILE_AUTHOR', 'COLLIN DRAKE');
            echo "<br>";
            echo "<h1> Lab 11- Collin D Login For PrintUsers Table </h1>";
            echo FILE_AUTHOR;
            echo "<hr>";

            if (ISSET($_POST['username']))
            {
                $username = $_POST['username'];
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



            echo "<form action= '$_SERVER['SCRIPT_NAME']' method='POST'>";
            echo "<br> Enter your Username <input type='text' name='username' >";
            echo "<br> Enter your Password <input type='password' name='password' >";
            echo "<br><input type='submit' value='Submit!' style='color: blue;'>";
            echo "</form>";
            echo "<br>";

            echo footer.php;
        ?>
        
    </body>
</html>