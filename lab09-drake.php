<?php
    # PHP Lab 9 Collin Drake October 29th 2022
    
    require ("connect_db.php");
    echo"<br>";


    define('FILE_AUTHOR', 'COLLIN DRAKE');
    echo "<br>";
    echo "<h1> Lab 9 - PHP Functions </h1>";
    echo FILE_AUTHOR;

    echo "<hr>";

    name_table($dbc);
    explain_table($dbc);

    function name_table($dbc)
    {
        $q = "show tables";
        $r = mysqli_query ($dbc, $q);

        echo "<br><br>Displaying a List of Tables:";
        if($r){
            echo "<br><br> Query Worked";
            while($row = mysqli_fetch_array($r, MYSQLI_NUM)){
                echo "<br> Table name: " . $row[0] . "<br>";
            }
        }
    }



    function explain_table($dbc)
    {
        $q = "show tables";
        $r = mysqli_query ($dbc, $q);

        echo "<br><br>Displaying information for one Tables:";
        if($r){
            echo "<br><br> Query Worked";
            while($row = mysqli_fetch_array($r, MYSQLI_NUM)){
                echo "<br> Table name: " . $row[0] . "<br>";

                $q = "explain $row[0]";
                $r = mysqli_query ($dbc, $q);
                if($r){
                    while($row = mysqli_fetch_array($r, MYSQLI_NUM)){
                        echo "<br> Table data: " . $row[0] . " " .  $row[1] . " " . $row[2] . " " . $row[3] . " " . $row[4] . " " . $row[5] . "<br>";
                    }
                }
            }
        }
    }


    echo "<hr>";
    echo "<h5> (C) Collin Drake, 2022";

?>