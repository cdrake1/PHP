<!DOCTYPE html>

<!-- In class PHP work -->

<html lang="en">
    <head>
        <meta charset="UTF-8">
        
        <title> 09a Drake </title>
    </head>
    <body>
        <?php
            echo "<h2> Step 1: Arrays </h2>";

            $months[] = 'January';
            $months[] = 'February';
            $months[] = 'March';
            
            echo "<br> 0 - $months[0]";
            echo "<br> 1 - $months[1]";
            echo "<br> 2 - $months[2]";

            $months[6] = 'July';
            echo "<br> 6 - $months[6]";

            echo "<br>";

            $friends[] = 'Reilly';
            $friends[] = 'Denji';
            $friends[] = 'Gojo';

            echo "<br> 0 - $friends[0]";
            echo "<br> 1 - $friends[1]";
            echo "<br> 2 - $friends[2]";

            echo "<br>";

            $courses= array('SD2','Data Comm','DataBase Management','Introduction to Stats');
            echo "<br> 0 - $courses[0]";
            echo "<br> 1 - $courses[1]";
            echo "<br> 2 - $courses[2]";
            echo "<br> 3 - $courses[3]";

            echo "<br>";

            for($i = 0; $i<3; $i++){
                echo "<br> " . $i . " " . $friends[$i];
            }

            echo "<br>";

            echo "<br>" . count($friends);

            
        ?>


        
    </body>
</html>

