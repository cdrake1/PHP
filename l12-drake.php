<!DOCTYPE html>
<!-- 
    Lab 12
    Collin Drake
    Friday November 18th 2022
-->
<html lang="en">
    <head>
        <meta charset="UTF-8">
    
        <title> Lab 12 - Drake add and delete cookies </title>
    </head>
    <body>
        <?php
            #require and include necessary files
            include ("error_handler.php");

            # We want to make sure this lab displays that it is registered under my name. A constant variable is the best way to do this.
            define('FILE_AUTHOR', 'COLLIN DRAKE');
            echo "<br>";
            echo "<h1> Lab 12- Collin D, Christmas Cookies! oh wait...  </h1>";
            echo FILE_AUTHOR;
            echo "<hr>";

            if (ISSET($_POST['cookie']))
            {
                $cookie = $_POST['cookie'];
            }
            else
            {
                $cookie = "";
            }
            
            if (ISSET($_POST['value']))
            {
                $value = $_POST['value'];
            }
            else
            {
                $value = "";
            }

            if (ISSET($_POST['choice']))
            {
                $choice_type = $_POST['choice'];
            }
            else
            {
                $choice_type = "";
            }


            echo "<form action= '". $_SERVER['SCRIPT_NAME'] ."' method='POST'>";
            echo "<br> Enter the name of a cookie <input type='text' name= 'cookie' value='$cookie' >";
            echo " and a value to set <input type='number' name= 'value' value='$value' >";
            echo "<br> <input type='radio' name='choice' value='set_cookie'> SET "; 
            echo "<input type='radio' name='choice'> DELETE "; 
            echo "<br><input type='submit' value='Submit!' style='color: blue;'>";
            echo "</form>";
            echo "<br>";

            set_or_delete($choice_type, $cookie, $value);

            function set_or_delete($choice_type1, $name1, $value1)
            {
                if($choice_type1 = 'set_cookie')
                {
                    setcookie($name1, $value1);
                }
                
            }

            if (ISSET($_COOKIE['name']))
            {
                $cookie_cookie = $_POST['name'];
            }
            else
            {
                $cookie_cookie = "";
            }

            display_cookies();

            function display_cookies()
            {
                echo "<table border = '5'>";
                echo "<tr>";
                echo "<th> COOKIE NAME </th>";
                echo "<th> COOKIE VALUE </th>";
                echo "</tr>";
                echo "</table>";

            }
            require ("footer.php");
        ?>
        
    </body>
</html>