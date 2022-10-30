<!-- Lab 9 PHP
    Collin Drake October 29th 2022
-->
<?php

    $fname = "Collin";
    require ("connect_db.php");
    echo"<br>";


    define('FILE_AUTHOR', 'COLLIN DRAKE');
    echo "<br>";
    echo "<h1> Lab 9 - PHP Functions </h1>";
    echo FILE_AUTHOR;


    $q = "show tables from site_db;";
    $r = mysqli_query ($dbc, $q);
    if(!$r){
        echo "DB error";
        echo 'Mysql error: ' . mysql-error();        
        exit;
    }
    while($row = mysql-fethc_row($r)){
        echo "table: {$row[0]}\n";
    }

    function explain_table($table_name, $dbc){
        echo "<br> Table (in function):" .  $table_name;
        echo '<br> The variable $fname is set to ' . $fname;

    }



?>