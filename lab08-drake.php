<!DOCTYPE html>
<!-- Lab 08C Our first PHP file -->
<!-- 10-21-22 Collin Drake -->
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title> My First PHP File </title>
    </head>
    
    <body>

    <header>
        <h1> My First HTML File </h1>
    </header>

    <Main>
        <?php
            echo "<p> Hello World!";
            echo "<p> THis text was dynamically created by PHP";

            echo "<br>";
            include "connect_db.php";
        ?>
    </Main>

    <footer>
        <small> (C) C Drake, 2022 </small>
    </footer>
        

    </body>
</html>