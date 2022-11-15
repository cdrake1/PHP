<?php

    define("FILE_AUTHOR" , "M. Ong");
    INCLUDE "error_handler.php";
    REQUIRE "connect_db.php";

    # find the id passed by ?id=##

    if ( !isset($_GET["$id"]))
    {
        echo "<br> No ID passed.";
        DIE;
    }
    else
    {
        $id = $_GET["$id"];
        echo "<br> ID $id passed.";

        $q = "UPDATE prints SET price = 0 WHERE $id = 0;";
        $r = mysqli_query ($dbc, $q);

        if($r)
        {
            echo "<br><br> Query Worked";
        }
    }

    INCLUDE "footer.php"
?>