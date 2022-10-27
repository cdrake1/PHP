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

            function explain_table($dbc,$this_table)
            {
                echo "<br> Table is $this_table";

                echo "<br Columns: ";
                    $q = "Explain $this_table;" ;
                $r = mysql_query ($dbc,$q);

                if ($r ) {
                    echo "<ul>"
                    while ($row = mysql_fetch_array( $r MYSQL_NUM))
                    { echo " <br> Table: " . $row[0];
                    }
                }
                echo "<br>";

                $q[4] = (4, 'MATH', 130, 'Intro to Stats');
                

            }


        ?>
        
    </body>
</html>