<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    
        <title> Assignment 9 - Drake </title>
    </head>
    <body>
        <?php
            echo "<b><br> 9A - C. Drake </b><br>";
            echo "<p> We first call connect_db.php to connect to site_db.";

            require ("connect_db.php");
            echo"<br>";
            //5
            $q = "USE site_db";
            $r = mysqli_query ($dbc, $q);

            if ($r ) {
                echo "<br> Query worked";
                while ($row = mysqli_fetch_array( $r, MYSQLI_NUM))
                {
                    echo "<br> Table: " . $row[0];
                }
            }

        ?>

        <footer>
            <h3> This is the end of this assignment </h3>
            <h5> (C) C Drake, 2022 </h5>
        </footer>
        
    </body>

</html>