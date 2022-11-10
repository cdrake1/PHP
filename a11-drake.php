<!DOCTYPE html>
<!--
    Assignment 11
    Collin Drake
    Friday November 10th 2022
-->
<html lang="en">
    <head>
        
        <title> a11 - drake </title>
    </head>
    <body>
        <?php
            require ("connect_db.php");
            echo"<br>";

            set_error_handler("handle_error");
            function handle_error($error_number, $error_string, $error_file, $error_line){
                echo "<p style='color:red;'>
                ($error_number) $error_string - $error_file: $error_line </p>";
            }

            define('FILE_AUTHOR', 'COLLIN DRAKE');
            echo "<br>";
            echo "<h1> a11 - Assignment 11</h1>";
            echo FILE_AUTHOR;
            echo "<br>";

            echo "<p> Enter new data into the table </p>";
            echo "<form action= '' method='POST'>";
            
            echo "<br><input type='submit' value='Submit!' style='color: blue;'>";
            echo "</form>";
            echo "<br>";



            function add2_table($dbc, $table_name, $insert_value)
            {
                $q = "INSERT INTO $table_name VALUES($insert_value)";
                $r = mysqli_query($dbc, $q);

                if($r)
                {

                }

            }

            echo "<hr>";
            echo "<h5> (C) Collin Drake, 2022";
        ?>
    </body>
</html>
