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
                $q = "Select * from courses";
                $r = mysqli_query ($dbc, $q);
                echo "<br> Query Worked";
                while($row = mysqli_fetch_array( $r, MYSQLI_NUM)){
                    echo "<b> <br> Row: $row[0] $row[1] $row[3] $row[4]</br>";
                }
            }

            $q = "Insert into courses Values('4','CMPT','307','Internetworking', null);";
            $r =  mysqli_query ($dbc, $q);

            echo "<h4> Display Updated Courses Table </h4>";
            if ($r ) {
                echo "<br> Query Worked";
            }
            else{
                echo(mysqli_error($dbc));
            }

            $q = "Select * from courses";
            $r = mysqli_query ($dbc, $q);
            echo "<br> Query Worked";
            while($row = mysqli_fetch_array( $r, MYSQLI_NUM)){
                echo "<b> <br> Row: $row[0] $row[1] $row[3] $row[4]</br>";
            }

            $q = "Update courses Set student = 'Collin' Where recnum = '1';";
            $r = mysqli_query ($dbc, $q);
            echo "<br> Query Worked";
            while($row = mysqli_fetch_array( $r, MYSQLI_NUM)){
                echo "<b> <br> Row: $row[0] $row[1] $row[3] $row[4]</br>";
            }
            

        ?>

        <footer>
            <h3> This is the end of this assignment </h3>
            <h5> (C) C Drake, 2022 </h5>
        </footer>
        
    </body>

</html>