<!DOCTYPE html>
<!--
    Lab 10
    Collin Drake
    Friday November 4th 2022
-->
<html lang="en">
    <head>
        
        <title> Lab 10 - drake </title>
    </head>
    <body>
        <?php
            require ("connect_db.php");
            echo"<br>";

            define('FILE_AUTHOR', 'COLLIN DRAKE');
            echo "<br>";
            echo "<h1> Lab 10 - Using a Form to Manipulate Display</h1>";
            echo FILE_AUTHOR;
            echo "<br>";

            if (isset($_POST['sort']))
            {
                $sort_type = " ORDER BY " . $_POST['sort'];
            }
            else
            {
                $sort_type = "";
            }
            echo "<br> Query : " . $sort_type;

            if (isset($_POST['direction']))
            {
                $direction_type = $_POST['direction'];
            }
            else
            {
                $direction_type = "";
            }
            echo "<br> Direction : " . $direction_type;

            echo "<br>";
            $today = date("F j, Y, g:i a");
            date_default_timezone_set("American/New_York");
            echo "The Current Time is: $today";
            echo "<br><br>";

            echo "<form action= '' method='POST'>";
            echo "<input type='radio' name='sort' value='id'> ID NUM"; 
            echo "<input type='radio' name='sort' value='name'> Name "; 
            echo "<input type='radio' name='sort' value='artist'> Artist "; 
            echo "<input type='radio' name='sort' value='price'> Price ";
            echo "<br><input type='radio' name='direction' value='asc'> ASC ";
            echo "<input type='radio' name='direction' value='desc'> DESC ";
            echo "<br><input type='submit' value='Submit!' style='color: green;'>";
            echo "</form>";
            echo "<br>";

            display_table($dbc, "prints", $sort_type, $direction_type );

            function display_table($dbc, $table_name, $column, $direction)
            {
                $q = "SELECT * FROM $table_name";
                if($column != "")
                {
                    $q = $q . " $column";
                }
                if($direction != "")
                {
                    $q = $q . " $direction";
                }
                $r = mysqli_query($dbc, $q);

                if ($r) 
                {
                    echo "<table border='3'>";

                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Artist</th>";
                    echo "<th>Price</th>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) 
                    {
                        echo "<tr>";
                        for ($i = 0; $i < count($row); $i++) 
                        {
                            echo "<td>$row[$i]</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "<br>";
                }

            }
            echo "<hr>";
            echo "<h5> (C) Collin Drake, 2022";

        ?>
        
    </body>
</html>