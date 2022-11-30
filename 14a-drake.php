<!DOCTYPE html>
<!-- Class 14 Prep File   
	
	 11/29/2022
     Assignment 14a
		 
	--> 
    <html lang="en">

    <head>
		<title> Class 14A - in Class Work - C. Drake  </title>
        <meta charset="utf-8">

        <style>
                    /*top rig bot lef */
            th {padding: 5px 5px 5px 5px;}
            td {padding: 5px 5px 5px 5px;}

            .password {color:red;}
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
			$userid = $password = $error_message = $q;
            $comments = "";
            $balance = ""; 

            # validates the input for userid and outputs an error message if something is wrong
            if (isset($_POST['userid']))   { $userid = $_POST['userid'];}
            if (isset($_POST['password'])) { $password = $_POST['password'];}
            if (isset($_POST['comments'])) { $comments = $_POST['comments'];}
            if (isset($_POST['balance'])) { $balance = $_POST['balance'];} 
            
                
            if ($userid == "")   {$error_message = "<p style='color:red'> The username cannot be blank! </p>";}
            if ($password == "") {$error_message = "<p style='color:red'> The password cannot be blank! </p>";}
            if(!string_check($comments)) {$error_message = "<p style='color:red'> Invalid characters in comments! </p>";}
            
    

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
            echo "<br> Enter desired balance";
            echo "<input type='number' name='balance' value='$balance' max=10 min=5 step =.5>";
            echo "<br> Enter comments";
            echo "<input type='text' name='comments' value='' max='30'>";
            echo "<br><br> <input type='submit' value='Submit!' name='submit' style='background-color:blue; color:white;'>";
            echo "</form>";

            if (isset($error_message)) {echo "$error_message";}

            

		#----   display the table 

			$q="SELECT * FROM PrintUsers"; 
			$r = mysqli_query ( $dbc , $q );    # this runs query 
	
			echo "<table border=1>";
			echo "<tr><th> User Name </th><th> Password </th><th> Comments </th><th> Balance </th></tr>";
	
			if ($r) {
				while ($row = mysqli_fetch_array( $r, MYSQLI_NUM)) {
					echo "<tr>";   
					echo "<td>" . $row[0] . "</td><td class='password'>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td>";
					echo "</tr>";   		 
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


		#----   display a footer 

			include "footer.php";
            ?>

        </body>

    </html>