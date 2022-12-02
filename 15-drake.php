<!DOCTYPE html>
<!-- Lab 14 Prep File   
	
	 12/2/2022
     Lab 14
		 
	--> 
    <html lang="en">

    <head>
		<title> Lab 14 - More PHP- C. Drake  </title>
        <meta charset="utf-8">

        <style>
                    /*top rig bot lef */
            th {padding: 5px 5px 5px 5px;}
            td {padding: 5px 5px 5px 5px;}

            .password {color:red;}

            tr:nth-child(even)
            {
                background-color: lightblue;

            }


        </style>
    </head>

	<!--- ---------------------------------------------------------------------- --->	
    <body>

        <header>
            <h1> Class 14A - in Class Work - C. Drake! </h1>
        </header>
        <hr>

        <?php 

            session_start();
			
			require "connect_db.php";
			include "error_handler.php";
            define("FILE_AUTHOR", "C Drake");
            define("TESTING", TRUE);


				
		  #----- Initialization --------------------------------------------
			$userid = $password = $error_message = $q = "";
            $comments = "";
            $balance = "";
            $secret = ""; 
            $count = 0;

            

            # validates the input for userid and outputs an error message if something is wrong
            if (isset($_POST['userid']))   { $userid = $_POST['userid'];}
            if (isset($_POST['password'])) { $password = $_POST['password'];}
            if (isset($_POST['comments'])) { $comments = $_POST['comments'];}
            if (isset($_POST['balance'])) { $balance = $_POST['balance'];}
            if (isset($_POST['secret'])) { $secret = $_POST['secret'];} 
            if (isset($_POST['counter'])) { $count = $_POST['counter'];} 
            
                
            if ($userid == "")   {$error_message = "<p style='color:red'> The username cannot be blank! </p>";}
            if ($password == "") {$error_message = "<p style='color:red'> The password cannot be blank! </p>";}
            
            if($_SERVER["REQUEST_METHOD"] == "GET")
            {
                $count = 1;
            }
            else
            {
                $count += 1;
                echo "$count";
            }

            count_check($count);
    

		#----- If no errors, insert into the table   ------------------	
		    if ($error_message == "") {
                $q = "INSERT INTO PrintUsers (user_name, user_password, comments, balance ) VALUES( '$userid' , '$password' , '$comments' , '$balance')";
				if (TESTING) {echo "<br> Query: $q";}
				$r = mysqli_query($dbc, $q);
				
				if ($r) { echo "<br> Inserted User $userid - $password - $comments - $balance";}
                else    { echo "<br> ERROR! Unable to insert into the table";}  	
            }

            
        #----   Always display the form    
            
            echo "<br><br>";
			echo "<form action = '' method = 'POST'>";
            echo "Enter your username ";
            echo "<input type='text' name='userid' maxlength=20>"; 
            echo "<br> Enter your password ";
            echo "<input type='password' name='password'>"; 
            echo "<input type='hidden' name='secret' value='Abracadabra'>";
            echo "<input type='hidden' name='counter' value='$count'>";
            echo "<br> Enter desired balance";
            echo "<input type='number' name='balance' value='$balance' max='20' min='0' step ='.01' value = '0'>";
            echo "<br> Enter comments";
            echo "<input type='text' name='comments' value='' max='30'>";
            echo "<br><br> <input type='submit' value='Submit!' name='submit' style='background-color:blue; color:white;'>";
            echo "</form>";

            if (isset($error_message)) {echo "$error_message";}

            echo "$secret";

        #----   new block of code!
            echo "<form action = '//www.marist.edu' method = 'POST'>";
            echo "<br><br> <input type='submit' value='GO TO MARIST' name='submit' style='background-color:blue; color:white;'>";
            echo "</form>";


		#----   display the table 

			$q="SELECT * FROM PrintUsers"; 
			$r = mysqli_query ( $dbc , $q );    # this runs query 
	
			echo "<table border=1>";
			echo "<tr><th> User Name </th><th> Password </th><th> Comments </th><th> Balance </th><th> 90% of Balance </th></tr>";
	
			if ($r) 
            {
				while ($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {
					echo "<tr>";   
					echo "<td>" . $row[0] . "</td><td class='password'>" . $row[1] . "</td>";
                    echo "<td>" . $row[2] . "</td>";
                    if($row[3] == 0)
                    {
                        echo "<td></td>";
                        echo "<td></td>";
                    }
                    else
                    {
                        echo "<td>" . $row[3] . "</td>";
                        echo "<td> " . '$' . $row[3] * .9 . "</td>";
                        echo "</tr>";   	
                    }
						 
				}	   
			}
			else { echo "<br> Error: " . mysqli_error($dbc) ;}

        #----   creates function
            function string_check($this_string)
            {
                if(ctype_alnum($this_string)) 
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }

            }

            function count_check($counts)
            {
                if($counts == 5)
                {
                    echo "<br> Excessive Attempts Bye!";
                    die();
                }
            }



		#----   display a footer 

			include "footer.php";
            ?>

        </body>

    </html>