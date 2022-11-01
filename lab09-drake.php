<?php
    # PHP Lab 9 Collin Drake October 29th 2022
    
    require ("connect_db.php");
    echo"<br>";


    define('FILE_AUTHOR', 'COLLIN DRAKE');
    echo "<br>";
    echo "<h1> Lab 9 - PHP Functions </h1>";
    echo FILE_AUTHOR;

    $q = "USE site_db;";
    $r = mysqli_query ($dbc, $q);

    if($r){
        $q = "show tables;";
        $r = mysqli_query ($dbc, $q);
        echo "<li> Query Worked.</li>";
        while($row = mysqli_fetch_row($r, MYSQLI_NUM)){
            explain_table($row[0],$dbc);
        }
    }
    else{
        echo "<li>" . mysqli_error( $dbc ) . "</li>" ;
    }

    function explain_table($table, $dbc)
    {
        echo " table Name: $table ";
        $q = "explain $table";
        $r = mysqli_query ($dbc, $q);
        if($r){
            while($row = mysqli_fetch_row($r, MYSQLI_NUM)){
                echo ($row[0] . " " . $row[1] . " " . $row[2] . " " . $row[3] . " " . $row[4] . " " . $row[5]. "<br>");
            }
        }
    }



?>