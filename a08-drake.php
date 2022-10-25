<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <title> Skeleton File </title>
        <style>
            h1 {color: blue;}

            .fizz {
                background-color: lightblue;
            }
            .buzz{
                background-color: yellow;
            }

            td{
                background-color: gray;
            }

            p{
                color: pink;
            }

           
        </style>
    </head>
    <body>
        <header>
            <h1> Assignment 8 -  Collin Drake </h1>
        </header>

        <main>
            <p> This PHP program creates a FIZZ/BUZZ table </p>
            <table border = "5">
                <tr>
                    <th> Number </th>
                    <th> FIZZ </th>
                    <th> BUZZ </th>
                </tr>
                <tr>
                    <?php
                        for ( $i = 0; $i <= 50; $i++){
                            echo "<tr><td>$i</td>";
                            if($i % 3 == 0){
                                echo "<td class='fizz'> FIZZ </td>";
                            }
                            else{
                                echo "<td></td>";
                            }
                            if($i % 5 == 0){
                                echo "<td class='buzz'> BUZZ </td>";
                            }
                            else{
                                echo "<td></td>";
                            }
                            echo "</tr>";
                        }
                        
                            
                    ?>
                </tr>
            </table>
        </main>

        <hr>

        <footer>
            <small> (C) C Drake, 2022 </small>
        </footer>
        
    </body>
</html>