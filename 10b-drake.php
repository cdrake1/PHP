<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <title> My Second Form - Version 2 </title>
    </head>
    <body>
        <header>
            <h1> Class 10b - My First STICKY! HTML/PHP Form </h1>
        </header>
        <hr>

        <main>
            <?php
                define ("FILE_AUTHOR", "C.Drake");
                echo FILE_AUTHOR;

                echo "<br>";

                $error_message = " ";

                $today = date("F j, Y, g:i a");
                date_default_timezone_set("American/New_York");
                echo "The Current Time is: $today";

                echo "<br><br> The input text field 'fname' is set to " . $_POST['fname'];
                echo "<br><br> The input text field 'lname' is set to " . $_POST['lname'];

                //start form submit button
                echo "<form action='' method='POST'>";
                echo "<br> Enter your first name <input type='text' name='fname' value='?'>";
                if( strlen($fname)<1) $error_message = "Enter a first name";
                echo "<br> Enter your last name <input type='text' name='lname' value='?'>";
                echo "<br> Enter your email <input type='email' name='email' value='?'>";
                echo "<br> Enter a password <input type='password' name='password' >";
                echo "<br> Enter the current date <input type='date' name='date' value='?'>";
                echo "<br> Select your gender <select name='gender'>";
                echo "      <option value='M'> Male </option>";
                echo "      <option value='F'> Female </option>";
                echo "      </select <br>";
                echo "<br><input type='submit' value='Submit!' style='color: green;'>";
                echo "</form>";

                include "footer.php";
            ?>

        </main>
        
    </body>
</html>