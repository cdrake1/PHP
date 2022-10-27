<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    
        <title> DB Connection </title>
    </head>
    <body>

        <?php
            echo "<h1> Collin Drake is Testing Connections </h1>";
            echo "<ol>";   
            echo "<li> Calling 'connect_db.php' to connect to the database! </li>";
            
            require("..\connect_db.php");

            if( mysqli_ping( $dbc ) )
            {   echo "<li> Connected! </li>";
                echo "<li> MYSQL Server " . mysql_get_server_info ($dbc).
                     " connected on "     . mysql_get_host_info ( $dbc ).
                     "</li>";}
                echo "</ol>";

        ?>
        
    </body>
</html>