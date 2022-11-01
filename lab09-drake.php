<?php
    # PHP Lab 9 Collin Drake October 29th 2022
    
    require ("connect_db.php");
    echo"<br>";


    define('FILE_AUTHOR', 'COLLIN DRAKE');
    echo "<br>";
    echo "<h1> Lab 9 - PHP Functions </h1>";
    echo FILE_AUTHOR;


    name_table($dbc);

    echo "<br>";
    function explain_table($table, $dbc)
    {
        $q = 'explain "$table"';
        $r = mysqli_query ($dbc, $q);
        if($r){
            echo "<br><br> Query Worked";
            while($row = mysqli_fetch_array($r, MYSQLI_NUM)){
                echo ($row[0] . " " $row[1] . " " $row[2] . " " $row[3] . " " $row[4] . "<br> ")
            }
        }

    }

    function name_table($dbc)
    {
        $q = "show tables";
        $r = mysqli_query ($dbc, $q);

        echo "<br><br>Displaying a List of Tables:";
        if($r){
            echo "<br><br> Query Worked";
            while($row = mysqli_fetch_array($r, MYSQLI_NUM)){
                echo "<br> Table name: " . $row[0] . "<br>";
                explain_table($row[0],$dbc);
            }
        }
    }



?>