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

            define('FILE_AUTHOR', 'COLLIN DRAKE');
            echo "<br>";
            echo "<h1> a11 - Assignment 11</h1>";
            echo FILE_AUTHOR;
            echo "<br>";


            if(ISSET($_POST['tablename']))
            {
                $tablename = $_POST['tablename'];
            }
            else
            {
                $tablename = "";
            }

            if(ISSET($_POST['ID']))
            {
                $ID = $_POST['ID'];
            }
            else
            {
                $ID = "";
            }

            if(ISSET($_POST['name']))
            {
                $name = $_POST['name'];
            }
            else
            {
                $name = "";
            }

            if(ISSET($_POST['artist']))
            {
                $artist = $_POST['artist'];
            }
            else
            {
                $artist = "";
            }

            if(ISSET($_POST['price']))
            {
                $price = $_POST['price'];
            }
            else
            {
                $price = "";
            }


            set_error_handler("handle_error");
            function handle_error($error_number, $error_string, $error_file, $error_line){
                echo "<p style='color:red;'>
                ($error_number) $error_string - $error_file: $error_line </p>";
            }


            echo "<p> Enter new data into the table </p>";
            echo "<form action= '' method='POST'>";
            echo "<br> Enter the table name <input type='text' name='tablename' value = 'prints' >";
            echo "<br> Enter the ID <input type='text' name='ID' >";
            echo "<br> Enter the name <input type='text' name='name' >";
            echo "<br> Enter the artist <input type='text' name='artist' >";
            echo "<br> Enter a price <input type='text' name='price' >";
            echo "<br><input type='submit' value='Submit!' style='color: blue;'>";
            echo "</form>";
            echo "<br>";

            check_table($dbc, $tablename);
            add2_table($dbc, $tablename, $ID, $name, $artist, $price);


            function check_table($dbc, $tablename1)
            {
                $q = "SELECT * FROM $tablename1 ";
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

            function add2_table($dbc, $tablename1, $ID1, $name1, $artist1, $price1)
            {
                $q = "INSERT INTO $tablename1 VALUES ($ID1, $name1, $artist1, $price1)";
                $r = mysqli_query($dbc, $q);

                if($r)
                {
                    echo "It Worked";
                }
            }

            echo "<hr>";
            echo "<h5> (C) Collin Drake, 2022";
        ?>
    </body>
</html>
